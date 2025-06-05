<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\SuperAdmin;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        // 🔐 Logout semua guard dulu
        Auth::guard('super_admin')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('mahasiswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 🔍 Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        // ✅ 1. Cek Super Admin
        $superAdmin = SuperAdmin::where('username', $username)->first();
        if ($superAdmin && $password === $superAdmin->password) {
            Auth::guard('super_admin')->login($superAdmin);
            session(['guard' => 'super_admin']);
            return redirect('/admin/dashboard');
        }

        // ✅ 2. Cek Admin
        $admin = Admin::where('username', $username)->first();
        if ($admin && $password === $admin->password) {
            Auth::guard('admin')->login($admin);
            session(['guard' => 'admin']);
            return redirect('/admin/dashboard');
        }

        // ✅ 3. Cek Mahasiswa
        $mahasiswa = Mahasiswa::where('username', $username)->first();
        if ($mahasiswa && $password === $mahasiswa->password) {
            Auth::guard('mahasiswa')->login($mahasiswa);
            session(['guard' => 'mahasiswa']);
            return redirect('/dashboard/beranda');
        }

        // ❌ Gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    /**
     * Proses logout
     */
    public function logout(Request $request)
    {
        if (Auth::guard('super_admin')->check()) {
            Auth::guard('super_admin')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
