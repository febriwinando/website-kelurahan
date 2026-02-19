<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = [
        'nama_barang',
        'diterima_dari',
        'tanggal_penerimaan',
        'jumlah',
        'tempat_penyimpanan',
        'keterangan',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'tanggal_penerimaan' => 'date',
        'is_active' => 'boolean',
    ];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}