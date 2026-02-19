<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::with('jabatan')->latest()->get();
        // $kecamatans = Kecamatan::with('kabupaten.provinsi')->get();
        $kecamatans = Kabupaten::with('provinsi')->get();
        $jabatans = Jabatan::get();
        return view('admin.tambahanggota', compact('anggotas', 'kecamatans', 'jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function edit($id)
        {
            $anggota = Anggota::findOrFail($id);
            $jabatans = Jabatan::all();
            $kecamatans = Kabupaten::with('provinsi')->get();

            return view('admin.tambahanggota', compact(
                'anggota',
                'jabatans',
                'kecamatans'
            ));
        }


    public function list(){
        $anggotas = Anggota::with('jabatan')->latest()->get();
        return view('admin.daftaranggota', compact('anggotas'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {

        $validated = $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required|exists:jabatans,id',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $jabatan = Jabatan::find($request->jabatan_id);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_anggota', 'public');
        }

        $anggota = Anggota::create([
            'nama' => $request->nama,
            'jabatan_id' => $jabatan->id,
            'nama_jabatan' => $jabatan->nama_jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status_perkawinan' => $request->status_perkawinan,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'foto_profil' => $fotoPath,
        ]);

        return response()->json([
            'success' => true,
            'data' => $anggota
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {

        return response()->json([
            'success' => false,
            'errors' => $e->errors()
        ], 422);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $anggota = Anggota::with('jabatan')->findOrFail($id);
        return response()->json($anggota);
    }


    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('foto')) {

            // hapus foto lama jika ada
            if($anggota->foto){
                Storage::disk('public')->delete($anggota->foto);
            }

            $data['foto'] = $request->file('foto')
                                    ->store('anggota', 'public');
        }

        $anggota->update($data);

        return response()->json([
            'success' => true
        ]);
    }

    // public function update(Request $request, $id)
    // {
    //     $anggota = Anggota::findOrFail($id);

    //     $jabatan = Jabatan::find($request->jabatan_id);

    //     $anggota->update([
    //         'nama' => $request->nama,
    //         'jabatan_id' => $jabatan->id,
    //         'nama_jabatan' => $jabatan->nama_jabatan,
    //         'jenis_kelamin' => $request->jenis_kelamin,
    //         'tempat_lahir' => $request->tempat_lahir,
    //         'tanggal_lahir' => $request->tanggal_lahir,
    //         'status_perkawinan' => $request->status_perkawinan,
    //         'alamat' => $request->alamat,
    //         'pendidikan' => $request->pendidikan,
    //         'pekerjaan' => $request->pekerjaan,
    //         'keterangan' => $request->keterangan,
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'data' => $anggota
    //     ]);
    // }

    public function destroy($id)
{
        $anggota = Anggota::findOrFail($id);

        // 🔥 Hapus foto jika ada
        if ($anggota->foto_profil && Storage::disk('public')->exists($anggota->foto_profil)) {
            Storage::disk('public')->delete($anggota->foto_profil);
        }

        $anggota->delete();

        return response()->json([
            'success' => true
        ]);
    }
    // public function destroy($id)
    // {
    //     Anggota::findOrFail($id)->delete();

    //     return response()->json([
    //         'success' => true
    //     ]);
    // }
}
