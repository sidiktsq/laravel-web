@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Produk</h2>
    <a href="{{ route('produks.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $produk->id }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ number_format($produk->harga, 2) }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <a href="{{ route('produks.show', $produk->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
