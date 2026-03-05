<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Warga;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;


class WargaController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::orderBy('nama')->get();
        $kecamatans = Kabupaten::with('provinsi')->get();
        $wargas = Warga::latest()->paginate(10);
        return view('admin.daftarwarga', compact('wargas', 'kecamatans','provinsis'));
    }

    public function create()
    {
        $provinsis = Provinsi::orderBy('nama')->get();
        $kecamatans = Kabupaten::with('provinsi')->get();
        $wargas = Warga::latest()->paginate(10);
        return view('admin.tambahwarga', compact('wargas', 'kecamatans','provinsis'));
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

        foreach ($checkboxes as $check) {
            $data[$check] = $request->has($check) ? 1 : 0;
        }

        Warga::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);

        $provinsis = Provinsi::all();
        $kecamatans = Kabupaten::with('provinsi')->get();

        return view('admin.tambahwarga', compact(
            'warga',
            'provinsis',
            'kecamatans'
        ));
    }
}
