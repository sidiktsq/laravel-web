@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Transaksi</h2>
    <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
    <p><strong>Pelanggan:</strong> {{ $transaksi->pelanggan->nama ?? '-' }}</p>
    <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 2) }}</p>

    <a href="{{ route('transaksis.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
