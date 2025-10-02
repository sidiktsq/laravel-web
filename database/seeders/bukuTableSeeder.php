<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class bukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $buku = [
        ['judul_buku' => 'manga', 'jumlah_halaman' => '99','harga' => '100k', 'stok'=>'190', 'tema'=>'watari kun'],
        ['judul_buku' => 'novel', 'jumlah_halaman' => '400','harga'=>'90k','stok'=>'110','tema'=>'berjihad'],
        ['judul_buku' => 'mahwa', 'jumlah_halaman' => '70','harga'=>'50k','stok'=>'120','tema'=>'stalkerXstalker'],
        ['judul_buku ' => 'cerpen', 'jumlah_halaman' => '10','harga'=>'20k','stok'=>'130','tema'=>'sicepot'],
        ['judul_buku' => 'ips', 'jumlah_halaman' => '250','harga'=>'200k','stok'=>'140','tema'=>'biologi']

    ];
     DB::table('buku')->insert($buku);
    }
}
