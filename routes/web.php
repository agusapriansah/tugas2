<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Prefix untuk /master
Route::prefix('master')->group(function () {

    // Produk
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/Produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('get.Produk');
        Route::get('/Produk/tambah', [App\Http\Controllers\ProdukController::class, 'tambah'])->name('get.tambah.Produk');
        Route::post('/Produk/tambah/proses', [App\Http\Controllers\ProdukController::class, 'proses_tambah'])->name('post.proses-tambah.Produk');
        Route::get('/Produk/detail/{id}', [App\Http\Controllers\ProdukController::class, 'detail'])->name('get.detail.Produk');
        Route::get('/Produk/ubah/{id}', [App\Http\Controllers\ProdukController::class, 'ubah'])->name('get.ubah.Produk');
        Route::patch('/Produk/ubah/proses/{id}', [App\Http\Controllers\ProdukController::class, 'proses_ubah'])->name('post.proses-ubah.Produk');
        Route::delete('/Produk/hapus/{id}', [App\Http\Controllers\ProdukController::class, 'hapus'])->name('delete.Produk');
        Route::get('/About', [App\Http\Controllers\AboutController::class, 'index'])->name('get.About');
    });


    // Produsen
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/Produsen', [App\Http\Controllers\ProdusenController::class, 'index'])->name('get.Produsen');
        Route::get('/Produsen/tambah', [App\Http\Controllers\ProdusenController::class, 'tambah'])->name('get.tambah.Produsen');
        Route::post('/Produsen/tambah/proses', [App\Http\Controllers\ProdusenController::class, 'proses_tambah'])->name('post.proses-tambah.Produsen');
        Route::get('/Produsen/detail/{id}', [App\Http\Controllers\ProdusenController::class, 'detail'])->name('get.detail.Produsen');
        Route::get('/Produsen/ubah/{id}', [App\Http\Controllers\ProdusenController::class, 'ubah'])->name('get.ubah.Produsen');
        Route::patch('/Produsen/ubah/proses/{id}', [App\Http\Controllers\ProdusenController::class, 'proses_ubah'])->name('post.proses-ubah.Produsen');
        Route::delete('/Produsen/hapus/{id}', [App\Http\Controllers\ProdusenController::class, 'hapus'])->name('delete.Produsen');
    });


});

// No Prefix and Middleware Auth & Verified
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

    // Profile
    Route::get('/my-profile/{id}', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.home');
    Route::patch('/my-profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // Get Files
    Route::get('/files/profile-picture/{namaFile}', [App\Http\Controllers\FilesController::class, 'showProfilePicture']);
});


