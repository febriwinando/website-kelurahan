<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DasawismaWarga extends Model
{
    protected $fillable = [

        'no_kk',
        'nama_keluarga',
        'rw',
        'rt',
        'dasa_wisma',
        'jumlah_kk',

        'jumlah_seluruhnya',
        'balita_l',
        'balita_p',
        'pus',
        'wus',
        'ibu_hamil',
        'ibu_menyusui',
        'lansia',
        'buta_l',
        'buta_p',

        'rumah_sehat',
        'rumah_tidak_sehat',
        'memiliki_tempat_sampah',
        'memiliki_spal',
        'memiliki_stiker_p4k',

        'air_pdam',
        'air_sumur',
        'air_sungai',
        'air_lainnya',

        'jumlah_jamban_keluarga',

        'beras',
        'non_beras',

        'up2k',
        'pemanfaatan_tanaman_pekarangan',
        'industri_rumah_tangga',
        'kesehatan_lingkungan'

    ];

    // public function warga()
    // {
    //     return $this->hasMany(Warga::class, 'no_kk', 'no_kk');
    // }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'no_kk', 'no_kk');
    }
}