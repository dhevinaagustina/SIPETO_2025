<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function daftar()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Ujian',
            'list' => ['Home', 'Daftar Ujian']
        ];

        $activeMenu = 'daftar-ujian';

        return view('mahasiswa.daftar_ujian', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }

    public function hasil()
    {
        $breadcrumb = (object) [
            'title' => 'Hasil Ujian',
            'list' => ['Home', 'Hasil Ujian']
        ];

        $activeMenu = 'hasil-ujian';

        return view('mahasiswa.hasil_ujian', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }

    public function riwayat()
    {
        $breadcrumb = (object) [
            'title' => 'Riwayat Ujian',
            'list' => ['Home', 'Riwayat Ujian']
        ];

        $activeMenu = 'riwayat-ujian';

        return view('mahasiswa.riwayat_ujian', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu
        ]);
    }
}
