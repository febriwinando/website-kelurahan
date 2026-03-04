<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Warga;
use App\Models\Kabupaten;

class WargaController extends Controller
{
    public function index()
    {
        $kecamatans = Kabupaten::with('provinsi')->get();
        $wargas = Warga::latest()->paginate(10);
        return view('admin.tambahwarga', compact('wargas', 'kecamatans'));
    }

    public function create()
    {
        $kecamatans = Kabupaten::with('provinsi')->get();
        $wargas = Warga::latest()->paginate(10);
        return view('admin.tambahwarga', compact('wargas', 'kecamatans'));
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
}
