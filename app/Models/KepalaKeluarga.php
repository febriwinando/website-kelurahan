<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class KepalaKeluarga extends Model
{
    protected $table = 'kepala_keluargas';

    protected $fillable = [
        'dasa_wisma',
        'nama_kepala_keluarga',
        'no_registrasi',
        'no_kk',
        'nik',
    ];

    /**
     * Relasi ke Warga (1 KK punya banyak anggota)
     */
    public function warga()
    {
        return $this->hasMany(Warga::class, 'no_kk', 'no_kk');
    }

     public function scopeByNoKK($query, $no_kk)
    {
        return $query->where('no_kk', $no_kk);
    }

    public function subLingkungan()
    {
        return $this->belongsTo(
            SubLingkungan::class,
            'dasa_wisma',
            'nama_sub_lingkungan'
        );
    }
}
