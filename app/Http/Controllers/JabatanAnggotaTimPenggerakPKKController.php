<?php

namespace App\Http\Controllers;

use App\Models\JabatanAnggotaTimPenggerakPKK;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Jabatan;

class JabatanAnggotaTimPenggerakPKKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.jabatananggota');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
{
    try {

        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'is_active' => 'required'
        ]);

        $jabatan = Jabatan::create([
            'kode_jabatan' => Str::upper(Str::slug($validated['nama_jabatan'], '_')),
            'nama_jabatan' => $validated['nama_jabatan'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'urutan' => $validated['urutan'] ?? null,
            'is_active' => $validated['is_active'] === 'true' ? 1 : 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Jabatan berhasil ditambahkan.'
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat menyimpan data.'
        ], 500);

    }
}


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_jabatan' => 'required|string|max:255',
    //         'deskripsi' => 'nullable|string',
    //         'urutan' => 'nullable|integer',
    //         'is_active' => 'required'
    //     ]);

    //     Jabatan::create([
    //         'kode_jabatan' => Str::upper(Str::slug($request->nama_jabatan, '_')),
    //         'nama_jabatan' => $request->nama_jabatan,
    //         'deskripsi' => $request->deskripsi,
    //         'urutan' => $request->urutan,
    //         'is_active' => $request->is_active === 'true' ? 1 : 0,
    //     ]);

    //     return redirect()
    //         ->route('jabatan-anggota.index')
    //         ->with('success', 'Jabatan berhasil ditambahkan.');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatanAnggotaTimPenggerakPKK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatanAnggotaTimPenggerakPKK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatanAnggotaTimPenggerakPKK)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatanAnggotaTimPenggerakPKK)
    {
        //
    }
}
