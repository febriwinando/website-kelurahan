<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'tanggal',
        'uraian_kegiatan'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pesertas()
    {
        return $this->hasMany(KegiatanPeserta::class);
    }
}