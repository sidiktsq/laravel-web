<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
     public function hello()
    {
        $nama = "sidik";
        $umur = 16;

        return view('hello', compact('nama' , 'umur'));
    }
    public function siswa() {
        $data=[
            ['nama'=>'rehan','kelas'=>'XI rpl 3'],
            ['nama'=>'dadan','kelas'=>'XI rpl 3'],
            ['nama'=>'lutfhi','kelas'=>'XI rpl 3']
        ];
        return view('siswa', compact ('data'));
    }
}
