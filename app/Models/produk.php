<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{


    protected $fillable = ['nama_produk','harga', 'stok'];
    protected $visible = ['nama_produk','harga','stok'];
}
