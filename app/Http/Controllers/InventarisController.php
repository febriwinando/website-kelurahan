<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::where('is_active', true)
                        ->latest()
                        ->get();

        return view('inventaris.index', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        Inventaris::create([
            'nama_barang' => $request->nama_barang,
            'diterima_dari' => $request->diterima_dari,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'jumlah' => $request->jumlah,
            'tempat_penyimpanan' => $request->tempat_penyimpanan,
            'keterangan' => $request->keterangan,
            'created_by' => Auth::id(), // 🔥 session user
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data inventaris berhasil ditambahkan'
        ]);
    }

    public function update(Request $request, $id)
    {
        $inventaris = Inventaris::findOrFail($id);

        $validated = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $inventaris->update([
            'nama_barang' => $request->nama_barang,
            'diterima_dari' => $request->diterima_dari,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'jumlah' => $request->jumlah,
            'tempat_penyimpanan' => $request->tempat_penyimpanan,
            'keterangan' => $request->keterangan,
            'updated_by' => Auth::id(), // 🔥 session user
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data inventaris berhasil diupdate'
        ]);
    }


    // 🔥 Tidak hapus permanen, hanya nonaktifkan
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);

        $inventaris->update([
            'is_active' => false
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Inventaris berhasil dinonaktifkan'
        ]);
    }
}
