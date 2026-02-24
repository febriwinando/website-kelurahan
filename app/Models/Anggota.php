<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'nama',
        'jabatan_id',
        'nama_jabatan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'alamat',
        'pendidikan',
        'pekerjaan',
        'keterangan',
        'status',      
        'foto_profil', 
    ];

    // Relasi ke Jabatan
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}