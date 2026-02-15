<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaTimPenggerakPKKController;
use App\Http\Controllers\JabatanAnggotaTimPenggerakPKKController;

Route::get('/', [BerandaController::class, 'index']);
Route::get('/masuk', [AnggotaTimPenggerakPKKController::class, 'index']);
Route::resource('/form-anggota', AnggotaTimPenggerakPKKController::class);
Route::resource('/form-anggota', JabatanAnggotaTimPenggerakPKKController::class);



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
