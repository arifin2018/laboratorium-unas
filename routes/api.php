<?php

use App\Http\Controllers\Api\JurusanProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/allLaboratorium',[DashboardController::class, 'allLaboratorium'])->name('allLaboratorium');
Route::get('/laboratorium',[DashboardController::class, 'whereAllLab'])->name('whereAllLab');
Route::get('jurusan/{prodi_id}',[JurusanProdiController::class, 'Jurusan'])->name('jurusanAPI');
Route::get('prodi',[JurusanProdiController::class, 'Prodi'])->name('ProdiAPI');
