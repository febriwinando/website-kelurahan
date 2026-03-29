<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaSubLingkungan extends Model
{
    protected $table = 'area_sub_lingkungans';

    protected $fillable = [
        'user_id',
        'sub_lingkungan_id'
    ];

    // ================= RELASI =================

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subLingkungan()
    {
        return $this->belongsTo(SubLingkungan::class);
    }
}