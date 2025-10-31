<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 20)->unique();
            $table->date('tanggal');
            $table->unsignedBigInteger('pelanggan_id');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();

            // Relasi ke tabel pelanggan
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
