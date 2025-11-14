@extends('layouts.app')
@section('title', '☕ ANAGA CAFE MENU LIST')

@section('content')

<style>
    body {
        background-color: #1f1f1f;
        font-family: 'Poppins', sans-serif;
        color: #e0e0e0;
    }

    .menu-wrapper {
        background-color: #2b2b2b;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        padding: 40px;
        color: #e0e0e0;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }

    .menu-card {
        background-color: #3a3a3a;
        border-radius: 18px;
        padding: 15px;
        text-align: center;
        transition: 0.3s;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.5);
    }

    .menu-card img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        object-position: center;
        border-radius: 12px;
        margin-bottom: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }

    .menu-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #f1f1f1;
    }

    .menu-price {
        color: #f7d794;
        font-size: 1rem;
        margin: 8px 0 15px;
    }

    .actions {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    /* BUTTON EDIT */
    .btn-edit {
        background: #e1b12c;
        color: #1f1f1f;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* BUTTON HAPUS */
    .btn-delete {
        background: #c23616;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .footer-text {
        text-align: center;
        margin-top: 30px;
        font-size: 0.9rem;
        color: #a5a5a5;
    }

    .footer-text span {
        color: #f7d794;
    }
</style>

<div class="menu-wrapper">

    <!-- BUTTON TAMBAH MENU -->
    <div class="text-end mb-3">
        <a href="{{ route('menus.create') }}" 
           class="btn btn-primary"
           style="background:#d4af37; border:none; color:#1f1f1f; font-weight:600;">
            <i class="bi bi-plus-circle" style="color:#1f1f1f; margin-right:5px;"></i>
            Tambah Menu
        </a>
    </div>

    <div class="menu-grid">
        @foreach($menus as $menu)
        <div class="menu-card">

            <!-- FOTO -->
            @if($menu->foto)
            <img src="{{ asset('storage/' . $menu->foto) }}" alt="">
            @else
            <img src="https://via.placeholder.com/200x150?text=No+Image" alt="">
            @endif

            <div class="menu-name">{{ $menu->nama_menu }}</div>
            <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>

            <div class="actions">

                <!-- BUTTON EDIT -->
                <a href="{{ route('menus.edit', $menu->id) }}" class="btn-edit">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>

                <!-- BUTTON HAPUS -->
                <form action="{{ route('menus.destroy', $menu->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('Yakin hapus?')" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">
                        <i class="bi bi-trash3-fill"></i> Hapus
                    </button>
                </form>

            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
