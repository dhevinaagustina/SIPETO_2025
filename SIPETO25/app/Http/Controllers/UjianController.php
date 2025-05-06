<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function daftar()
    {
        return view('mahasiswa.daftar_ujian', [
            'activeMenu' => 'daftar-ujian'
        ]);
    }

    public function hasil()
    {
        return view('mahasiswa.hasil_ujian', [
            'activeMenu' => 'hasil-ujian'
        ]);
    }

    public function riwayat()
    {
        return view('mahasiswa.riwayat_ujian', [
            'activeMenu' => 'riwayat-ujian'
        ]);
    }
}
