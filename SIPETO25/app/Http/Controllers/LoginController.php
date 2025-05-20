<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil data user dari tabel login
        $user = DB::table('login')->where('username', $request->username)->first();

        // Cek user dan password
        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan data ke session manual
            session([
            'login_username' => $user->username,
            'tipe_user' => $user->tipe_user,
            'id_referensi' => $user->id_referensi,
            ]);
            return redirect('/dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        // Hapus session
        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
