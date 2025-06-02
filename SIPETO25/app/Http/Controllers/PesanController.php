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
                'list'  => ['Beranda', 'Pesan']
            ]),
            'title' => 'Pesan Masuk',
            'pesan' => $pesan
        ]);
    }

    public function show($id)
    {
        $id_mahasiswa = Auth::user()->id_mahasiswa;

        $pesan = Pesan::with('mahasiswa')->findOrFail($id);

        $bolehLihat = $pesan->ditujukan_ke === 'semua' ||
            $pesan->mahasiswa->contains('id', $id_mahasiswa);

        if (! $bolehLihat) {
            abort(403, 'Anda tidak memiliki akses ke pesan ini.');
        }

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

    public function download($id)
    {
        $id_mahasiswa = Auth::user()->id_mahasiswa;

        $pesan = Pesan::with('mahasiswa')->findOrFail($id);

        $bolehLihat = $pesan->ditujukan_ke === 'semua' ||
            $pesan->mahasiswa->contains('id', $id_mahasiswa);

        if (! $bolehLihat) {
            abort(403, 'Anda tidak memiliki akses untuk mengunduh lampiran ini.');
        }

        if (!$pesan->lampiran || !in_array($pesan->tipe_lampiran, ['dokumen', 'gambar'])) {
            abort(404, 'Lampiran tidak tersedia atau bukan tipe yang dapat diunduh.');
        }

        $path = storage_path('app/public/lampiran_informasi/' . $pesan->lampiran);



        if (!file_exists($path)) {
            abort(404, 'Lampiran tidak ditemukan.');
        }

        return response()->download($path);
    }
}
