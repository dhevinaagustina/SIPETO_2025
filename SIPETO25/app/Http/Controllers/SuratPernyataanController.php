<?php

namespace App\Http\Controllers;

use App\Models\SuratPernyataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;
use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
    // Admin lihat daftar pengajuan
    public function index()
    {
    $data = \App\Models\SuratPernyataan::with('mahasiswa')->get();
    return view('admin.surat_pernyataan', compact('data'));
    }

 public function generateSurat($id)
{
    $surat = SuratPernyataan::with('mahasiswa')->findOrFail($id);
    $mahasiswa = $surat->mahasiswa;

    if (!$mahasiswa) {
        return redirect()->route('admin.surat_pernyataan.index')->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    $templatePath = public_path('template/surat_pernyataan.docx');
    if (!file_exists($templatePath)) {
        return redirect()->route('admin.surat_pernyataan.index')->with('error', 'Template surat tidak ditemukan.');
    }

    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);

    // Set data mahasiswa ke dalam template
    $templateProcessor->setValue('nama', $mahasiswa->nama_mahasiswa);
    $templateProcessor->setValue('nim', $mahasiswa->nim);
    $templateProcessor->setValue('jurusan', $mahasiswa->jurusan ?? '-');
    $templateProcessor->setValue('prodi', $mahasiswa->prodi ?? '-');
    $templateProcessor->setValue('kampus', $mahasiswa->kampus ?? 'Politeknik Negeri Malang');

    // Tanggal surat dan nomor surat
    $tanggalSurat = Carbon::now()->locale('id')->translatedFormat('d F Y'); // e.g., 30 Mei 2025
    $templateProcessor->setValue('tanggal_surat', $tanggalSurat);

    $nomorSurat = rand(100, 999) . '/PL2. UPA BHS/' . now()->year;
    $templateProcessor->setValue('nomor_surat', $nomorSurat);

    // Gambar tanda tangan kering
    $signaturePath = public_path('images/signature/atiqah_signature.png');
    if (!file_exists($signaturePath)) {
        return redirect()->route('admin.surat_pernyataan.index')->with('error', 'File tanda tangan tidak ditemukan.');
    }

    // Masukkan tanda tangan ke dalam template
    $templateProcessor->setImageValue('qr_signature', [
        'path' => $signaturePath,
        'width' => 120,
        'height' => 60,
        'ratio' => true,
    ]);

    // Simpan file Word ke storage
    $folderPath = storage_path('app/public/surat');
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    $fileName = 'Surat_Pernyataan_' . $mahasiswa->nim . '_' . time() . '.docx';
    $fullPath = $folderPath . '/' . $fileName;
    $savePath = 'surat/' . $fileName;

    $templateProcessor->saveAs($fullPath);

    // Update data surat di database
    $surat->update([
        'file_surat'     => $savePath,
        'status'         => 'selesai',
        'tanggal_surat'  => Carbon::now(), // Pastikan kolom ini ada
        'nomor_surat'    => $nomorSurat,
    ]);

    return redirect()->route('admin.surat_pernyataan.index')->with('success', 'Surat berhasil dibuat.');
}
}