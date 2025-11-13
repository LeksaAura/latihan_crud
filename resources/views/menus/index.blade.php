@extends('layouts.app')
@section('title', '☕ ANAGA CAFE MENU LIST')
@section('content')
<style>
    body {
        background-color: #1f1f1f;
        font-family: 'Poppins', sans-serif;
        color: #e0e0e0;
    }

    .menu-card {
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

    table {
        background-color: #3a3a3a;
        border-radius: 12px;
        overflow: hidden;
    }

    th {
        background-color: #4a4a4a;
        color: #f9e79f;
        text-transform: uppercase;
    }

    td {
        background-color: #2e2e2e;
        color: #dcdcdc;
        vertical-align: middle;
    }

    tr:hover td {
        background-color: #3d3d3d;
        transition: 0.3s;
    }

    .btn-primary {
        background-color: #d4af37;
        border: none;
        font-weight: 500;
        color: #1f1f1f;
    }

    .btn-primary:hover {
        background-color: #f1c40f;
        color: #000;
    }

    .btn-warning {
        background-color: #e1b12c;
        border: none;
        color: #1f1f1f;
    }

    .btn-danger {
        background-color: #c23616;
        border: none;
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

    img {
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }
</style>

<div class="menu-card">
    
    <div class="text-end mb-3">
        <a href="{{ route('menus.create') }}" class="btn btn-primary">+ Tambah Menu</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menu->nama_menu }}</td>
                <td>
                    @if($menu->foto)
                    <img src="{{ asset('storage/'.$menu->foto) }}" width="80">
                    @else
                    <small class="text-muted">Tidak ada</small>
                    @endif
                </td>
                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<p class="footer-text">☕ <span>Anaga Cafe</span> — By L.Aura</p>
@endsection
