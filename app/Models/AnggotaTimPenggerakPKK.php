<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaTimPenggerakPKK extends Model
{
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

}
