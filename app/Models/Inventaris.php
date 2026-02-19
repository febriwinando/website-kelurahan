<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    protected $fillable = [
        'nama_barang',
        'diterima_dari',
        'tanggal_penerimaan',
        'jumlah',
        'tempat_penyimpanan',
        'keterangan',
        'is_active',
    ];

    protected $casts = [
        'tanggal_penerimaan' => 'date',
        'is_active' => 'boolean',
    ];
}
