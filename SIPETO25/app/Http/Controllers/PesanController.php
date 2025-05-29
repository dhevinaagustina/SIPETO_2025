<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Fluent;

class PesanController extends Controller
{
    public function index()
    {
        $id_mahasiswa = Auth::user()->id_mahasiswa;

        $pesan = Pesan::where('ditujukan_ke', 'semua')
            ->orWhereHas('mahasiswa', function ($query) use ($id_mahasiswa) {
                $query->where('informasi_mahasiswa.id_mahasiswa', $id_mahasiswa);
            })
            ->latest()
            ->get();


        return view('pesan-mahasiswa.index', [
            'activeMenu' => 'pesan',
            'breadcrumb' => new Fluent([
                'title' => 'Pesan Masuk',
                'list'  => ['Beranda', 'Pesan']
            ]),
            'title' => 'Pesan Masuk',
            'pesan' => $pesan
        ]);
    }

    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);

        return view('pesan-mahasiswa.show', [
            'activeMenu' => 'pesan',
            'breadcrumb' => new Fluent([
                'title' => $pesan->judul,
                'list'  => ['Beranda', 'Pesan', $pesan->judul]
            ]),
            'title' => $pesan->judul,
            'pesan' => $pesan
        ]);
    }
}
