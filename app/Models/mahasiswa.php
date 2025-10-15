<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $fillable = ['nama', 'id_mahasiswa',];
    // membuat relasi ke wali 
    public function wali()
    {
        // data mahasiswwa bisa memiliki 1 data dari wali 
        // melalui fk id_mahasiswa
        return $this->hasOne(wali::class, 'id_mahasiswa');  
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function hobis()
{
    return $this->belongsToMany(Hobi::class, 'mahasiswa_hobi', 'id_mahasiswa', 'id_hobi');
}
}

