<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Admin\UserController;


use App\Http\Controllers\DetailsLabController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\ImagesBeritaController;
use App\Http\Controllers\Admin\DetailRuanganController;
use App\Http\Controllers\Admin\TransaksiDetailController;
use App\Http\Controllers\Admin\DashboardCaraoselController;
use App\Http\Controllers\Admin\ImagesDetailRuanganController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;



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

route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function(){
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-index');
        Route::resource('users', UserController::class);
        Route::resource('dashboard-caraosel', DashboardCaraoselController::class);
        Route::resource('detail-ruangan', DetailRuanganController::class);
        Route::resource('images-detail-ruangan', ImagesDetailRuanganController::class);
        Route::resource('berita', BeritaController::class);
        Route::resource('images-berita', ImagesBeritaController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('transaksi', AdminTransaksiController::class);
        Route::resource('transaksi-detail', TransaksiDetailController::class);
        Route::resource('visi-misi', VisiMisiController::class);
        Route::resource('prodi', ProdiController::class);
        Route::resource('jurusan', JurusanController::class);
    });

    Route::get('/',[DashboardController::class, 'index']);
    Route::get('/visi-misi', [DashboardController::class, 'visimisi'])->name('visimisi');
    Route::get('/Laboratorium',[DashboardController::class, 'Laboratorium'])->name('Laboratorium');
    Route::get('/berita',[DashboardController::class, 'semuaberita'])->name('semua-berita');
    Route::get('/berita/{berita:slug}',[DashboardController::class, 'berita'])->name('details-berita');
    Route::get('/Laboratorium/{DetailRuangan:slug}',[DetailsLabController::class, 'index'])->name('details-lab');
    Route::get('/Laboratorium/transaksi/{DetailRuangan:slug}',[TransaksiController::class, 'index'])->name('transaksiLab')->middleware(['auth']);
    Route::post('/details-lab/transaksi/{DetailRuangan:slug}', [TransaksiController::class, 'transaksi'])->name('transaksi')->middleware(['auth']);
    Route::get('/transaksi/berhasil', [TransaksiController::class, 'success'])->name('transaksi-success')->middleware(['auth']);
    Route::get('/status', [TransaksiController::class, 'status'])->name('transaksi-status')->middleware(['auth']);
    Auth::routes();
