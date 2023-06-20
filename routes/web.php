<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\VidioController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');



Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('admin')->group(function () {
        Route::get('jenis-produk', [JenisProdukController::class, 'index'])->name('jenis-produk.index');
        Route::get('jenis-produk/create', [JenisProdukController::class, 'create'])->name('jenis-produk.create');
        Route::post('jenis-produk/create', [JenisProdukController::class, 'store'])->name('jenis-produk.store');
        Route::get('jenis-produk/edit/{id}', [JenisProdukController::class, 'edit'])->name('jenis-produk.edit');
        Route::post('jenis-produk/edit/{id}', [JenisProdukController::class, 'update'])->name('jenis-produk.update');
        Route::delete('jenis-produk/delete/{id}', [JenisProdukController::class, 'destroy'])->name('jenis-produk.destroy');
    
        Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('produk/create', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::post('produk/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    
        Route::get('paket', [PaketController::class, 'index'])->name('paket.index');
        Route::get('paket/create', [PaketController::class, 'create'])->name('paket.create');
        Route::post('paket/create', [PaketController::class, 'store'])->name('paket.store');
        Route::get('paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
        Route::post('paket/edit/{id}', [PaketController::class, 'update'])->name('paket.update');
        Route::delete('paket/delete/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
    
        Route::get('foto', [FotoController::class, 'index'])->name('foto.index');
        Route::get('foto/create', [FotoController::class, 'create'])->name('foto.create');
        Route::post('foto/create', [FotoController::class, 'store'])->name('foto.store');
        Route::get('foto/edit/{id}', [FotoController::class, 'edit'])->name('foto.edit');
        Route::post('foto/edit/{id}', [FotoController::class, 'update'])->name('foto.update');
        Route::delete('foto/delete/{id}', [FotoController::class, 'destroy'])->name('foto.destroy');
    
        Route::get('vidio', [VidioController::class, 'index'])->name('video.index');
        Route::get('vidio/create', [VidioController::class,  'create'])->name('video.create');
        Route::post('vidio/create', [VidioController::class, 'store'])->name('video.store');
        Route::get('vidio/edit/{id}', [VidioController::class, 'edit'])->name('video.edit');
        Route::post('vidio/edit/{id}', [VidioController::class, 'update'])->name('video.update');
        Route::delete('vidio/delete/{id}', [VidioController::class, 'destroy'])->name('video.destroy');
    });

});
