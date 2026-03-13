<?php

namespace App\Http\Controllers;

use App\Models\SubLingkungan;
use App\Models\Lingkungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubLingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lingkungans = Lingkungan::latest()->get();
        $sublingkungans = SubLingkungan::latest()->get();
        return view('admin.sublingkungan', compact('sublingkungans', 'lingkungans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sub_lingkungan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required',
            'lingkungan_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        
        $lingkungan = SubLingkungan::create([
            'lingkungan_id' => $request->lingkungan_id,
            'nama_sub_lingkungan' => $request->nama_sub_lingkungan,
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
    public function show(SubLingkungan $lingkungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lingkungan = SubLingkungan::findOrFail($id);
        return response()->json($lingkungan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lingkungan = SubLingkungan::findOrFail($id);

        $lingkungan->update([
            'lingkungan_id' => $request->lingkungan_id,
            'nama_sub_lingkungan' => $request->nama_sub_lingkungan,
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
        SubLingkungan::destroy($id);

        return response()->json([
            'success' => true
        ]);
    }
}
