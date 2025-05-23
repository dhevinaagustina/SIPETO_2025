<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Cek sebagai Admin
        $admin = Admin::where('username', $username)->first();
        if ($admin && $password === $admin->password) {
            Auth::guard('admin')->login($admin);
            session(['guard' => 'admin']);
            return redirect('/admin/dashboard');
        }

        // Cek sebagai Mahasiswa
        $mahasiswa = Mahasiswa::where('username', $username)->first();
        if ($mahasiswa && $password === $mahasiswa->password) {
            Auth::guard('mahasiswa')->login($mahasiswa);
            session(['guard' => 'mahasiswa']);
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        $guard = session('guard', 'web');
        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
