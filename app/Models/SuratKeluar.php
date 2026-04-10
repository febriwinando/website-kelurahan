<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = [
        'no_surat',
        'tanggal_surat',
        'kepada',
        'perihal',
        'lampiran',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
        'lampiran' => 'array', 
    ];

}