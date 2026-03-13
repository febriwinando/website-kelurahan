<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lingkungan extends Model
{
    protected $fillable = [
        'nama_lingkungan',
        'keterangan',
        'status',
        'created_by',
        'updated_by'
    ];

    public function subLingkungan()
    {
        return $this->hasMany(SubLingkungan::class);
    }
}
