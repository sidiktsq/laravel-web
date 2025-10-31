@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <a href="{{ route('transaksis.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->kode_transaksi }}</td>
                    <td>{{ $transaksi->tanggal }}</td>
                    <td>{{ $transaksi->pelanggan->nama ?? '-' }}</td>
                    <td>{{ number_format($transaksi->total_harga, 2) }}</td>
                    <td>
                        <a href="{{ route('transaksis.show', $transaksi->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline-block">
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
