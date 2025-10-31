@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    <form action="{{ route('produks.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" step="0.01" name="harga" value="{{ $produk->harga }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
