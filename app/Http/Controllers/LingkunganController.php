<?php

namespace App\Http\Controllers;

use App\Models\Lingkungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lingkungans = Lingkungan::latest()->get();
        return view('admin.lingkungan', compact('lingkungans'));
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
        $validator = Validator::make($request->all(), [
            'nama_lingkungan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        
        $lingkungan = Lingkungan::create([
            'nama_lingkungan' => $request->nama_lingkungan,
            'keterangan' => $request->keterangan,
            'status' => $request->status === 'true' ? 1 : 0,
        ]);

        return response()->json([
            'success' => true,
            'data' => $lingkungan
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lingkungan $lingkungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lingkungan = Lingkungan::findOrFail($id);
        return response()->json($lingkungan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lingkungan = Lingkungan::findOrFail($id);

        $lingkungan->update([
            'nama_lingkungan' => $request->nama_lingkungan,
            'keterangan' => $request->keterangan,
            'status' => $request->status === 'true' ? 1 : 0,
        ]);

        return response()->json([
            'success' => true,
            'data' => $lingkungan
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Lingkungan::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
