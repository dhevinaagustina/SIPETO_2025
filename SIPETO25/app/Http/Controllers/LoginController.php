<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        // Deteksi apakah URL mengandung 'admin'
        $isAdmin = $request->is('admin/*');
        return view('auth.login', compact('isAdmin'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan tipe_user
            if (Auth::user()->tipe_user === 'admin') {
                return redirect('/admin/dashboard');
            } elseif (Auth::user()->tipe_user === 'mahasiswa') {
                return redirect('/mahasiswa/dashboard');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors([
                    'username' => 'Tipe user tidak dikenali.',
                ]);
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
