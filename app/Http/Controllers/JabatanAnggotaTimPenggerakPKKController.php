<?php

namespace App\Http\Controllers;

use App\Models\JabatanAnggotaTimPenggerakPKK;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;

class JabatanAnggotaTimPenggerakPKKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::orderBy('urutan')->get();
        return view('admin.jabatananggota', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_jabatan' => 'required|string|max:255',
    //         'deskripsi' => 'nullable|string',
    //         'urutan' => 'nullable|integer',
    //         'is_active' => 'required'
    //     ]);

    //     $jabatan = Jabatan::create([
    //         'kode_jabatan' => Str::upper(Str::slug($request->nama_jabatan, '_')),
    //         'nama_jabatan' => $request->nama_jabatan,
    //         'deskripsi' => $request->deskripsi,
    //         'urutan' => $request->urutan,
    //         'is_active' => $request->is_active === 'true' ? 1 : 0,
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'data' => $jabatan
    //     ]);
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'is_active' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        
        $jabatan = Jabatan::create([
            'kode_jabatan' => Str::upper(Str::slug($request->nama_jabatan, '_')),
            'nama_jabatan' => $request->nama_jabatan,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan,
            'is_active' => $request->is_active === 'true' ? 1 : 0,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jabatan
        ], 200);
    }

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
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return response()->json($jabatan);
    }



    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        $jabatan->update([
            'nama_jabatan' => $request->nama_jabatan,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan,
            'is_active' => $request->is_active === 'true' ? 1 : 0,
        ]);

        return response()->json([
            'success' => true,
            'data' => $jabatan
        ]);

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jabatan::destroy($id);

        return response()->json([
            'success' => true
        ]);

    }

}
