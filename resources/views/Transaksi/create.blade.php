@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Transaksi</h2>
    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Transaksi</label>
            <input type="text" name="kode_transaksi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach ($pelanggans as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Total Harga</label>
            <input type="number" step="0.01" name="total_harga" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
