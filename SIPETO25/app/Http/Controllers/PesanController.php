<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Fluent;
use Illuminate\Support\Facades\Storage;

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
                'list'  => ['Menu', 'Pesan']
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
                'list'  => ['Pesan', $pesan->judul]
            ]),
            'title' => $pesan->judul,
            'pesan' => $pesan
        ]);
    }

    public function download($id)
    {
        $pesan = Pesan::findOrFail($id);

        if (!$pesan->lampiran) {
            abort(404, 'Tidak ada lampiran.');
        }

        $path = 'lampiran_informasi/' . $pesan->lampiran;

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'Lampiran tidak ditemukan.');
        }

        return Storage::disk('public')->download($path, $pesan->lampiran);

    }



}
