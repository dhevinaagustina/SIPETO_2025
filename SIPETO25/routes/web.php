<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CekDataController;
use App\Http\Controllers\InputHasilUjianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('landing.index');
})->name('landing');

// =======================
// Auth (Login)
// =======================

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Login
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);
});

// =======================
// Mahasiswa Routes
// =======================

Route::middleware([])->group(function () {
    Route::get('/dashboard/beranda-mahasiswa', [DashboardController::class, 'index'])->name('dashboard-beranda');
    Route::get('/daftar-ujian', [UjianController::class, 'daftar'])->name('daftar.ujian');
    Route::get('/hasil-ujian', [UjianController::class, 'hasil'])->name('hasil.ujian');
    Route::get('/riwayat-ujian', [UjianController::class, 'riwayat'])->name('riwayat.ujian');
    Route::get('/pengajuan-surat', [SuratController::class, 'index'])->name('pengajuan.surat');
});

// =======================
// Admin Routes
// =======================

Route::prefix('admin')->group(function () {
    Route::get('/cekdata', [CekDataController::class, 'index'])->name('cekdata.index');
    Route::get('/cekdata/export-excel', [CekDataController::class, 'exportExcel'])->name('cekdata.export.excel');
    Route::get('/cekdata/export-pdf', [CekDataController::class, 'exportPDF'])->name('cekdata.export.pdf');
    Route::get('/cekdata/data', [CekDataController::class, 'getData'])->name('cekdata.data');

    // Route untuk menampilkan daftar hasil ujian
Route::get('/hasil-ujian', [InputHasilUjianController::class, 'index'])->name('hasil-ujian.index');

// Route untuk menampilkan form input hasil ujian
Route::get('/input-hasil-ujian', [InputHasilUjianController::class, 'create'])->name('inputujian.create');

// Route untuk menyimpan data hasil ujian
Route::post('/input-hasil-ujian', [InputHasilUjianController::class, 'store'])->name('inputujian.store');
});



