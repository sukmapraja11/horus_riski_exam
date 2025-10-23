<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * 🧩 Halaman Login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * 🧩 Proses Login
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        // Jika username tidak ditemukan atau password salah
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login_error' => 'Username atau password salah'])->withInput();
        }

        // Simpan sesi user
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->nama);

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    /**
     * 🧩 Halaman Dashboard (tampilkan semua user)
     */
    public function dashboard(Request $request)
    {
        // Pastikan user sudah login
        if (!Session::has('user_id')) {
            return redirect('/login')->withErrors(['login_error' => 'Silakan login terlebih dahulu.']);
        }

        // Fitur pencarian (opsional)
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('username', 'like', "%{$search}%")
                      ->orWhere('nama', 'like', "%{$search}%");
            })
            ->select('id', 'username', 'nama', 'email')
            ->get();

        return view('users.dashboard', [
            'users' => $users,
            'nama' => Session::get('user_name'),
            'search' => $search
        ]);
    }

    /**
     * 🧩 Halaman Registrasi
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * 🧩 Proses Registrasi
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|min:4|unique:users,username',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }



 

public function editUser($id)
{
    // Pastikan user sudah login
    if (!session('user_id')) {
        return redirect('/login')->withErrors(['login_error' => 'Silakan login terlebih dahulu']);
    }

    // Ambil data user berdasarkan ID
    $user = User::findOrFail($id);

    return view('users.edit', compact('user'));
}

public function updateUser(Request $request, $id)
{
    $request->validate([
        'nama' => 'string|max:100',
        'email' => 'email|unique:users,email,'.$id,
        'username' => 'string|min:4|unique:users,username,'.$id,
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'username' => $request->username,
    ]);

    return redirect()->route('dashboard')->with('success', 'Data pengguna berhasil diperbarui!');
}



    /**
     * Logout
     */
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
