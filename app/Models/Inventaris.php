<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'nama_barang',
        'diterima_dari',
        'tanggal_penerimaan',
        'jumlah',
        'tempat_penyimpanan',
        'keterangan',
        'status',
        'kondisi',
        'foto_inventaris',
        'created_by',
        'updated_by',
    ];

    // protected $casts = [
    //     'tanggal_penerimaan' => 'date',
    // ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


    public function scopeTersedia($query)
    {
        return $query->where('status', 'tersedia');
    }

    
    public function scopeRusak($query)
    {
        return $query->whereIn('kondisi', [
            'rusak_ringan',
            'rusak_berat'
        ]);
    }
}
