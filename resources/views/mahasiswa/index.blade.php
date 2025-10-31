@extends('layouts.app')

@section('section')
<div class="container">
    <div class="row justify-content-content">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    {{ __('mahasiswa') }}
                </div>
                <div class="float-end">
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-sm btn-outlane-primari">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama mahasiswa</th>
                            <th>No Induk Mahasiswa</th>
                            <th>Nama Dosen</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($mahasiswa as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->nim}}</td>
                            <td>{{$data->dosen->nama}}</td>
                            <td>
                            <form action="{{ route('mahasiswa.destroy',$data->id) }}" method="POST">
                             @csrf
                             @method('DELETE')
                             <a href="{{ route('mahasiswa.show',$data->id) }}" class="btn btn-sm btn-outlane-dark">show</a>
                             <a href="{{ route('mahasiswa.edit',$data->id) }}" class="btn btn-sm btn-outlane-success">Edit</a>
                             <button type="submit" onsubmit="return confirm('are you sure ?')" class="btn btn-sm btn-outlane-danger">delete</button>
                            </form>
                            </td>
                        </tr>
                       @empty
                       <tr>
                         <td colspan="6" class="text-center">
                          data data belum tersedia
                         </td>
                       </tr>
                       @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

