<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaTimPenggerakPKKController;
use App\Http\Controllers\JabatanAnggotaTimPenggerakPKKController;
use App\Http\Controllers\AnggotaController;

Route::get('/', [BerandaController::class, 'index']);
Route::get('/masuk', [AnggotaTimPenggerakPKKController::class, 'index']);

Route::resource('/form-anggota', AnggotaTimPenggerakPKKController::class);
Route::resource('/jabatan-anggota', JabatanAnggotaTimPenggerakPKKController::class);
Route::resource('anggota', AnggotaController::class);

Route::get('/daftar-anggota', [AnggotaController::class, 'list'])->name('list');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
