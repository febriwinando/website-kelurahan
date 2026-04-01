<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubLingkungan;
use App\Models\Lingkungan;
use App\Models\DasawismaWarga;
use App\Models\Warga;
use App\Models\KepalaKeluarga;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $lingkungans = Lingkungan::with([
        //     'subLingkungan' => function ($q) {
        //         $q->with(['dasawismaWargas']); // relasi tambahan nanti
        //     }
        // ])->get();


        $lingkungans = Lingkungan::with([
            'subLingkungan.dasawismaWargas',
            'subLingkungan.wargas'
        ])->get();

        // dd($lingkungans);

        return view('publik.beranda', compact('lingkungans'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
