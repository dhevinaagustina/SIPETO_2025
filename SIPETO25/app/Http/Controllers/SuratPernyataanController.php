<?php

namespace App\Http\Controllers;

use App\Models\SuratPernyataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;

class SuratPernyataanController extends Controller
{
    // Mahasiswa
    public function mahasiswaIndex()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $daftarSurat = SuratPernyataan::where('id_mahasiswa', $idMahasiswa)->orderBy('tanggal_pengajuan', 'desc')->get();

        return view('mahasiswa.surat_pernyataan', [
            'daftarSurat'         => $daftarSurat,
            'sudahMengajukan'     => $daftarSurat->isNotEmpty(),
            'activeMenu'          => 'surat_pernyataan',
            'breadcrumb'          => new Fluent([
                'title' => 'Pengajuan Surat Pernyataan',
                'list'  => ['Pengajuan Surat']
            ]),
        ]);
    }

    public function cekPengajuan()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return response()->json([
                'status' => false,
                'message' => 'Silakan login terlebih dahulu.'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Pastikan anda adalah mahasiswa tingkat akhir / mahasiswa yang benar-benar membutuhkan surat pernyataan ini.'
        ]);
    }

    public function ajukanSurat(Request $request)
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            if ($request->ajax()) {
                return response()->json(['status' => false, 'message' => 'Silakan login terlebih dahulu.']);
            }
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        SuratPernyataan::create([
            'id_mahasiswa'      => $idMahasiswa,
            'tanggal_pengajuan' => now(),
            'status'            => 'diajukan',
        ]);

        if ($request->ajax()) {
            return response()->json(['status' => true, 'message' => 'Pengajuan berhasil dikirim.']);
        }

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
    }

    // Admin
    public function index()
    {
        $data = SuratPernyataan::with('mahasiswa')->get();

        return view('admin.surat_pernyataan', [
            'data'        => $data,
            'activeMenu'  => 'surat_pernyataan',
            'breadcrumb'  => new Fluent([
                'title' => 'Daftar Pengajuan Surat',
                'list'  => ['Admin Dashboard', 'Daftar Pengajuan Surat']
            ]),
        ]);
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'file_surat' => 'required|file|mimes:pdf|max:2048',
        ]);

        $surat = SuratPernyataan::findOrFail($id);

        if ($surat->file_surat) {
            Storage::delete($surat->file_surat);
        }

        $path = $request->file('file_surat')->store('surat_pernyataan');

        $surat->update([
            'file_surat' => $path,
            'status'     => 'selesai',
        ]);

        return redirect()->back()->with('success', 'File surat berhasil diunggah.');
    }
}
