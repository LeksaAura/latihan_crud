@extends('layouts.app')
@section('content')
<div class="card">
 <div class="card-body">
 <h4>Edit Menu</h4>
 <form action="{{ route('menus.update', $menu->id) }}" method="POST"
enctype="multipart/form-data">
 @csrf
 @method('PUT')
 <div class="mb-3">
 <label>Nama Menu</label>
 <input type="text" name="nama_menu" class="form-control" value="{{
old('nama_menu', $menu->nama_menu) }}">
 @error('nama_menu') <small class="text-danger">{{ $message }}</small>
@enderror
 </div>
 <div class="mb-3">
 <label>Harga</label>
 <input type="number" name="harga" class="form-control" value="{{
old('harga', $menu->harga) }}">
 @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
 </div>
 <div class="mb-3">
 <label>Foto</label><br>
 @if($menu->foto)
 <img src="{{ asset('storage/'.$menu->foto) }}" width="100" class="mb-2">
 @endif
 <input type="file" name="foto" class="form-control">
 @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
 </div>
 <button class="btn btn-success">Update</button>
 <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
 </form>
 </div>
</div>
@endsection