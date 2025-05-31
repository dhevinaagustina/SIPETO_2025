<?php

namespace App\Http\Controllers\Admin; // Updated namespace

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\PendaftaranToeic;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard Admin',
            'list' => ['Home', 'Dashboard']
        ];

        $activeMenu = 'dashboard';

        // Get real statistics from database
        $stats = [
            'total_pendaftar' => Mahasiswa::count(),
            'pendaftar_bulan_ini' => Mahasiswa::whereMonth('created_at', Carbon::now()->month)->count(),
            'persentase_kenaikan' => $this->calculateGrowthRate(),
            'mahasiswa_baru' => Mahasiswa::whereDate('created_at', Carbon::today())->count(),
            'belum_lengkap' => Mahasiswa::whereDoesntHave('pendaftaranToeic')->count()
        ];

        $pendaftaranTerbaru = PendaftaranToeic::with('mahasiswa')
        ->orderByDesc('tanggal_daftar')
        ->take(5)
        ->get();

        return view('admin.dashboard', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'stats' => $stats,
            'pendaftaranTerbaru' => $pendaftaranTerbaru
        ]);
    }

    private function calculateGrowthRate()
    {
        $currentMonthCount = Mahasiswa::whereMonth('created_at', Carbon::now()->month)->count();
        $lastMonthCount = Mahasiswa::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        
        return $lastMonthCount > 0 
            ? round(($currentMonthCount - $lastMonthCount) / $lastMonthCount * 100, 2)
            : 100;
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