@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Produk</h2>
    <p><strong>ID:</strong> {{ $produk->id }}</p>
    <p><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 2) }}</p>
    <p><strong>Stok:</strong> {{ $produk->stok }}</p>

    <a href="{{ route('produks.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
