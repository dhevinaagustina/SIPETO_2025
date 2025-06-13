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



class SuratPernyataanController extends Controller
{
    // Untuk mahasiswa melihat surat yang diajukan sendiri
    public function mahasiswaIndex()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $daftarSurat = SuratPernyataan::where('id_mahasiswa', $idMahasiswa)
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

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

    // Admin melihat daftar surat berdasarkan tipe: aktif/alumni
    public function indexByTipe($tipe)
    {
        $query = SuratPernyataan::with('mahasiswa')->orderBy('tanggal_pengajuan', 'desc');

        // Filter berdasarkan tipe
        if ($tipe === 'aktif') {
            $query->whereHas('mahasiswa', fn($q) => $q->where('status', 'aktif'));
        } elseif ($tipe === 'alumni') {
            $query->whereHas('mahasiswa', fn($q) => $q->where('status', 'alumni'));
        } else {
            abort(404); // Tipe tidak dikenali
        }

        $daftarSurat = $query->get();

        return view('admin.surat_pernyataan', [
        'data' => $daftarSurat, // ⬅️ ini baris penting
        'tipe' => $tipe,         // agar bisa digunakan untuk tombol filter aktif/alumni
        'activeMenu' => 'surat_pernyataan',
        'breadcrumb' => new Fluent([
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
    $request->validate([
        'lampiran_1' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:2048',
        'lampiran_2' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:2048',
    ]);

    $mahasiswa = auth()->guard('mahasiswa')->user();

    $cekPengajuan = SuratPernyataan::where('id_mahasiswa', $mahasiswa->id_mahasiswa)
                        ->where('status', 'diajukan')
                        ->first();
    if ($cekPengajuan) {
        return response()->json([
            'status' => false,
            'message' => 'Anda sudah mengajukan surat. Tunggu keputusan admin.'
        ], 400);
    }

    $path1 = $request->file('lampiran_1')->store('lampiran_surat', 'public');
    $path2 = $request->file('lampiran_2')->store('lampiran_surat', 'public');

    SuratPernyataan::create([
        'id_mahasiswa' => $mahasiswa->id_mahasiswa,
        'tanggal_pengajuan' => now(),
        'lampiran_1' => $path1,
        'lampiran_2' => $path2,
        'status' => 'diajukan',
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Pengajuan surat berhasil dikirim.'
    ]);
}



public function index(Request $request)
{
    $query = SuratPernyataan::with('mahasiswa')
        ->orderBy('tanggal_pengajuan', 'desc');

    // Filter status surat
    if ($request->has('status') && in_array($request->status, ['selesai', 'diajukan', 'ditolak', 'diproses'])) {
        $query->where('status', $request->status);
    }

    $data = $query->get();

    return view('admin.surat_pernyataan', [
        'data' => $data,
        'activeMenu' => 'surat-pernyataan',
        'breadcrumb' => new Fluent([
            'title' => 'Daftar Pengajuan Surat Pernyataan',
            'list'  => ['Pengajuan Surat']
        ]),
        'currentStatus' => $request->status ?? '' // Pass the current status filter to view
    ]);
}

   public function validasi(Request $request, $id)
{
    $request->validate([
        'status_validasi'   => 'required|in:disetujui,ditolak',
        'catatan_validasi'  => 'nullable|string',
    ]);

    if ($request->status_validasi === 'ditolak' && !$request->filled('catatan_validasi')) {
        return redirect()->back()->withErrors([
            'catatan_validasi' => 'Catatan wajib diisi jika surat ditolak.'
        ])->withInput();
    }

    $surat = SuratPernyataan::findOrFail($id);

    // Default update
    $updateData = [
        'status_validasi'   => $request->status_validasi,
        'catatan_validasi'  => $request->catatan_validasi,
    ];

    // Jika ditolak, ubah juga status jadi "ditolak"
    if ($request->status_validasi === 'ditolak') {
        $updateData['status'] = 'ditolak';
    }

    $surat->update($updateData);

    // Jika disetujui, langsung buat surat
    if ($request->status_validasi === 'disetujui') {
        $this->generateSuratOtomatis($surat); // method ini akan set status jadi "selesai"
    }

    return redirect()->back()->with('success', 'Status validasi berhasil disimpan.');
}



    public function lihatLampiran($id)
    {
        $surat = SuratPernyataan::findOrFail($id);
        return view('admin.lampiran', compact('surat'));
    }

    private function generateSuratOtomatis(SuratPernyataan $surat)
    {
        $mahasiswa = $surat->mahasiswa;

        if (!$mahasiswa) return;

        $templatePath = public_path('template/surat_pernyataan.docx');
        if (!file_exists($templatePath)) return;

        $templateProcessor = new TemplateProcessor($templatePath);

        // Isi template
        $templateProcessor->setValue('nama', $mahasiswa->nama_mahasiswa);
        $templateProcessor->setValue('nim', $mahasiswa->nim);
        $templateProcessor->setValue('jurusan', $mahasiswa->jurusan ?? '-');
        $templateProcessor->setValue('prodi', $mahasiswa->prodi ?? '-');
        $templateProcessor->setValue('kampus', $mahasiswa->kampus ?? 'Politeknik Negeri Malang');
        $tanggalSurat = Carbon::now()->locale('id')->translatedFormat('d F Y');
        $templateProcessor->setValue('tanggal_surat', $tanggalSurat);

        $nomorSurat = rand(100, 999) . '/PL2.UPA BHS/' . now()->year;
        $templateProcessor->setValue('nomor_surat', $nomorSurat);

        // Tanda tangan
        $signaturePath = public_path('images/signature/atiqah_signature.png');
        if (!file_exists($signaturePath)) return;

        $templateProcessor->setImageValue('qr_signature', [
            'path' => $signaturePath,
            'width' => 120,
            'height' => 60,
            'ratio' => true,
        ]);

        // Simpan file
        $folderPath = storage_path('app/public/surat');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $fileName = 'Surat_Pernyataan_' . $mahasiswa->nim . '_' . time() . '.docx';
        $fullPath = $folderPath . '/' . $fileName;
        $savePath = 'surat/' . $fileName;

        $templateProcessor->saveAs($fullPath);

        // Simpan ke database
        $surat->update([
            'file_surat'     => $savePath,
            'status'         => 'selesai',
            'tanggal_surat'  => Carbon::now(),
            'nomor_surat'    => $nomorSurat,
        ]);
    }

}