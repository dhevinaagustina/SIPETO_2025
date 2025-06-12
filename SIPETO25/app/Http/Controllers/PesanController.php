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
        $user = Auth::user();
        $pesanQuery = Pesan::query()->latest();

        if (isset($user->id_mahasiswa)) {
            $id_mahasiswa = $user->id_mahasiswa;

            $pesanQuery->where('ditujukan_ke', 'semua')
                ->orWhereHas('mahasiswa', function ($query) use ($id_mahasiswa) {
                    $query->where('informasi_mahasiswa.id_mahasiswa', $id_mahasiswa);
                });

        } elseif (isset($user->id_dosen)) {
            $id_dosen = $user->id_dosen;

            $pesanQuery->where('ditujukan_ke', 'semua')
                ->orWhereHas('dosen', function ($query) use ($id_dosen) {
                    $query->where('informasi_dosen.id_dosen', $id_dosen);
                });
        }

            $pesan = $pesanQuery->get();

        return view('pesan-mahasiswa.index', [
            'activeMenu' => 'pesan',
            'breadcrumb' => new Fluent([
                'title' => __('mahasiswa.pesan.judul'),
                'list'  => [
                    __('mahasiswa.pesan.breadcrumb.menu'),
                    __('mahasiswa.pesan.breadcrumb.pesan'),
                ]
            ]),
            'title' => __('mahasiswa.pesan.judul'),
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