<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;

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
    // 🔐 Logout semua guard sebelumnya
    Auth::guard('super_admin')->logout();
    Auth::guard('admin')->logout();
    Auth::guard('mahasiswa')->logout();
    Auth::guard('dosen')->logout();
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
         return response()->json(['status' => 'success', 'redirect' => url('/admin/dashboard')]);
    }

    // ✅ 2. Cek Admin
    $admin = Admin::where('username', $username)->first();
    if ($admin && $password === $admin->password) {
        Auth::guard('admin')->login($admin);
        session(['guard' => 'admin']);
         return response()->json(['status' => 'success', 'redirect' => url('/admin/dashboard')]);
    }

    // Mahasiswa
    $mahasiswa = Mahasiswa::where('username', $username)->first();
    if ($mahasiswa && $password === $mahasiswa->password) {
        Auth::guard('mahasiswa')->login($mahasiswa);
        $redirect = $mahasiswa->status === 'alumni'
            ? route('pendaftaran-toeic/mandiri.create')
            : route('dashboard.beranda');

        return response()->json(['status' => 'success', 'redirect' => $redirect]);
    }

    // ✅ 4. Dosen
    $dosen = Dosen::where('username', $username)->first();
    if ($dosen && $password === $dosen->password) {
        Auth::guard('dosen')->login($dosen);
        session(['guard' => 'dosen']);
        return response()->json(['status' => 'success', 'redirect' => route('dashboard.beranda')]);
    }

    // ❌ Gagal login
    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ])->withInput();
}
}