<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubLingkungan extends Model
{
    protected $fillable = [
        'lingkungan_id',
        'nama_sub_lingkungan',
        'keterangan',
        'status',
        'created_by',
        'updated_by'
    ];

    public function lingkungan()
    {
        return $this->belongsTo(Lingkungan::class);
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'area_sub_lingkungans'
        );
    }


    public function dasawismaWargas()
    {
        return $this->hasMany(
            DasawismaWarga::class,
            'dasa_wisma',          // foreign key di dasawisma_wargas
            'nama_sub_lingkungan'  // local key di sub_lingkungan
        );
    }
}
