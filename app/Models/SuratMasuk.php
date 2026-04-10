<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $fillable = [
        'terima_surat',
        'tanggal_surat',
        'no_surat',
        'dari',
        'perihal',
        'lampiran',
        'diteruskan_kepada',
    ];

    protected $casts = [
        'terima_surat' => 'date',
        'tanggal_surat' => 'date',
        'lampiran' => 'array', 
    ];

}