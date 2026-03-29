<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\SubLingkungan;
use App\Models\Lingkungan;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::where('level', '!=','administrator')->latest()->get();

        return view('admin.daftaruser', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //         'level' => 'required'
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'level' => $request->level
    //     ]);

    //     return redirect()->back()->with('success','User berhasil dibuat');
    // }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:repassword',
            'repassword' => 'required',
            'level' => 'required',
            'status' => 'required'
        ],[
            'password.same' => 'Password tidak sama',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {


        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'level' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level
        ];

        // if($request->password){
        //     $data['password'] = Hash::make($request->password);
        // }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'level' => $user->level,
            ]
        ]);

        // return redirect()->back()->with('success','User berhasil diupdate');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success','User berhasil dihapus');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function area($id)
    {
        $user = User::findOrFail($id);
        $lingkungans = Lingkungan::latest()->get();
        $sublingkungans = SubLingkungan::latest()->get();
        $selected = $user->subLingkungans()->pluck('sub_lingkungans.id')->toArray();
        return view('admin.tambahareauser', compact('user','sublingkungans', 'lingkungans', 'selected'));

    }


    public function storearea(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sub_lingkungan_id' => 'required|array',
            'sub_lingkungan_id.*' => 'exists:sub_lingkungans,id'
            ]);

        $user = User::findOrFail($request->user_id);

            // 🔥 ini otomatis isi banyak baris
        $user->subLingkungans()->sync($request->sub_lingkungan_id);

        return response()->json([
                'success' => true,
                'message' => 'Area berhasil disimpan'
            ]);
    }

    public function getarea($user_id)
    {
        $user = User::with('subLingkungans')->findOrFail($user_id);

        return response()->json([
            'user_id' => $user->id,
            'areas' => $user->subLingkungans->pluck('id')
        ]);
    }

}
