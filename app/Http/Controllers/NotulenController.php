<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NotulenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $notulens = Notulen::latest()->get();
        return view('admin.daftarnotulen', compact('notulens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $anggotas = Anggota::with('jabatan')->latest()->get();
        return view('admin.tambahnotulen', compact('anggotas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'tanggal' => 'required|date',
                'waktu' => 'required',
                'tempat' => 'required|string|max:255',
                'macam' => 'nullable|string|max:255',
                'pimpinan_rapat' => 'required|exists:anggotas,id',
                'jumlah_diundang' => 'nullable|integer|min:0',
                'jumlah_hadir' => 'nullable|integer|min:0',
                'jumlah_tidak_hadir' => 'nullable|integer|min:0',
                'susunan_acara' => 'nullable|string',
                'keputusan' => 'nullable|string',
                'lain_lain' => 'nullable|string',
                'penutup' => 'nullable|string',
                'foto_dokumentasi.*' => 'image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $data = $request->only([
                'tanggal',
                'waktu',
                'tempat',
                'macam',
                'pimpinan_rapat',
                'jumlah_diundang',
                'jumlah_hadir',
                'jumlah_tidak_hadir',
                'susunan_acara',
                'keputusan',
                'lain_lain',
                'penutup',
            ]);

            $data['dibuat_oleh'] = Auth::id();

            
            $paths = [];

            if ($request->hasFile('foto_dokumentasi')) {

                foreach ($request->file('foto_dokumentasi') as $file) {

                    $filename = time().'_'.$file->getClientOriginalName();

                    $paths[] = $file->storeAs('notulen', $filename, 'public');
                }

                $data['foto_dokumentasi'] = $paths;
            }

            $notulen = Notulen::create($data);
            


            // return redirect()->back()->with('success', 'Notulen berhasil disimpan');

            return response()->json([
                'success' => true,
                'data' => $notulen
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
    public function show(Notulen $notulen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $notulen = Notulen::findOrFail($id);
            $anggotas = Anggota::with('jabatan')->latest()->get();
            return view('admin.tambahnotulen', compact(
                'notulen', 'anggotas'
            ));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $notulen = Notulen::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required|string|max:255',
            'macam' => 'nullable|string|max:255',
            'pimpinan_rapat' => 'required|exists:anggotas,id',
            'jumlah_diundang' => 'nullable|integer|min:0',
            'jumlah_hadir' => 'nullable|integer|min:0',
            'jumlah_tidak_hadir' => 'nullable|integer|min:0',
            'susunan_acara' => 'nullable|string',
            'keputusan' => 'nullable|string',
            'lain_lain' => 'nullable|string',
            'penutup' => 'nullable|string',
            'foto_dokumentasi.*' => 'image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $data = $request->only([
            'tanggal',
            'waktu',
            'tempat',
            'macam',
            'pimpinan_rapat',
            'jumlah_diundang',
            'jumlah_hadir',
            'jumlah_tidak_hadir',
            'susunan_acara',
            'keputusan',
            'lain_lain',
            'penutup',
        ]);

        $data['diubah_oleh'] = Auth::id();

        if ($request->hasFile('foto_dokumentasi')) {

            $oldPhotos = $notulen->foto_dokumentasi ?? [];

            $newPhotos = [];

            foreach ($request->file('foto_dokumentasi') as $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $newPhotos[] = $file->storeAs('notulen', $filename, 'public');
            }

            // Gabungkan lama + baru
            $data['foto_dokumentasi'] = array_merge($oldPhotos, $newPhotos);
        }

        $notulen->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data inventaris berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notulen $notulen)
    {
        //
    }
}
