<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaTimPenggerakPKKController;
use App\Http\Controllers\JabatanAnggotaTimPenggerakPKKController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KegiatanController;

// Route::get('/', [BerandaController::class, 'index']);
Route::get('/masuk', [AnggotaTimPenggerakPKKController::class, 'index']);
Route::resource('/form-anggota', AnggotaTimPenggerakPKKController::class);
Route::resource('/jabatan-anggota', JabatanAnggotaTimPenggerakPKKController::class);
Route::resource('anggota', AnggotaController::class);

Route::get('/daftar-anggota', [AnggotaController::class, 'list'])->name('list');

Route::resource('/inventaris', InventarisController::class);

Route::put('/verifikasi/notulen/{id}', [NotulenController::class, 'verifikasi'])->name('notulen.verifikasi');

Route::resource('/notulen', NotulenController::class);

Route::post('/keuangan/store-multiple', [KeuanganController::class, 'storeMultiple'])->name('keuangan.storeMultiple');

Route::put('/verifikasi/keuangan/{id}', [KeuanganController::class, 'verifikasi'])->name('keuangan.verifikasi');
Route::put('/keuangan/{keuangan}', [KeuanganController::class, 'update']);
// Route::put('/keuangan/update-multiple', [KeuanganController::class, 'updateMultiple'])->name('keuangan.updateMultiple');
Route::resource('/keuangan', KeuanganController::class);

Route::put('/peserta/{id}', [KegiatanController::class, 'updatePeserta'])->name('peserta.update');
Route::delete('/peserta/{id}', [KegiatanController::class, 'destroyPeserta'])->name('peserta.destroy');
Route::put('/verifikasi/kegiatan/{id}', [KegiatanController::class, 'verifikasi'])->name('kegiatan.verifikasi');
Route::resource('kegiatan', KegiatanController::class);

Route::middleware(['auth', 'role:administrator,user'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');    
});


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

