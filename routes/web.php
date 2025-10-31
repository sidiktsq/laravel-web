<?php
use App\Http\Controllers\MyController;  
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::get('about', function(){
    return '<h1>hallo <h1>'. 
    '<br> selamat datang di perpustakaan digital';
});
  

route::get('nama', function(){
    return '<h1>biodata <h1>'. 
    '<br>nana:rizky mochamad sidik'. 
     '<br>kelas:XI RPL 3'. 
     '<br>alamat:kp.bojong sukamukti';
});
  
 route::get('buku', function(){
    return view ('buku'); 
});


route::get('menu', function(){
    // multi data / array
    $data = [
       ['nama_makanan'=>'bala-bala','harga'=>1000,'jumlah'=>10],
         ['nama_makanan'=>'gehu pedas','harga'=>2000,'jumlah'=>15],
           ['nama_makanan'=>'cireng isi','harga'=>1500,'jumlah'=>5],
    ];
    // single data 
    $resto = "resto MPL - Makanan Penuh Lemak";

    return view('menu',compact('data','resto'));
});
// route parameter (nilai)
route::get('books/{judul}',function($a){
   return 'judul buku:'.$a;
});


// route::get('post/{title}/{category}', function($a,$b){
//     return view('post',['judul' =>$a, 'cat' =>$b]);
// }); 

//route optional parameter
// ditandai dengan?
route::get('frofile/{nama}', function($a = "guest"){
    return 'haloooo nama saya '.$a;
});

route::get('order/{item}', function($a = b"nasi"){
    return view('order', compact('a'));
});

route::get('peralatan', function(){
    // multi data / array
    $data = [
       ['nama_barang'=>'buku','harga'=>15000,'jumlah'=>2],
         ['nama_barang'=>'pensil','harga'=>3000,'jumlah'=>5],
           ['nama_barang'=>'penggaris','harga'=>7500,'jumlah'=>1],
    ];
    // single data 
    $toko = "peralatan sekolah";

    return view('peralatan',compact('data','toko'));
});

route::get('nilai/{nama}/{mapel}/{nilai}', function ($a,$b,$c){
   return view('niali', ['nama' => $a,'mapel' =>$b,'nilai' =>$c]);
});

route::get('grading/{nama}/{nilai}', function ($a = "guest" , $b =0){
    return view('grading', ['nama' => $a, 'nilai' =>$b]);
});

route::get('kelas/{nama}/{nilai}', function ($a = "guest", $b = 0){
   return view('kelas', ['nama' => $a, 'nilai' => $b]);
});



// test model 
route::get('test-model',function(){
    // menampilkan semua data dari model past\
    $data = App\Models\Post::all();
    return $data;
});

route::get('create-data', function(){
    // membuat data baru melalui model
    $data = App\Models\Post::create([
        'title' => 'belajar laravel',
        'content' => 'lorem ipsum'
    ]);
    return $data;
});

route::get('show-data/{id}', function ($id){
    $data = App\Models\Post::find($id);
    return $data;
});

route::get('edit-data/{id}' , function ($id){
    // mengupdate data berdasarkan id 
     $data = App\Models\Post::find($id);
     $data->title = "membangun project dengan laravel";
     $data->save();
     return $data;
});

route::get('delete-data/{id}', function($id){
    // menghaous data berdasarkan parameter id
    $data = App\Models\Post::find($id);
    $data->delete();
    // dikembalikan (alihkan) ke halaman test model 
    return redirect('test-model');
});

route::get('search/{cari}',function ($query){
    // mencari data berdasarkan title yang mirip seperti (like)....
    $data = App\Models\Post::where('title','like','%' . $query . '%')->get();
    return $data;
});

// pemanggilan url menggunakan controller    
route::get('greetings',[MyController::class, 'hello']);
route::get('student', [MyController::class, 'siswa']);

// post
use App\Http\Controllers\PostController;
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
// post
route::get('post', [Postcontroller::class, 'index'])->name('post.index');
// tambah post
route::get('post/create',[PostController::class, 'create'])->name('post.create');
route::post('post',[PostController::class, 'store'])->name('post.store');
// edit data post 
route::get('post/{id}/edit', [PostController::class,'edit'])->name('post.edit');
route::put('post/{id}', [PostController::class,'update'])->name('post.update');

// hapus data 
route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');

// crud
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');
use App\Http\Controllers\BiodataController;
Route::resource('biodata', BiodataController::class);

// routes/web.php
use App\Http\Controllers\RelasiController;

Route::get('/one-to-one', [RelasiController::class, 'oneToOne']);

Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);

Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);

Route::get('eloquent', [RelasiController::class, 'eloquent']);

use App\Http\Controllers\DosenController;
Route::resource('dosen', DosenController::class);

use App\Http\Controllers\HobiController;
Route::resource('hobi', HobiController::class);

// routes/web.php   
use App\Models\Wali;

Route::get('/wali-ke-mahasiswa', function () {
    $wali = Wali::with('mahasiswa')->first();
    return "{$wali->nama} adalah wali dari {$wali->mahasiswa->nama}";
});

// CRUD One To Many
Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class);

// crud wali 
Route::resource('wali', App\Http\Controllers\WaliController::class);

// 5
use App\Http\Controllers\PelangganController;

Route::resource('pelanggan', PelangganController::class);
