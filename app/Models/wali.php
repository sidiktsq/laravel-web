<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali extends Model
{
    protected $fillable = ['nama', 'id_mahasiswa'];
    // membuat relasi dari wali ke mahasiswa 
    public function mahasiswa()
    {
        // data wali bisa di miliki oleh mahasiswa melalui fk if_mahasiswa
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa');
    }
}
