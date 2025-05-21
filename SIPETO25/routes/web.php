<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CekDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('landing.index');
})->name('landing');

<<<<<<< HEAD
// =======================
// Auth (Login)
// =======================
=======

>>>>>>> e65c9c46e5feeb20e15245883b80076e577a6f1e

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/daftar-ujian', [UjianController::class, 'daftar'])->name('daftar.ujian');
    Route::get('/hasil-ujian', [UjianController::class, 'hasil'])->name('hasil.ujian');
    Route::get('/riwayat-ujian', [UjianController::class, 'riwayat'])->name('riwayat.ujian');
    Route::get('/pengajuan-surat', [SuratController::class, 'index'])->name('pengajuan.surat');
});

// =======================
// Admin Routes
// =======================

Route::prefix('admin')->group(function () {
    Route::get('/cekdata', [CekDataController::class, 'index'])->name('admin.cekdata');
    Route::get('/export/excel', [CekDataController::class, 'exportExcel'])->name('export.excel');
    Route::get('/export/pdf', [CekDataController::class, 'exportPDF'])->name('export.pdf');
});
