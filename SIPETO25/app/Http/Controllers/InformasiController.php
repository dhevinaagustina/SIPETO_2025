<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Mahasiswa;

class InformasiController extends Controller
{
    public function index()
{
    $informasi = DB::table('informasi')
        ->leftJoin('informasi_mahasiswa', 'informasi.id_informasi', '=', 'informasi_mahasiswa.id_informasi')
        ->leftJoin('mahasiswa', 'informasi_mahasiswa.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
        ->select(
            'informasi.*',
            DB::raw("GROUP_CONCAT(mahasiswa.status) as status_mahasiswa")
        )
        ->groupBy(
            'informasi.id_informasi',
            'informasi.judul',
            'informasi.isi',
            'informasi.lampiran',
            'informasi.ditujukan_ke',
            'informasi.status',
            'informasi.created_at',
            'informasi.updated_at'
        )
        ->orderBy('informasi.created_at', 'desc')
        ->get();

    return view('admin.informasi.index', compact('informasi'));
}
    public function create()
    {
        $mahasiswa = DB::table('mahasiswa')->where('status', 'aktif')->select('id_mahasiswa', 'nama_mahasiswa')->get();
        $alumni = DB::table('mahasiswa')->where('status', 'alumni')->select('id_mahasiswa', 'nama_mahasiswa')->get();
        $dosen = DB::table('dosen')->select('id_dosen', 'nama_dosen')->get();

        return view('admin.kirim_informasi', compact('mahasiswa', 'alumni', 'dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'ditujukan_ke' => 'required|in:semua_mahasiswa,mahasiswa_tertentu,semua_alumni,alumni_tertentu,semua_dosen,dosen_tertentu',
            'mahasiswa_tertentu' => 'required_if:ditujukan_ke,mahasiswa_tertentu|array',
            'alumni_tertentu' => 'required_if:ditujukan_ke,alumni_tertentu|array',
            'dosen_tertentu' => 'required_if:ditujukan_ke,dosen_tertentu|array',
            'lampiran' => 'nullable|file|max:5120|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        // Upload lampiran jika ada
        $namaFile = null;
        $tipeLampiran = null;

        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $namaFile = time() . '_' . $lampiran->getClientOriginalName();
            $lampiran->storeAs('public/lampiran_informasi', $namaFile);
            $tipeLampiran = $lampiran->getClientOriginalExtension();
        }

        // Simpan ke tabel informasi
        $informasiId = DB::table('informasi')->insertGetId([
            'judul' => $request->judul,
            'isi' => strip_tags($request->isi),
            'lampiran' => $namaFile,
            'tipe_lampiran' => $tipeLampiran,
            'ditujukan_ke' => $request->ditujukan_ke,
            'status' => $request->status === 'gagal' ? 'gagal' : 'berhasil',
            'id_admin' => auth('admin')->user()->id_admin,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if (!$informasiId) {
            return back()->with('error', 'Gagal menyimpan informasi.');
        }

        // Tentukan penerima berdasarkan pilihan
        $mahasiswaIds = [];
        $dosenIds = [];

        switch ($request->ditujukan_ke) {
            case 'semua_mahasiswa':
                $mahasiswaIds = DB::table('mahasiswa')->where('status', 'aktif')->pluck('id_mahasiswa')->toArray();
                break;

            case 'mahasiswa_tertentu':
                $mahasiswaIds = $request->mahasiswa_tertentu;
                break;

            case 'semua_alumni':
                $mahasiswaIds = DB::table('mahasiswa')->where('status', 'alumni')->pluck('id_mahasiswa')->toArray();
                break;

            case 'alumni_tertentu':
                $mahasiswaIds = $request->alumni_tertentu;
                break;

            case 'semua_dosen':
                $dosenIds = DB::table('dosen')->pluck('id_dosen')->toArray();
                break;

            case 'dosen_tertentu':
                $dosenIds = $request->dosen_tertentu;
                break;
        }

        // Simpan ke pivot mahasiswa
        if (!empty($mahasiswaIds)) {
            $pivotMahasiswa = array_map(fn($id) => [
                'id_informasi' => $informasiId,
                'id_mahasiswa' => $id,
            ], $mahasiswaIds);

            DB::table('informasi_mahasiswa')->insert($pivotMahasiswa);
        }

        // Simpan ke pivot dosen
        if (!empty($dosenIds)) {
            $pivotDosen = array_map(fn($id) => [
                'id_informasi' => $informasiId,
                'id_dosen' => $id,
            ], $dosenIds);

            DB::table('informasi_dosen')->insert($pivotDosen);
        }

        return back()->with('success', 'Informasi berhasil dikirim.');
    }

    public function getMahasiswa(Request $request)
    {
        $kategori = $request->kategori;

        if ($kategori === 'aktif') {
            $mahasiswa = Mahasiswa::where('status', 'aktif')
                ->select('id_mahasiswa as id', 'nama_mahasiswa as nama')
                ->get();
        } elseif ($kategori === 'alumni') {
            $mahasiswa = Mahasiswa::where('status', 'alumni')
                ->select('id_mahasiswa as id', 'nama_mahasiswa as nama')
                ->get();
        } else {
            return response()->json([]);
        }

        return response()->json($mahasiswa);
    }
}
