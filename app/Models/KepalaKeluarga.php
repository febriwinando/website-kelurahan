<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


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

    public function warga()
    {
        return $this->hasMany(Warga::class, 'no_kk', 'no_kk');
    }


    // relasi ke dasawisma warga (lewat warga)
    public function dasawismaWargas()
    {
        return $this->hasManyThrough(
            DasawismaWarga::class,
            Warga::class,
            'no_kk',      // FK di warga
            'no_kk',      // FK di dasawisma_wargas
            'no_kk',      // local key di kepala_keluarga
            'no_kk'       // local key di warga 🔥 WAJIB
        );
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


    protected static function booted()
    {
        static::creating(function ($model) {

            do {
                $kode = 'KK-' . strtoupper(Str::random(8));
            } while (self::where('kode_unik', $kode)->exists());

            // 🔥 DI SINI DISIMPAN
            $model->kode_unik = $kode;
        });
    }
}
