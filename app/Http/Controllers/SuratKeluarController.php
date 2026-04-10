<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
class SuratKeluarController extends Controller
{
    public function index()
    {
       
        $smasuks = SuratKeluar::latest()->get();
        return view('admin.daftarsk', compact('smasuks'));
    }

     public function create()
    {
        return view('admin.tambahsuratkeluar');
    }



    public function store(Request $request)
    {
        try {
            $request->validate([
                'tanggal_surat' => 'required',
                'no_surat' => 'required|string|max:255',
                'kepada' => 'nullable|string|max:255',
                'perihal' => 'required',
                'lampiran.*' => 'image|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
            ]);

            $data = $request->only([
                'tanggal_surat',
                'no_surat',
                'kepada',
                'perihal',
            ]);

            // $data['dibuat_oleh'] = Auth::id();

            
            $paths = [];

            if ($request->hasFile('lampiran')) {

                foreach ($request->file('lampiran') as $file) {

                    $filename = time().'_'.$file->getClientOriginalName();

                    $paths[] = $file->storeAs('surat_keluar', $filename, 'public');
                }

                $data['lampiran'] = $paths;
            }

            $notulen = SuratKeluar::create($data);
            
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

    // public function store(Request $request)
    // {
    //     SuratKeluar::create($request->all());

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Surat keluar berhasil disimpan'
    //     ]);
    // }

    public function show($id)
    {
        return SuratKeluar::findOrFail($id);
    }

    public function edit($id)
    {
            // $notulen = Notulen::findOrFail($id);
        $sk = SuratKeluar::findOrFail($id);
        return view('admin.tambahsuratkeluar', compact(
                'sk'
            ));
    }
    public function update(Request $request, $id)
    {
        try {

            $sm = SuratKeluar::findOrFail($id);



            $validated = $request->validate([
                'tanggal_surat' => 'required|date',
                'no_surat' => 'required|string|max:255',
                'perihal' => 'required',
                'lampiran.*' => 'image|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
                'kepada' => 'required|string|max:255',
            ]);

            $data = $request->except(['lampiran','old_photos']);

            $oldPhotos = $request->old_photos ?? [];

            $newPhotos = [];

            // Upload foto baru
            if ($request->hasFile('lampiran')) {

                foreach ($request->file('lampiran') as $file) {

                    $filename = time().'_'.$file->getClientOriginalName();

                    $newPhotos[] = $file->storeAs('surat_masuk', $filename, 'public');
                }
            }

            // Gabungkan foto lama yg dipertahankan + foto baru
            $finalPhotos = array_merge($oldPhotos, $newPhotos);

            // Hapus foto yang tidak dipakai lagi
            if ($sm->lampiran) {

                foreach ($sm->lampiran as $foto) {

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

            $sm->update([
                'tanggal_surat' => $request->tanggal_surat,
                'no_surat' => $request->no_surat,
                'perihal' => $request->perihal,
                'kepada' => $request->kepada,
                'lampiran' => $finalPhotos,
            ]);

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        SuratKeluar::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}