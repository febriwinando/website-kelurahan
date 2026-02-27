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
        
        return view('admin.tambahkeuangan');
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function storeMultiple(Request $request)
{
    $saldoTerakhir = Keuangan::latest()->value('saldo') ?? 0;

    foreach($request->uraian as $i => $uraian){

        $jumlah = $request->jumlah[$i];
        $jenis = $request->jenis[$i];

        if($jenis == 'pemasukan'){
            $saldoTerakhir += $jumlah;
        }else{
            $saldoTerakhir -= $jumlah;
        }

        Keuangan::create([
            'kegiatan_id' => $request->kegiatan_id,
            'tanggal' => now(),
            'jenis' => $jenis,
            'uraian' => $uraian,
            'jumlah' => $jumlah,
            'saldo' => $saldoTerakhir,
            'dibuat_oleh' => auth()->id()
        ]);
    }

    return redirect()->back()->with('success','Transaksi berhasil disimpan');
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
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
