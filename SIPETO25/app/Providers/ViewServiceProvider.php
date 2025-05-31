<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Sidebar: $activeMenu
        View::composer('layouts-admin.sidebar', function ($view) {
            $routeName = Route::currentRouteName();

            $activeMenu = match (true) {
                str_starts_with($routeName, 'dashboard.') => 'dashboard',
                str_starts_with($routeName, 'cekdata.') => 'cek-data',
                str_starts_with($routeName, 'admin.riwayat') => 'riwayat-ujian',
                str_starts_with($routeName, 'admin.surat_pernyataan') => 'surat_pernyataan',
                default => '',
            };

            $view->with('activeMenu', $activeMenu);
        });

        // Breadcrumb: $breadcrumb
      View::composer('layouts-admin.breadcrumb', function ($view) {
    $routeName = Route::currentRouteName();

    $breadcrumbTitle = match (true) {
        str_starts_with($routeName, 'dashboard.beranda') => 'Beranda',
        str_starts_with($routeName, 'dashboard.pesan') => 'Tulis Pesan',
        str_starts_with($routeName, 'cekdata') => 'Cek Data Mahasiswa',
        str_starts_with($routeName, 'admin.riwayat') => 'Riwayat Ujian TOEIC',
        str_starts_with($routeName, 'admin.surat_pernyataan') => 'Pengajuan Surat Pernyataan',
        default => 'Halaman',
    };

    // Daftar breadcrumb opsional
    $breadcrumbList = match (true) {
        str_starts_with($routeName, 'dashboard.beranda') => [],
        str_starts_with($routeName, 'dashboard.pesan') => ['Beranda' => route('dashboard.beranda')],
        str_starts_with($routeName, 'cekdata') => ['Beranda' => route('dashboard.beranda')],
        str_starts_with($routeName, 'admin.riwayat') => ['Beranda' => route('dashboard.beranda')],
        str_starts_with($routeName, 'admin.surat_pernyataan') => ['Beranda' => route('dashboard.beranda')],
        default => [],
    };

    $view->with('breadcrumb', (object)[
        'title' => $breadcrumbTitle,
        'list' => $breadcrumbList
    ]);
});
    }
    public function register()
    {
        //
    }
}
