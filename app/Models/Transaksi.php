<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_transaksi', 'tanggal', 'pelanggan_id', 'total_harga'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
