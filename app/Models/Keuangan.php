<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keuangan extends Model
{
    use HasFactory;

    protected $table = 'keuangans';

    protected $fillable = [
        'kegiatan_id',
        'tanggal',
        'jenis', // pemasukan / pengeluaran
        'nomor_bukti',
        'uraian',
        'jumlah',
        'saldo',
        'dibuat_oleh',
        'diubah_oleh'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
        'saldo' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function pengedit()
    {
        return $this->belongsTo(User::class, 'diubah_oleh');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPE
    |--------------------------------------------------------------------------
    */

    public function scopePemasukan($query)
    {
        return $query->where('jenis', 'pemasukan');
    }

    public function scopePengeluaran($query)
    {
        return $query->where('jenis', 'pengeluaran');
    }

    public function scopeBulan($query, $bulan)
    {
        return $query->whereMonth('tanggal', $bulan);
    }

    public function scopeTahun($query, $tahun)
    {
        return $query->whereYear('tanggal', $tahun);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR FORMAT
    |--------------------------------------------------------------------------
    */

    public function getFormatJumlahAttribute()
    {
        return number_format($this->jumlah, 0, ',', '.');
    }

    public function getFormatSaldoAttribute()
    {
        return number_format($this->saldo, 0, ',', '.');
    }
}