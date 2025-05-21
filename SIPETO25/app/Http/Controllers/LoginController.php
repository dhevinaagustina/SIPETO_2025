<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi form
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Coba cari di tabel admin
        $admin = DB::table('admin_upa')->where('username', $username)->first();

        if ($admin && $password === $admin->password) {
            session([
                'login_username' => $admin->username,
                'tipe_user' => 'admin',
                'id_referensi' => $admin->id_admin,
            ]);
            return redirect('/dashboard');
        }

        // Jika tidak ada di admin, coba cari di mahasiswa
        $mahasiswa = DB::table('mahasiswa')->where('username', $username)->first();

        if ($mahasiswa && $password === $mahasiswa->password) {
            session([
                'login_username' => $mahasiswa->username,
                'tipe_user' => 'mahasiswa',
                'id_referensi' => $mahasiswa->id_mahasiswa,
            ]);
            return redirect('/dashboard');
        }

        // Jika tidak ditemukan di keduanya
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
