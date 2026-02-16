<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_jabatan',
        'nama_jabatan',
        'deskripsi',
        'urutan',
        'is_active',
    ];

    // public function anggotaTim()
    // {
    //     return $this->hasMany(AnggotaTimPenggerakPKK::class, 'jabatan_id');
    // }
}
