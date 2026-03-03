<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPeserta extends Model
{
    protected $fillable = [
        'kegiatan_id',
        'nama',
        'jabatan',
        'tanda_tangan'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}