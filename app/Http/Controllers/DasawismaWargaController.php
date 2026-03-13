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
        $dasas = DasawismaWarga::latest()->paginate(10);
        return view('admin.daftardasawisma', compact('dasas'));
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

            // $request->validate([
            //     'no_kk' => 'required|unique:dasawisma_wargas,no_kk',
            //     'balita_l' => 'nullable|integer|min:0',
            //     'balita_p' => 'nullable|integer|min:0',
            //     'pus' => 'nullable|integer|min:0',
            //     'wus' => 'nullable|integer|min:0',
            //     'ibu_hamil' => 'nullable|integer|min:0',
            //     'ibu_menyusui' => 'nullable|integer|min:0',
            //     'lansia' => 'nullable|integer|min:0',
            // ]);

            $request->validate([
                'no_kk' => 'required|unique:dasawisma_wargas,no_kk',
                'balita_l' => 'nullable|integer|min:0',
                'balita_p' => 'nullable|integer|min:0',
                'pus' => 'nullable|integer|min:0',
                'wus' => 'nullable|integer|min:0',
                'ibu_hamil' => 'nullable|integer|min:0',
                'ibu_menyusui' => 'nullable|integer|min:0',
                'lansia' => 'nullable|integer|min:0',
            ],[
                'no_kk.required' => 'No KK wajib dipilih',
                'no_kk.unique' => 'No KK sudah terdaftar di data Dasawisma',

                // 'balita_l.integer' => 'Balita laki-laki harus berupa angka',
                // 'balita_l.min' => 'Balita laki-laki tidak boleh kurang dari 0',

                // 'balita_p.integer' => 'Balita perempuan harus berupa angka',
                // 'balita_p.min' => 'Balita perempuan tidak boleh kurang dari 0',

                // 'pus.integer' => 'Jumlah PUS harus berupa angka',
                // 'pus.min' => 'Jumlah PUS tidak boleh kurang dari 0',

                // 'wus.integer' => 'Jumlah WUS harus berupa angka',
                // 'wus.min' => 'Jumlah WUS tidak boleh kurang dari 0',

                // 'ibu_hamil.integer' => 'Jumlah ibu hamil harus berupa angka',
                // 'ibu_hamil.min' => 'Jumlah ibu hamil tidak boleh kurang dari 0',

                // 'ibu_menyusui.integer' => 'Jumlah ibu menyusui harus berupa angka',
                // 'ibu_menyusui.min' => 'Jumlah ibu menyusui tidak boleh kurang dari 0',

                // 'lansia.integer' => 'Jumlah lansia harus berupa angka',
                // 'lansia.min' => 'Jumlah lansia tidak boleh kurang dari 0',
            ]);

            DasawismaWarga::create([

                'no_kk' => $request->no_kk,
                'nama_keluarga' => $request->nama_keluarga,

                'balita_l' => $request->balita_l ?? 0,
                'balita_p' => $request->balita_p ?? 0,
                'buta_l' => $request->buta_p ?? 0,
                'buta_p' => $request->buta_p ?? 0,
                'pus' => $request->pus ?? 0,
                'wus' => $request->wus ?? 0,
                'ibu_hamil' => $request->ibu_hamil ?? 0,
                'ibu_menyusui' => $request->ibu_menyusui ?? 0,
                'lansia' => $request->lansia ?? 0,

                'rumah_sehat' => $request->rumah_sehat ?? 0,
                'rumah_tidak_sehat' => $request->rumah_kurang_sehat ?? 0,

                'rumah_sehat' => $request->has('rumah_sehat'),
                'rumah_tidak_sehat' => $request->has('rumah_tidak_sehat'),
                'memiliki_tempat_sampah' => $request->has('memiliki_tps'),

                'memiliki_spal' => $request->has('pembuangan_sampah'),
                'memiliki_stiker_p4k' => 0,

                // SUMBER AIR (checkbox)
                'air_pdam' => $request->has('pdam'),
                'air_sumur' => $request->has('sumur'),
                'air_sungai' => $request->has('sungai'),
                'air_lainnya' => $request->has('lainnya_air'),

                'jumlah_jamban_keluarga' => 0,

                'beras' => $request->has('beras'),
                'non_beras' => $request->has('non_beras'),

                'pemanfaatan_tanaman_pekarangan' => $request->has('pemanfaatan_tanaman_pekarangan'),
                'industri_rumah_tangga' => $request->has('industri_rumah_tangga'),
                'kesehatan_lingkungan' => $request->has('kesehatan_lingkungan')

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
    public function edit($id)
    {
        $dasa = DasawismaWarga::findOrFail($id);
        $wargas = Warga::latest()->get();
        // dd($dasa);
        return view('admin.tambahdasawisma', compact(
                'dasa', 'wargas'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $dasa = DasawismaWarga::findOrFail($id);

            $dasa->update([

                'no_kk' => $request->no_kk,
                'nama_keluarga' => $request->nama_keluarga,

                'balita_l' => $request->balita_l,
                'balita_p' => $request->balita_p,
                'buta_l' => $request->buta_l,
                'buta_p' => $request->buta_p,
                'pus' => $request->pus ?? 0,
                'wus' => $request->wus ?? 0,
                'ibu_hamil' => $request->ibu_hamil ?? 0,
                'ibu_menyusui' => $request->ibu_menyusui ?? 0,
                'lansia' => $request->lansia ?? 0,

                'rumah_sehat' => $request->boolean('rumah_sehat'),
                'rumah_tidak_sehat' => $request->boolean('rumah_kurang_sehat'),

                'memiliki_tempat_sampah' => $request->boolean('memiliki_tps'),
                'memiliki_spal' => $request->boolean('pembuangan_sampah'),

                'air_pdam' => $request->boolean('pdam'),
                'air_sumur' => $request->boolean('sumur'),
                'air_sungai' => $request->boolean('sungai'),
                'air_lainnya' => $request->boolean('lainnya_air'),

                'beras' => $request->boolean('beras'),
                'non_beras' => $request->boolean('non_beras'),

                'pemanfaatan_tanaman_pekarangan' => $request->boolean('pemanfaatan_tanaman_pekarangan'),
                'industri_rumah_tangga' => $request->boolean('industri_rumah_tangga'),

            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Dasawisma berhasil diperbarui'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Gagal update data : '.$e->getMessage()
            ], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DasawismaWarga $dasawismaWarga)
    {
        //
    }
}
