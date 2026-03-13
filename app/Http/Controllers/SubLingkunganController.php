<?php

namespace App\Http\Controllers;

use App\Models\SubLingkungan;
use Illuminate\Http\Request;

class SubLingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sublingkungans = SubLingkungan::latest()->get();
        return view('admin.sublingkungan', compact('sublingkungans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(SubLingkungan $subLingkungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubLingkungan $subLingkungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubLingkungan $subLingkungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubLingkungan $subLingkungan)
    {
        //
    }
}
