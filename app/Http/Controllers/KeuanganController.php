<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangans = Keuangan::get();
        return view('admin.daftartransaksi', compact('keuangans'));
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahkeuangan');
    }


    public function storeMultiple(Request $request)
    {
        foreach($request->uraian as $i => $uraian){

            $jumlah = $request->jumlah[$i];
            $jenis = $request->jenis[$i];
            $invoice = $request->invoice[$i];
            $tanggal = $request->tanggal[$i];

            Keuangan::create([
                'kegiatan_id' => $request->kegiatan_id,
                'tanggal' => $tanggal,
                'jenis' => $jenis,
                'invoice' => $invoice,
                'uraian' => $uraian,
                'jumlah' => $jumlah,
                'dibuat_oleh' => auth()->id()
            ]);
        }

        return redirect()->back()->with('success','Transaksi berhasil disimpan');
    }

    
    /**
     * Update the specified resource in storage.
     */

    // public function update(Request $request, Keuangan $keuangan)
    // {
    //     $request->validate([
    //         'tanggal' => 'required|date',
    //         'jenis' => 'required|in:pemasukan,pengeluaran',
    //         'jumlah' => 'required|numeric|min:0',
    //     ]);

    //     $keuangan->update([
    //         'tanggal' => $request->tanggal,
    //         'jenis' => $request->jenis,
    //         'invoice' => $request->invoice,
    //         'jumlah' => $request->jumlah,
    //         'diubah_oleh' => auth()->id()
    //     ]);

    //     return response()->json([
    //         'success' => true
    //     ]);
    // }

    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $keuangan->update([
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'invoice' => $request->invoice,
            'jumlah' => $request->jumlah,
            'diubah_oleh' => auth()->id()
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $keuangan->id,
                'jenis' => $keuangan->jenis,
                'tanggal' => $keuangan->tanggal->format('d-m-Y'),
                'invoice' => $keuangan->invoice,
                'jumlah' => number_format($keuangan->jumlah, 0, ',', '.')
            ]
        ]);
    }


    public function verifikasi($id)
    {
        $notulen = Keuangan::findOrFail($id);
        
        $kode = hash_hmac(
            'sha256',
            $notulen->id . now(),
            config('app.key')
        );

        $notulen->update([
            'status' => 'terverifikasi',
            'diverifikasi_oleh' => auth()->id(),
            'tanggal_verifikasi' => now(),
            'kode_verifikasi' => $kode
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Notulen berhasil diverifikasi'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        //
    }
}
