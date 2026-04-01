<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Warga;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use App\Models\Kelurahan;
use App\Models\SubLingkungan;
use App\Models\Lingkungan;
use App\Models\KepalaKeluarga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class WargaController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::orderBy('nama')->get();
        $kecamatans = Kabupaten::with('provinsi')->get();
        // $wargas = KepalaKeluarga::latest()->paginate(10);

        // $sublingkungans = SubLingkungan::with('lingkungan')
        //                 ->where('status', 'active')
        //                 ->whereHas('lingkungan', function ($q) {
        //                     $q->where('status', 1);
        //                 })
        //                 ->get();

        $wargas = KepalaKeluarga::whereHas('subLingkungan.users', function ($q) {
            $q->where('users.id', Auth::id());
        })->get();
        

        $user = Auth::user();

        $sublingkungans = $user->subLingkungans()
            ->with('lingkungan')
            ->where('status', 1)
            ->whereHas('lingkungan', function ($q) {
                $q->where('status', 1);
            })
            ->get();

        return view('admin.daftarwarga', compact('wargas', 'kecamatans','provinsis','sublingkungans'));
    }

    public function create()
    {
        $provinsis = Provinsi::orderBy('nama')->get();
        $kabupatens = Kabupaten::with('provinsi')->get();
        // $wargas = Warga::latest()->paginate(10);

        // $sublingkungans = SubLingkungan::with('lingkungan')
        //                 ->where('status', 'active')
        //                 ->whereHas('lingkungan', function ($q) {
        //                     $q->where('status', 1);
        //                 })
        //                 ->get();

        $wargas = KepalaKeluarga::whereHas('subLingkungan.users', function ($q) {
            $q->where('users.id', Auth::id());
        })->get();

        $user = Auth::user();

        $sublingkungans = $user->subLingkungans()
            ->with('lingkungan')
            ->where('status', 1)
            ->whereHas('lingkungan', function ($q) {
                $q->where('status', 1);
            })
            ->get();
            

        return view('admin.tambahwarga', compact('wargas', 'kabupatens','provinsis','sublingkungans'));
    }

    public function storeanggotakk(Request $request)
    {

        
        // ================= VALIDASI =================
        $request->validate([
            'nik' => 'required|string|unique:wargas,nik',
            'nama' => 'required|string',
            'no_kk' => 'required|string',
        ], [
            // ================= PESAN CUSTOM =================
            'nik.required' => 'NIK wajib diisi',
            'nik.unique'   => 'NIK sudah terdaftar, tidak boleh sama',
            'nama.required' => 'Nama wajib diisi',
            'no_kk.required' => 'No KK wajib diisi',
        ]);

        $data = $request->all();

        // ================= HANDLE CHECKBOX =================
        $checkboxes = [
            'akseptor_kb',
            'aktif_posyandu',
            'ikut_bkb',
            'memiliki_tabungan',
            'ikut_kelompok_belajar',
            'ikut_paud',
            'ikut_koperasi'
        ];

        foreach ($checkboxes as $check) {
            $data[$check] = $request->has($check) ? 1 : 0;
        }

        // ================= INSERT =================
        Warga::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    

    // protected static function booted()
    // {
    //     static::creating(function ($model) {
    //         $model->kode_unik = Str::uuid(); // 🔥 dijamin unik
    //     });
    // }
    // protected static function booted()
    // {
    //     static::creating(function ($model) {

    //         // 🔥 generate sampai benar-benar unik
    //         do {
    //             $kode = 'KK-' . strtoupper(Str::random(8));
    //         } while (self::where('kode_unik', $kode)->exists());

    //         $model->kode_unik = $kode;
    //     });
    // }

    public function store(Request $request)
    {
        // ================= VALIDASI =================
        $request->validate([
            'no_kk' => 'required|string',
            'nik' => 'required|string',
            'nama' => 'required|string',
            'nama_kepala_keluarga' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            $data = $request->all();

            // ================= HANDLE CHECKBOX =================
            $checkboxes = [
                'akseptor_kb',
                'aktif_posyandu',
                'ikut_bkb',
                'memiliki_tabungan',
                'ikut_kelompok_belajar',
                'ikut_paud',
                'ikut_koperasi'
            ];

            foreach ($checkboxes as $check) {
                $data[$check] = $request->has($check) ? 1 : 0;
            }

            // ================= CEK KEPALA KELUARGA =================
            $kk = KepalaKeluarga::where('no_kk', $data['no_kk'])->first();

            if ($kk) {
                DB::rollBack();

                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menyimpan, No. KK sudah terdaftar!'
                ]);
            }

            // ================= INSERT KEPALA KELUARGA =================
            // $kk = KepalaKeluarga::create([
            //     'dasa_wisma' => $data['dasa_wisma'] ?? null,
            //     'nama_kepala_keluarga' => $data['nama_kepala_keluarga'] ?? $data['nama'],
            //     'no_registrasi' => $data['no_registrasi'] ?? null,
            //     'no_kk' => $data['no_kk'],
            //     'nik' => $data['nik'] ?? null,
            // ]);

            $kk = KepalaKeluarga::create([
                'dasa_wisma' => $data['dasa_wisma'] ?? null,
                'nama_kepala_keluarga' => $data['nama_kepala_keluarga'] ?? $data['nama'],
                'no_registrasi' => $data['no_registrasi'] ?? null,
                'no_kk' => $data['no_kk'],
                'nik' => $data['nik'] ?? null,
            ]);

            // ================= INSERT WARGA =================
            $warga = Warga::create($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'kepala_keluarga' => $kk,
                    'warga' => $warga
                ]
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function lihat($no_kk)
    {
        $wargas = Warga::where('no_kk', $no_kk)->get();
        
        return view('admin.editwarga', compact(
                'wargas','no_kk',
        ));
    }


    public function tambahanggota($no_kk)
    {
        $no_kk = KepalaKeluarga::where('no_kk', $no_kk)->first();
        $provinsis = Provinsi::orderBy('nama')->get();
        $kabupatens = Kabupaten::with('provinsi')->get();
        $wargas = Warga::latest()->get();

        $user = Auth::user();

        $sublingkungans = $user->subLingkungans()
            ->with('lingkungan')
            ->where('status', 1)
            ->whereHas('lingkungan', function ($q) {
                $q->where('status', 1);
            })
            ->get();

        return view('admin.tambahanggotakk', compact('no_kk','wargas', 'kabupatens','provinsis','sublingkungans'));
    }


    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        $provinsis = Provinsi::orderBy('nama')->get();
        $kabupatens = Kabupaten::get();
        $sublingkungans = SubLingkungan::with('lingkungan')
                        ->where('status', 1)
                        ->whereHas('lingkungan', function ($q) {
                            $q->where('status', 1);
                        })
                        ->get();

        return view('admin.tambahwarga', compact(
            'warga',
            'provinsis',
            'kabupatens',
            'sublingkungans'
        ));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $validated = $request->validate([
            'dasa_wisma' => 'nullable|string|max:100',
            'nama_kepala_keluarga' => 'nullable|string|max:100',
            'no_kk' => 'nullable|string|max:20',
            'no_registrasi' => 'nullable|string|max:50',
            'nik' => 'nullable|string|max:20',
            'nama' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|string',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'status_perkawinan' => 'nullable|string',
            'status_dalam_keluarga' => 'nullable|string',
            'agama' => 'nullable|string',
            'alamat' => 'nullable|string',

            'provinsi' => 'nullable',
            'kabupaten' => 'nullable',
            'kecamatan' => 'nullable',
            'kelurahan' => 'nullable',

            'pendidikan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',

            'jenis_kelompok_belajar' => 'nullable|string',
            'jenis_koperasi' => 'nullable|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Boolean Fields
        |--------------------------------------------------------------------------
        */

        $booleanFields = [
            'akseptor_kb',
            'aktif_posyandu',
            'ikut_bkb',
            'memiliki_tabungan',
            'ikut_kelompok_belajar',
            'ikut_paud',
            'ikut_koperasi'
        ];

        foreach ($booleanFields as $field) {
            $validated[$field] = $request->input($field, 0);
        }

        $warga->update($validated);

        return response()->json([
            'message' => 'Data warga berhasil diperbarui'
        ]);
    }



    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);

        // 🔥 CEK apakah NIK warga = NIK kepala keluarga
        $isKepalaKeluarga = KepalaKeluarga::where('nik', $warga->nik)->exists();

        if ($isKepalaKeluarga) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak bisa dihapus karena merupakan Kepala Keluarga'
            ], 422);
        }

        // ✅ Hapus jika bukan kepala keluarga
        $warga->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data warga berhasil dihapus'
        ]);
    }



    public function kabupaten($provinsi_id)
    {
        return Kabupaten::where('provinsi_id', $provinsi_id)->get();
    }

    public function kecamatan($kabupaten_id)
    {
        return Kecamatan::where('kabupaten_id', $kabupaten_id)->get();
    }

    public function kelurahan($kecamatan_id)
    {
        return Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
    }

    public function showByKode($kode_unik)
    {
        $kk = KepalaKeluarga::with([
                'warga.dasawisma',   // 🔥 relasi nested
                'subLingkungan.lingkungan'
            ])
            ->where('kode_unik', $kode_unik)
            ->firstOrFail();

        return view('publik.barcode', compact('kk'));
    }

    
}
