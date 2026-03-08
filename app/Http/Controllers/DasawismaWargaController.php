<?php

namespace App\Http\Controllers;

use App\Models\DasawismaWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class DasawismaWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wargas = Warga::latest()->get();
        return view('admin.tambahdasawisma', compact('wargas'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {

            $request->validate([
                'no_kk' => 'required'
            ]);

            DasawismaWarga::create([

                'no_kk' => $request->no_kk,
                'nama_keluarga' => $request->nama_keluarga,

                'balita_l' => $request->balita ?? 0,
                'balita_p' => 0,

                'pus' => $request->pus ?? 0,
                'wus' => $request->wus ?? 0,
                'ibu_hamil' => $request->ibu_hamil ?? 0,
                'ibu_menyusui' => $request->ibu_menyusui ?? 0,
                'lansia' => $request->lansia ?? 0,

                'rumah_sehat' => $request->rumah_sehat ?? 0,
                'rumah_tidak_sehat' => $request->rumah_kurang_sehat ?? 0,

                'memiliki_tempat_sampah' => $request->has('memiliki_tps'),
                'memiliki_spal' => $request->has('pembuangan_sampah'),
                'memiliki_stiker_p4k' => 0,

                // SUMBER AIR (checkbox)
                'air_pdam' => $request->has('pdam'),
                'air_sumur' => $request->has('sumur'),
                'air_sungai' => $request->has('sungai'),
                'air_lainnya' => $request->has('lainnya_air'),

                'jumlah_jamban_keluarga' => 0,

                'beras' => $request->beras ?? 0,
                'non_beras' => $request->non_beras ?? 0,

                'pemanfaatan_tanaman_pekarangan' => 0,
                'industri_rumah_tangga' => 0,
                'kesehatan_lingkungan' => 0

            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Dasawisma berhasil disimpan'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data : '.$e->getMessage()
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DasawismaWarga $dasawismaWarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DasawismaWarga $dasawismaWarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DasawismaWarga $dasawismaWarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DasawismaWarga $dasawismaWarga)
    {
        //
    }
}
