<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{

    public function hasil()
    {
        $breadcrumb = (object) [
            'title' => 'Hasil Ujian',
            'list' => ['Home', 'Hasil Ujian']
        ];

        $activeMenu = 'hasil-ujian';

        return view('hasil-ujian.index', [
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
