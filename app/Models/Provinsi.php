<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsis';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'nama'];

    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class, 'provinsi_id');
    }
}
