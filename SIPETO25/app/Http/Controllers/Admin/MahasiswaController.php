<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Manajemen Mahasiswa',
            'list' => ['Admin', 'Mahasiswa', 'Daftar']
        ];

        $activeMenu = 'mahasiswa';

        $mahasiswa = Mahasiswa::with('pendaftaranToeic')
            ->latest()
            ->paginate(10);

        return view('admin.mahasiswa.index', compact('breadcrumb', 'activeMenu', 'mahasiswa'));
    }

    public function mahasiswaBaru()
    {
        $breadcrumb = (object) [
            'title' => 'Mahasiswa Baru',
            'list' => ['Admin', 'Mahasiswa', 'Baru']
        ];

        $activeMenu = 'mahasiswa';

        $mahasiswa = Mahasiswa::whereDate('created_at', '>=', now()->subDays(30))
            ->paginate(10);

        return view('admin.mahasiswa.baru', compact('breadcrumb', 'activeMenu', 'mahasiswa'));
    }

    public function statusPendaftaran()
    {
        $breadcrumb = (object) [
            'title' => 'Status Pendaftaran',
            'list' => ['Admin', 'Mahasiswa', 'Status']
        ];

        $activeMenu = 'mahasiswa';

        $mahasiswa = Mahasiswa::with('pendaftaranToeic')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.mahasiswa.status', compact('breadcrumb', 'activeMenu', 'mahasiswa'));
    }

    public function cari(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $mahasiswa = Mahasiswa::where('nama_mahasiswa', 'like', "%$keyword%")
            ->orWhere('nim', 'like', "%$keyword%")
            ->paginate(10);

        return view('admin.mahasiswa.index', [
            'breadcrumb' => (object) [
                'title' => 'Hasil Pencarian',
                'list' => ['Admin', 'Mahasiswa', 'Cari']
            ],
            'activeMenu' => 'mahasiswa',
            'mahasiswa' => $mahasiswa,
            'keyword' => $keyword
        ]);
    }
}