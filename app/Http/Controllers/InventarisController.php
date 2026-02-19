<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        Inventaris::create($request->all());

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

        $inventaris->update($request->all());

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
