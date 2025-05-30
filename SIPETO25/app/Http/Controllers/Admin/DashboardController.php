<?php

namespace App\Http\Controllers\Admin; // Updated namespace

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
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

        return view('admin.dashboard', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'stats' => $stats
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
}