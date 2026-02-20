<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    public function index()
    {
        $inventariss = Inventaris::latest()->get();

        return view('admin.daftarinventaris', compact('inventariss'));
    }

    public function create()
        {
            $inventariss = Inventaris::latest()->get();

            return view('admin.tambahinventaris', compact('inventariss'));
    }

    public function edit($id)
        {
            $inventaris = Inventaris::findOrFail($id);

            return view('admin.tambahinventaris', compact(
                'inventaris',
            ));
        }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto_inventaris')) {
            $fotoPath = $request->file('foto_inventaris')->store('foto_inventaris', 'public');
        }

        Inventaris::create([
            'nama_barang' => $request->nama_barang,
            'diterima_dari' => $request->diterima_dari,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'jumlah' => $request->jumlah,
            'tempat_penyimpanan' => $request->tempat_penyimpanan,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'kondisi' => $request->kondisi,
            'foto_inventaris' => $fotoPath,
            'created_by' => Auth::id(),
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
