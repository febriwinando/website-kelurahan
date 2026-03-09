<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Warga;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use App\Models\Kelurahan;


class WargaController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::orderBy('nama')->get();
        $kecamatans = Kabupaten::with('provinsi')->get();
        $wargas = Warga::latest()->paginate(10);
        $wargas = Warga::selectRaw('MIN(id) as id, no_kk, nama_kepala_keluarga')
        ->groupBy('no_kk','nama_kepala_keluarga')
        ->paginate(10);
        return view('admin.daftarwarga', compact('wargas', 'kecamatans','provinsis'));
    }

    public function create()
    {
        $provinsis = Provinsi::orderBy('nama')->get();
        $kabupatens = Kabupaten::with('provinsi')->get();
        $wargas = Warga::latest()->paginate(10);
        return view('admin.tambahwarga', compact('wargas', 'kabupatens','provinsis'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // checkbox boolean handling
        $checkboxes = [
            'akseptor_kb',
            'aktif_posyandu',
            'ikut_bkb',
            'memiliki_tabungan',
            'ikut_kelompok_belajar',
            'ikut_paud',
            'ikut_koperasi'
        ];

        // foreach ($checkboxes as $check) {
        //     $data[$check] = $request->has($check) ? 1 : 0;
        // }

        foreach ($checkboxes as $check) {
            $data[$check] = $request->$check;
        }

        Warga::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function lihat($no_kk)
    {
        $wargas = Warga::where('no_kk', $no_kk)->get();
        
        return view('admin.editwarga', compact(
                'wargas',
        ));
    }
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);

        $provinsis = Provinsi::orderBy('nama')->get();

        $kabupatens = Kabupaten::get();

        // $kecamatans = Kecamatan::where('kabupaten_id', $warga->kabupaten_id)->get();

        // $kelurahans = Kelurahan::where('kecamatan_id', $warga->kecamatan_id)->get();

        return view('admin.tambahwarga', compact(
            'warga',
            'provinsis',
            'kabupatens',
            // 'kecamatans',
            // 'kelurahans'
        ));
    }
    // public function edit($id)
    // {
    //     $warga = Warga::findOrFail($id);

    //     $provinsis = Provinsi::all();
    //     $kabupatens = Kabupaten::with('provinsi')->where('id', $warga->kabupaten)->get();
    //     $kecamatans = Kecamatan::with('kabupaten')->where('id',$warga->kecamatan)->get();
    //     $kelurahans = Kelurahan::where('id',$warga->kelurahan)->get();

    //     return view('admin.tambahwarga', compact(
    //         'warga',
    //         'provinsis',
    //         'kabupatens',
    //         'kecamatans',
    //         'kelurahans'
    //     ));
    // }

    public function update(Request $request, $id)
{
    $warga = Warga::findOrFail($id);

    $validated = $request->validate([
        'dasa_wisma' => 'nullable|string|max:100',
        'nama_kepala_keluarga' => 'nullable|string|max:100',
        'no_kk' => 'nullable|string|max:20',
        'no_registrasi' => 'nullable|string|max:50',
        'nik' => 'nullable|string|max:20',
        'nama' => 'nullable|string|max:100',
        'jabatan' => 'nullable|string|max:100',
        'jenis_kelamin' => 'nullable|string',
        'tempat_lahir' => 'nullable',
        'tanggal_lahir' => 'nullable|date',
        'status_perkawinan' => 'nullable|string',
        'status_dalam_keluarga' => 'nullable|string',
        'agama' => 'nullable|string',
        'alamat' => 'nullable|string',

        'provinsi' => 'nullable',
        'kabupaten' => 'nullable',
        'kecamatan' => 'nullable',
        'kelurahan' => 'nullable',

        'pendidikan' => 'nullable|string',
        'pekerjaan' => 'nullable|string',

        'jenis_kelompok_belajar' => 'nullable|string',
        'jenis_koperasi' => 'nullable|string',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Boolean Fields
    |--------------------------------------------------------------------------
    */

    $booleanFields = [
        'akseptor_kb',
        'aktif_posyandu',
        'ikut_bkb',
        'memiliki_tabungan',
        'ikut_kelompok_belajar',
        'ikut_paud',
        'ikut_koperasi'
    ];

    foreach ($booleanFields as $field) {
        $validated[$field] = $request->input($field, 0);
    }

    $warga->update($validated);

    return response()->json([
        'message' => 'Data warga berhasil diperbarui'
    ]);
}



public function kabupaten($provinsi_id)
{
    return Kabupaten::where('provinsi_id', $provinsi_id)->get();
}

public function kecamatan($kabupaten_id)
{
    return Kecamatan::where('kabupaten_id', $kabupaten_id)->get();
}

public function kelurahan($kecamatan_id)
{
    return Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
}
}
