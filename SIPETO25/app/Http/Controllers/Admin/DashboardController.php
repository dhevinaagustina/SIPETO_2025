<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\PendaftaranToeic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total mahasiswa
        $totalMahasiswa = Mahasiswa::count();

        // Hitung mahasiswa yang sudah mendaftar TOEIC (unik berdasarkan id_mahasiswa = NIM)
        $mahasiswaSudahDaftar = PendaftaranToeic::distinct('id_mahasiswa')->count('id_mahasiswa');

        // Hitung mahasiswa yang belum mendaftar
        $mahasiswaBelumDaftar = $totalMahasiswa - $mahasiswaSudahDaftar;

        // Hitung total semua pendaftaran TOEIC
        $totalPendaftaranToeic = PendaftaranToeic::count();

        // Hitung persentase
        $persentaseSudah = $totalMahasiswa > 0 ? round(($mahasiswaSudahDaftar / $totalMahasiswa) * 100, 1) : 0;
        $persentaseBelum = 100 - $persentaseSudah;

        // Ambil pendaftaran terbaru
        $pendaftaranTerbaru = PendaftaranToeic::with('mahasiswa')
            ->orderByDesc('tanggal_daftar')
            ->take(6)
            ->get();

        // Grafik: Trend Pendaftaran 6 Bulan Terakhir
        $bulan = collect();
        $jumlahPerBulan = collect();

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $label = $date->translatedFormat('F Y');

            $jumlah = PendaftaranToeic::whereYear('tanggal_daftar', $date->year)
                ->whereMonth('tanggal_daftar', $date->month)
                ->count();

            $bulan->push($label);
            $jumlahPerBulan->push($jumlah);
        }

        // Grafik: Distribusi Jurusan (yang daftar TOEIC)
        $distribusiJurusan = Mahasiswa::join('pendaftaran_toeic', 'mahasiswa.nim', '=', 'pendaftaran_toeic.id_mahasiswa')
            ->select('mahasiswa.jurusan', DB::raw('count(*) as total'))
            ->groupBy('mahasiswa.jurusan')
            ->orderByDesc('total')
            ->get();

        $jurusanLabels = $distribusiJurusan->pluck('jurusan');
        $jurusanData = $distribusiJurusan->pluck('total');

        // Grafik: Distribusi Prodi (yang daftar TOEIC)
        $distribusiProdi = Mahasiswa::join('pendaftaran_toeic', 'mahasiswa.nim', '=', 'pendaftaran_toeic.id_mahasiswa')
            ->select('mahasiswa.prodi', DB::raw('count(*) as total'))
            ->groupBy('mahasiswa.prodi')
            ->orderByDesc('total')
            ->get();

        $prodiLabels = $distribusiProdi->pluck('prodi');
        $prodiData = $distribusiProdi->pluck('total');

        // Grafik: Semua Mahasiswa per Prodi (tanpa filter pendaftaran)
        $semuaProdi = Mahasiswa::select('prodi', DB::raw('count(*) as total'))
            ->groupBy('prodi')
            ->orderByDesc('total')
            ->get();

        $semuaProdiLabels = $semuaProdi->pluck('prodi');
        $semuaProdiData = $semuaProdi->pluck('total');

        // Breadcrumb dan aktif menu
        $breadcrumb = (object) [
            'title' => 'Dashboard Admin',
            'list' => ['Home', 'Dashboard']
        ];
        $activeMenu = 'dashboard';

        return view('admin.dashboard', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'stats' => [
                'total_pendaftar' => $totalMahasiswa,
                'mahasiswa_baru' => $mahasiswaSudahDaftar,
                'belum_mendaftar' => $mahasiswaBelumDaftar,
            ],
            'persentaseSudah' => $persentaseSudah,
            'persentaseBelum' => $persentaseBelum,
            'pendaftaranTerbaru' => $pendaftaranTerbaru,
            'bulan' => $bulan,
            'jumlahPerBulan' => $jumlahPerBulan,
            'jurusanLabels' => $jurusanLabels,
            'jurusanData' => $jurusanData,
            'prodiLabels' => $prodiLabels,
            'prodiData' => $prodiData,
            'semuaProdiLabels' => $semuaProdiLabels,
            'semuaProdiData' => $semuaProdiData,
        ]);
    }

    public function getTerbaru()
    {
        $data = PendaftaranToeic::with('mahasiswa') // Eager load relasi mahasiswa
            ->orderByDesc('tanggal_daftar')
            ->take(5)
            ->get();

        $formatted = $data->map(function ($item) {
            return [
                'nama' => $item->mahasiswa->nama_mahasiswa ?? '-',      // dari relasi
                'nim' => $item->mahasiswa->nim ?? '-',        // dari relasi
                'tanggal_daftar' => $item->tanggal_daftar,
                'tipe_ujian' => $item->tipe_ujian,
            ];
        });

        return response()->json(['data' => $formatted]);
    }
}
