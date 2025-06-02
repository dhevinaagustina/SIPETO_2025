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
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'ditujukan_ke' => 'required|in:semua,tertentu',
            'mahasiswa_tertentu' => 'required_if:ditujukan_ke,tertentu|array',
            'lampiran' => 'nullable|file|max:5120|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        // Upload lampiran jika ada
        $namaFile = null;
        $tipeLampiran = null;

        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $namaFile = time() . '_' . $lampiran->getClientOriginalName();
            $lampiran->storeAs('public/lampiran_informasi', $namaFile);
            $tipeLampiran = $lampiran->getClientOriginalExtension(); // hasil: jpg, pdf, dll
        }

        // Simpan ke tabel informasi
        $informasiId = DB::table('informasi')->insertGetId([
            'judul' => $request->judul,
            'isi' => strip_tags($request->isi),
            'lampiran' => $namaFile,
            'tipe_lampiran' => $tipeLampiran,
            'ditujukan_ke' => $request->ditujukan_ke,
            'status' => $request->status === 'gagal' ? 'gagal' : 'berhasil',
            'id_admin' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Cek jika gagal simpan
        if (!$informasiId) {
            return back()->with('error', 'Gagal menyimpan informasi.');
        }

        // Tentukan mahasiswa penerima
        $mahasiswaIds = [];

        if ($request->ditujukan_ke === 'semua') {
            $mahasiswaIds = DB::table('mahasiswa')->pluck('id_mahasiswa')->toArray();
        } else {
            $mahasiswaIds = $request->mahasiswa_tertentu;
        }

        // Simpan ke pivot informasi_mahasiswa
        $dataPivot = [];
        foreach ($mahasiswaIds as $idMahasiswa) {
            $dataPivot[] = [
                'id_informasi' => $informasiId,
                'id_mahasiswa' => $idMahasiswa,
            ];
        }

        if (!empty($dataPivot)) {
            DB::table('informasi_mahasiswa')->insert($dataPivot);
        }

        return back()->with('success', 'Informasi berhasil dikirim.');
    }
}
