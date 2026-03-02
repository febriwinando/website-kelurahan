<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Anggota;
use App\Models\Jabatan;
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

        // $notulens = Notulen::latest()->get();
        $notulens = Notulen::with('anggota')->latest()->get();
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
        // dd($request->all(), $request->file('foto_dokumentasi'));
        try {
            $request->validate([
                'tanggal' => 'required|date',
                'waktu' => 'required',
                'tempat' => 'required|string|max:255',
                'macam' => 'nullable|string|max:255',
                'anggota_id' => 'required|exists:anggotas,id',
                'nama_anggota' => 'nullable|string',
                'jumlah_diundang' => 'nullable|integer|min:0',
                'jumlah_hadir' => 'nullable|integer|min:0',
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
                'anggota_id',
                'nama_anggota',
                'jumlah_diundang',
                'jumlah_hadir',
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
            // $notulen = Notulen::findOrFail($id);
            $notulen = Notulen::with('anggota')->findOrFail($id);
            $notulens = Notulen::with('anggota')->get();
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
        try {

            $notulen = Notulen::findOrFail($id);

            $validated = $request->validate([
                'tanggal' => 'required|date',
                'waktu' => 'required',
                'tempat' => 'required',
                'macam' => 'required',
                'pimpinan_rapat' => 'required',
                'foto_dokumentasi.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = $request->except(['foto_dokumentasi','old_photos']);

            $oldPhotos = $request->old_photos ?? [];

            $newPhotos = [];

            // Upload foto baru
            if ($request->hasFile('foto_dokumentasi')) {

                foreach ($request->file('foto_dokumentasi') as $file) {

                    $filename = time().'_'.$file->getClientOriginalName();

                    $newPhotos[] = $file->storeAs('notulen', $filename, 'public');
                }
            }

            // Gabungkan foto lama yg dipertahankan + foto baru
            $finalPhotos = array_merge($oldPhotos, $newPhotos);

            // Hapus foto yang tidak dipakai lagi
            if ($notulen->foto_dokumentasi) {

                foreach ($notulen->foto_dokumentasi as $foto) {

                    if (!in_array($foto, $oldPhotos)) {

                        Storage::disk('public')->delete($foto);
                    }
                }
            }

            // $data['foto_dokumentasi'] = $finalPhotos;

            /*
            ==============================
            UPDATE DATA
            ==============================
            */

            $notulen->update([
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'macam' => $request->macam,
                'pimpinan_rapat' => $request->pimpinan_rapat,
                'pimpinan_rapat_nama' => $request->pimpinan_rapat_nama,
                'jumlah_diundang' => $request->jumlah_diundang,
                'jumlah_hadir' => $request->jumlah_hadir,
                'susunan_acara' => $request->susunan_acara,
                'keputusan' => $request->keputusan,
                'lain_lain' => $request->lain_lain,
                'penutup' => $request->penutup,
                'foto_dokumentasi' => $finalPhotos,
                // 'foto_dokumentasi' => array_merge($remainingPhotos, $newPhotos),
                'updated_by' => auth()->id(),
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function verifikasi($id)
    {
        $notulen = Notulen::findOrFail($id);

        $notulen->update([
            'status' => 'terverifikasi',
            'diverifikasi_oleh' => auth()->id(),
            'tanggal_verifikasi' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Notulen berhasil diverifikasi'
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
