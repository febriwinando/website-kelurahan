<?php

namespace App\Http\Controllers;

use App\Models\DasawismaWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class DasawismaWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wargas = Warga::latest()->get();
        return view('admin.tambahdasawisma', compact('wargas'));
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
    public function show(DasawismaWarga $dasawismaWarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DasawismaWarga $dasawismaWarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DasawismaWarga $dasawismaWarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DasawismaWarga $dasawismaWarga)
    {
        //
    }
}
