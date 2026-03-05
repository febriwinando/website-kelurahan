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
use App\Http\Controllers\WargaController;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

// Route::get('/', [BerandaController::class, 'index']);
// Route::get('/masuk', [AnggotaTimPenggerakPKKController::class, 'index']);

// Jabatan
Route::resource('/jabatan-anggota', JabatanAnggotaTimPenggerakPKKController::class);

// Anggota PKK
Route::resource('/form-anggota', AnggotaTimPenggerakPKKController::class);
Route::resource('anggota', AnggotaController::class);
Route::get('/daftar-anggota', [AnggotaController::class, 'list'])->name('list');

Route::resource('/inventaris', InventarisController::class);

// Notulen
Route::put('/verifikasi/notulen/{id}', [NotulenController::class, 'verifikasi'])->name('notulen.verifikasi');
Route::resource('/notulen', NotulenController::class);

// Keuangan
Route::post('/keuangan/store-multiple', [KeuanganController::class, 'storeMultiple'])->name('keuangan.storeMultiple');
Route::put('/verifikasi/keuangan/{id}', [KeuanganController::class, 'verifikasi'])->name('keuangan.verifikasi');
Route::put('/keuangan/{keuangan}', [KeuanganController::class, 'update']);
Route::resource('/keuangan', KeuanganController::class);

// Kegiatan dan Peserta
Route::post('/peserta', [KegiatanController::class, 'storeTambah'])->name('peserta.store');
Route::put('/peserta/{id}', [KegiatanController::class, 'updatePeserta'])->name('peserta.update');
Route::delete('/peserta/{id}', [KegiatanController::class, 'destroyPeserta'])->name('peserta.destroy');
Route::put('/verifikasi/kegiatan/{id}', [KegiatanController::class, 'verifikasi'])->name('kegiatan.verifikasi');
Route::resource('kegiatan', KegiatanController::class);

// Warga
Route::post('/warga/store', [WargaController::class, 'store'])->name('warga.store');
Route::resource('warga', WargaController::class);


Route::get('/get-kabupaten/{provinsi_id}', function ($provinsi_id) {
    return Kabupaten::where('provinsi_id', $provinsi_id)->get();
});

Route::get('/get-kecamatan/{kabupaten_id}', function ($kabupaten_id) {
    return Kecamatan::where('kabupaten_id', $kabupaten_id)->get();
});

Route::get('/get-kelurahan/{kecamatan_id}', function ($kecamatan_id) {
    return Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
});


Route::middleware(['auth', 'role:administrator,user'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');    
});


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


Route::get('/get-kabupaten/{provinsi}', [WargaController::class, 'kabupaten']);
Route::get('/get-kecamatan/{kabupaten}', [WargaController::class, 'kecamatan']);
Route::get('/get-kelurahan/{kecamatan}', [WargaController::class, 'kelurahan']);

