<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class RelasiController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('wali')->get();
        return view('relasi.one_to_one', compact('mahasiswas'));
    }

    public function oneToMany()
    {
        $mahasiswas = Dosen::with('mahasiswas')->get();
        return view('relasi.one_to_many', compact('dosens'));
    }

      public function eloquent()
    {
        // Eager load the correct relations and return the specific sub-view
        $mahasiswa = Mahasiswa::with('wali', 'dosen', 'hobis')->get();
        return view('relasi.eloquent', compact('mahasiswa'));
    }
    public function manyToMany()
    {
        $mahasiswas = Mahasiswa::with('hobis')->get();
        return view('relasi.many_to_many', compact('mahasiswas'));
    }


}


