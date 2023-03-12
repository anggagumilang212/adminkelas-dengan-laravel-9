<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jadwal_piketController;
use App\Http\Controllers\NamaguruController;

use App\Http\Controllers\JadwalpelajaranController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UangkasController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\EnsureTokenIsValid;

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



// Login Routes
Route::get('/', [LoginController::class, 'FormLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/simpanregister', [RegisterController::class, 'simpanregister']);

Route::middleware(['auth'])->group(function (){
//jurusan
Route::get('/jurusan', [AdminController::class, 'jurusan']);
Route::post('/prosesJurusan', [AdminController::class, 'prosesJurusan']);
Route::get('/hapusJurusan/{id}',[AdminController::class, 'hapusJurusan']);


// absensi

 Route::get('/absensi', [AbsensiController::class, 'index']);
 Route::post('/add-absensi', [AbsensiController::class, 'store']);
 Route::post('/edit-absensi', [AbsensiController::class, 'edit']);
 Route::get('/delete-absensi/{id}', [AbsensiController::class, 'delete']);
    

//jadwal_piket
Route::get('/jadwal_piket', [jadwal_piketController::class, 'index']);
Route::post('/add-jadwal_piket', [jadwal_piketController::class, 'store']);
Route::post('/edit-jadwal_piket', [jadwal_piketController::class, 'edit']);
Route::get('/delete-jadwal_piket/{id}', [jadwal_piketController::class, 'delete']);


// nama guru
Route::get('/namaguru', [NamaguruController::class, 'index']);
Route::post('/add-namaguru', [NamaguruController::class, 'store']);
Route::post('/edit-namaguru', [NamaguruController::class, 'edit']);
Route::get('/delete-namaguru/{id}', [NamaguruController::class, 'delete']);

// uangkas
Route::get('/uangkas', [uangkasController::class, 'index']);
Route::post('/add-uangkas', [uangkasController::class, 'store']);
Route::post('/edit-uangkas', [uangkasController::class, 'edit']);
Route::get('/delete-uangkas/{id}', [uangkasController::class, 'delete']);

// jadwalpelajaran
Route::get('/jadwalpelajaran', [jadwalpelajaranController::class, 'index']);
Route::post('/add-jadwalpelajaran', [jadwalpelajaranController::class, 'store']);
Route::post('/edit-jadwalpelajaran', [jadwalpelajaranController::class, 'edit']);
Route::get('/delete-jadwalpelajaran/{id}', [jadwalpelajaranController::class, 'delete']);

Route::get('/dashboard', [DashboardController::class, 'index']);
});