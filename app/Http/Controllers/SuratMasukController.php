<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;


class SuratMasukController extends Controller
{
    public function index()
    {
        $smasuks = SuratMasuk::latest()->get();
        return view('admin.daftarsm', compact('smasuks'));
    }

    public function create()
    {
        return view('admin.tambahsurat');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'terima_surat' => 'required|date',
                'tanggal_surat' => 'required',
                'no_surat' => 'required|string|max:255',
                'dari' => 'nullable|string|max:255',
                'perihal' => 'required',
                'lampiran.*' => 'image|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
                'diteruskan_kepada' => 'required|string|max:255',
            ]);

            $data = $request->only([
                'terima_surat',
                'tanggal_surat',
                'no_surat',
                'dari',
                'perihal',
                'diteruskan_kepada',
            ]);

            // $data['dibuat_oleh'] = Auth::id();

            
            $paths = [];

            if ($request->hasFile('lampiran')) {

                foreach ($request->file('lampiran') as $file) {

                    $filename = time().'_'.$file->getClientOriginalName();

                    $paths[] = $file->storeAs('surat_masuk', $filename, 'public');
                }

                $data['lampiran'] = $paths;
            }

            $notulen = SuratMasuk::create($data);
            
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

    public function show($id)
    {
        return SuratMasuk::findOrFail($id);
    }

    public function edit($id)
    {
            // $notulen = Notulen::findOrFail($id);
        $sm = SuratMasuk::findOrFail($id);
        return view('admin.tambahsurat', compact(
                'sm'
            ));
    }

        public function update(Request $request, $id)
    {
        try {

            $sm = SuratMasuk::findOrFail($id);



            $validated = $request->validate([
                'terima_surat' => 'required|date',
                'tanggal_surat' => 'required|date',
                'no_surat' => 'required|string|max:255',
                'dari' => 'nullable|string|max:255',
                'perihal' => 'required',
                'lampiran.*' => 'image|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
                'diteruskan_kepada' => 'required|string|max:255',
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
                'terima_surat' => $request->terima_surat,
                'tanggal_surat' => $request->tanggal_surat,
                'no_surat' => $request->no_surat,
                'dari' => $request->dari,
                'perihal' => $request->perihal,
                'diteruskan_kepada' => $request->diteruskan_kepada,
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
        SuratMasuk::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}