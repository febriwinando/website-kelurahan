<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'tanggal',
        'uraian_kegiatan',
        'status',
        'diverifikasi_oleh',
        'tanggal_verifikasi',
        'kode_verifikasi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pesertas()
    {
        return $this->hasMany(KegiatanPeserta::class);
    }
}