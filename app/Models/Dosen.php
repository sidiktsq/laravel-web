<?php
// app/Models/Dosen.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class Dosen extends Model
{
    protected $fillable = ['nama', 'nipd'];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_dosen');
    }
     public function oneToMany()
    {
        // Ambil dosen beserta mahasiswa bimbingannya
        $dosens = Dosen::with('mahasiswas')->get();
        return view('relasi.one_to_many', compact('dosens'));
    }
}

