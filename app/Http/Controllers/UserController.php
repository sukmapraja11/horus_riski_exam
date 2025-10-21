<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username'=> 'required|unique:users',
            'password'=> 'required|min:6',
            'email'=> 'required|email|unique:users',
            'nama'=> 'required'
        ]);

        $user = User::create([
            'username'=> $request->username,
            'password'=> Hash::make($request->password),
            'email'=> $request->email,
            'nama'=> $request->nama,
        ]);
           return response()->json([
        'message' => 'Registrasi berhasil',
        
    ], 201);
    }

    public function index()
    {
        $users = User::select('id', 'username', 'email', 'nama')->get();
        return response()->json($users, 200);
    }


    public function login(Request $request)
    {

        $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message'=>'username atau password salah'], 401);
        }
        $token = base64_encode($user->username . '|' . now());

        return response()->json([
            'message'=>'Login Berhasil',
            'token'=> $token
        ], 200);



    }





    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username'=> 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'nama'=> 'required'
        ]);

        $user->update([
            'username'=> $request->username,
            'email'=> $request->email,
            'nama'=> $request->nama
        ]);

        return response()->json(['message' => 'Data user berhasil diperbarui'],200);

    }



    public function dashboard(Request $request)
    {
        //fitur pencarian
        $search = $request->input('search');
        $user = User::query()->when($search, function ($query, $search){
            $query->where('username', 'like', "%{$search}%")->orWhere('nama', 'like', "%{$search}");
        })->select('id', 'username', 'nama', 'email')->get();

        return view('users.dashboard', compact('users', 'search'));
 
    }

    public function destroy($id){
    $user = User::find($id);

    if (!$user) {

    return redirect()->back()->with('error', 'User tidak ditemukan');
    
    }

    $user->delete();
    return redirect()->back()->with('success', 'User berhasil dihapus'); 
    }
}
