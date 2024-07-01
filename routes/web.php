<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

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

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginPost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/guru/kelas', [GuruController::class, 'kelas'])->name('guru.kelas');
    Route::post('/guru/addKelas', [GuruController::class, 'addKelas'])->name('guru.addKelas');
    Route::post('/guru/updateKelas', [GuruController::class, 'updateKelas'])->name('guru.updateKelas');
    Route::get('/guru/deleteKelas/{id}', [GuruController::class, 'deleteKelas'])->name('guru.deleteKelas');


    Route::get('/guru/siswa', [GuruController::class, 'siswa'])->name('guru.siswa');
    Route::post('/guru/siswaPost', [GuruController::class, 'siswaPost'])->name('guru.siswaPost');
    Route::post('/siswa/{id}/siswaUpdate', [GuruController::class, 'siswaUpdate'])->name('guru.siswaUpdate');
    Route::get('/siswa/{id}/delete', [GuruController::class, 'deleteSiswa'])->name('guru.deleteSiswa');
    
    Route::get('/guru/mapel', [GuruController::class, 'mapel'])->name('guru.mapel');
    Route::post('/guru/mapelPost', [GuruController::class, 'mapelPost'])->name('guru.mapelPost');
    Route::post('/mata_pelajaran/{id}/update', [GuruController::class, 'update'])->name('mata_pelajaran.update');
    Route::get('/guru/deleteMapel/{id}', [GuruController::class, 'deleteMapel'])->name('guru.deleteMapel');
    
    Route::get('/guru/pilihKelas', [GuruController::class, 'pilihKelas'])->name('guru.pilihKelas');
    Route::get('/guru/nilai/{id}', [GuruController::class, 'nilai'])->name('guru.nilai');
    Route::get('/guru/nilaiPost', [GuruController::class, 'nilaiPost'])->name('guru.nilaiPost');
});
