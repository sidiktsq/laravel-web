<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // secara otomatis model ini menganggap 
    // table yang digunakan adalah table 'post' 

    // table yang digunakan untuk model ini adalah table 'post'
    protected $table = 'posts';

    // apa aja yang bole di isi 
    public $fillable = ['title','content'];

    // apa aja yang bole di perlihatkan 
    public $visible  = ['id','title', 'content'];

    // mengisi tanggal kapan di buat dan kapan di update secara otomatis 
    public $timetamps = true;
}
