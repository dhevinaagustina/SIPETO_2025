<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekDataController extends Controller
{
    public function index()
    {
        // Data mahasiswa statis contoh (bisa diganti ambil dari DB)
        $mahasiswa = [
            ['nim' => '2341760071', 'nama' => 'Niriza Lailamuli Hidayat', 'jurusan' => 'Teknologi Informasi', 'prodi' => 'D-IV Sistem Informasi Bisnis'],
            ['nim' => '2341760072', 'nama' => 'Adinda Ivanka Maysanda Putri', 'jurusan' => 'Teknologi Informasi', 'prodi' => 'D-IV Sistem Informasi Bisnis'],
            ['nim' => '2341760073', 'nama' => 'Adyuta Raksa Ramadhana', 'jurusan' => 'Teknologi Informasi', 'prodi' => 'D-IV Sistem Informasi Bisnis'],
            // Tambah data lainnya...
        ];

        return view('admin.cekdata', compact('mahasiswa'));
    }
}
