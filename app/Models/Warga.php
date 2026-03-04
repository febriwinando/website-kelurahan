<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $fillable = [
        'dasa_wisma',
        'nama_kepala_keluarga',
        'no_registrasi',
        'nik',
        'nama',
        'jabatan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'status_dalam_keluarga',
        'agama',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'pendidikan',
        'pekerjaan',
        'akseptor_kb',
        'aktif_posyandu',
        'ikut_bkb',
        'memiliki_tabungan',
        'ikut_kelompok_belajar',
        'jenis_kelompok_belajar',
        'ikut_paud',
        'ikut_koperasi',
        'jenis_koperasi'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'akseptor_kb' => 'boolean',
        'aktif_posyandu' => 'boolean',
        'ikut_bkb' => 'boolean',
        'memiliki_tabungan' => 'boolean',
        'ikut_kelompok_belajar' => 'boolean',
        'ikut_paud' => 'boolean',
        'ikut_koperasi' => 'boolean',
    ];
}
