<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    protected $fillable = [
        'tanggal',
        'waktu',
        'tempat',
        'macam',
        'pimpinan_rapat',
        'jumlah_diundang',
        'jumlah_hadir',
        'jumlah_tidak_hadir',
        'susunan_acara',
        'keputusan',
        'lain_lain',
        'penutup',
        'tanggal_disahkan',
        'tempat_disahkan',
        'foto_dokumentasi',
        'dibuat_oleh',
        'diubah_oleh'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'tanggal_disahkan' => 'date',
        'waktu' => 'datetime:H:i',
        'foto_dokumentasi' => 'array', 
    ];

    // Relasi ke user pembuat
    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    // Relasi ke user pengedit
    public function pengedit()
    {
        return $this->belongsTo(User::class, 'diubah_oleh');
    }
}