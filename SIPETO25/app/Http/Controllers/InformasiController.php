<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function create()
    {
        $mahasiswa = DB::table('mahasiswa')->select('id_mahasiswa', 'nama_mahasiswa')->get();
        return view('admin.kirim_informasi', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'ditujukan_ke' => 'required|in:semua,tertentu',
            'mahasiswa_tertentu' => 'required_if:ditujukan_ke,tertentu|array',
            'lampiran' => 'nullable|file|max:5120|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        // Upload lampiran jika ada
        $namaFile = null;
        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $namaFile = time() . '_' . $lampiran->getClientOriginalName();
            $lampiran->storeAs('public/lampiran_informasi', $namaFile);
        }

        // Simpan ke tabel informasi
        $informasiId = DB::table('informasi')->insertGetId([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'lampiran' => $namaFile,
            'ditujukan_ke' => $request->ditujukan_ke,
            'id_admin' => 1, // Dummy, nanti diganti dengan Auth::id()
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Pastikan informasi berhasil tersimpan
        if (!$informasiId) {
            return back()->with('error', 'Gagal menyimpan informasi.');
        }

        // Ambil daftar mahasiswa
        $mahasiswaIds = [];

        if ($request->ditujukan_ke === 'semua') {
            $mahasiswaIds = DB::table('mahasiswa')->pluck('id_mahasiswa')->toArray();
        } elseif ($request->has('mahasiswa_tertentu')) {
            $mahasiswaIds = $request->mahasiswa_tertentu;
        }

        // Simpan ke tabel pivot informasi_mahasiswa
        foreach ($mahasiswaIds as $idMahasiswa) {
            DB::table('informasi_mahasiswa')->insert([
                'id_informasi' => $informasiId,
                'id_mahasiswa' => $idMahasiswa,
            ]);
        }

        return back()->with('success', 'Informasi berhasil dikirim.');
    }
}
