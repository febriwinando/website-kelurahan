<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $kegiatans = Kegiatan::with('pesertas')->latest()->paginate(10);
        return view('admin.daftarkegiatan', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $kegiatan = Kegiatan::create([
            'tanggal' => $request->tanggal,
            'uraian_kegiatan' => $request->uraian_kegiatan
        ]);

        foreach ($request->nama as $key => $nama) {
            $kegiatan->pesertas()->create([
                'nama' => $nama,
                'jabatan' => $request->jabatan[$key] ?? null
            ]);
        }

        return redirect()->back()->with('success', 'Kegiatan berhasil disimpan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatans = Kegiatan::with('pesertas')->latest()->paginate(10);
        return view('admin.tambahkegiatan', compact('kegiatans'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
}
