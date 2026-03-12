<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.daftaruser', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level
        ]);

        return redirect()->back()->with('success','User berhasil dibuat');
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

}
