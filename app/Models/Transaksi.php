<?php
// app/Models/Hobi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    protected $fillable = ['kode_unik', 'tanggal_transaksi', 'pelanggan_id','total_transaksi']; 
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
