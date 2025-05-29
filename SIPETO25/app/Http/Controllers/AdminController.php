<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // Pastikan sudah membuat AdminMiddleware
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the data peserta page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dataPeserta()
    {
        // Contoh data dummy - sesuaikan dengan kebutuhan
        $peserta = [
            ['id' => 1, 'nama' => 'Andi Wijaya', 'nim' => '21081010001', 'program_studi' => 'Teknik Informatika'],
            ['id' => 2, 'nama' => 'Budi Santoso', 'nim' => '21081010002', 'program_studi' => 'Sistem Informasi'],
        ];
        
        return view('admin.data-peserta', compact('peserta'));
    }
    public function previewDashboard()
    {
        return view('admin.dashboard');
    }
    
    public function previewDataPeserta()
    {
        return view('admin.data-peserta');
    }

    public function inputHasil()
{
    return view('admin.input-hasil');
}
    // Tambahkan method lain sesuai kebutuhan
}