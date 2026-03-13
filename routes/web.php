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
use App\Http\Controllers\DasawismaWargaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LingkunganController;
use App\Http\Controllers\SubLingkunganController;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

// Beranda SI-AP
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::middleware(['auth','role:administrator,admin'])->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');  

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
    Route::get('warga/{no_kk}/lihat', [WargaController::class, 'lihat'])->name('warga.lihat');
    Route::post('/warga/store', [WargaController::class, 'store'])->name('warga.store');
    Route::resource('warga', WargaController::class);

    // Dasawisma Warga
    Route::resource('dasawisma', DasawismaWargaController::class);

    // User
    Route::put('/pengguna/{id}', [UserController::class, 'update']);
    Route::resource('pengguna', UserController::class);


    Route::get('/get-kabupaten/{provinsi}', [WargaController::class, 'kabupaten']);
    Route::get('/get-kecamatan/{kabupaten}', [WargaController::class, 'kecamatan']);
    Route::get('/get-kelurahan/{kecamatan}', [WargaController::class, 'kelurahan']);


    Route::get('/kabupaten/{provinsi_id}', function ($provinsi_id) {
        return Kabupaten::where('provinsi_id', $provinsi_id)->get();
    });

    Route::get('/kecamatan/{kabupaten_id}', function ($kabupaten_id) {
        return Kecamatan::where('kabupaten_id', $kabupaten_id)->get();
    });

    Route::get('/kelurahan/{kecamatan_id}', function ($kecamatan_id) {
        return Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
    });


    //Lingkungan
    Route::resource('/lingkungan', LingkunganController::class);
    Route::resource('/sub-lingkungan', SubLingkunganController::class);
});


Route::middleware(['guest.redirect'])->group(function () {
    Route::get('/masuk', [LoginController::class, 'index'])->name('login');
    Route::post('/masuk', [LoginController::class, 'login'])->name('login.post');
});

