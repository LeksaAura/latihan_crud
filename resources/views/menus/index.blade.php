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

    .menu-title {
        font-weight: 700;
        font-size: 1.8rem;
        text-align: center;
        margin-bottom: 25px;
        color: #f7d794;
        letter-spacing: 1px;
    }

    /* GRID */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }

    /* CARD */
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

    .btn-edit {
        background: #e1b12c;
        color: #1f1f1f;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
    }

    .btn-delete {
        background: #c23616;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
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

    <div class="text-end mb-3">
        <a href="{{ route('menus.create') }}" class="btn btn-primary">+ Tambah Menu</a>
    </div>

    <div class="menu-grid">
        @foreach($menus as $menu)
        <div class="menu-card">
            
            @if($menu->foto)
            <img src="{{ asset('storage/'.$menu->foto) }}" alt="">
            @else
            <img src="https://via.placeholder.com/200x150?text=No+Image" alt="">
            @endif

            <div class="menu-name">{{ $menu->nama_menu }}</div>
            <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>

            <div class="actions">
                <a href="{{ route('menus.edit', $menu->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('menus.destroy', $menu->id) }}" 
                      method="POST" 
                      onsubmit="return confirm('Yakin hapus?')"
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</div>

<p class="footer-text">☕ <span>Anaga Cafe</span> — By L.Aura</p>

@endsection
