<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CekDataController;

use App\Http\Controllers\InputHasilUjianController;

use App\Http\Controllers\PendaftaranToeicController;


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
// Auth (Login & Logout)
// =======================

// Login Mahasiswa
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Login Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'loginAdmin']);
});
// =======================
// Mahasiswa Routes (Protected)
// =======================

Route::middleware(['auth:mahasiswa'])->group(function () {
    Route::get('/dashboard/beranda', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/hasil-ujian', [UjianController::class, 'hasil'])->name('hasil.ujian');
    Route::get('/riwayat-ujian', [UjianController::class, 'riwayat'])->name('riwayat.ujian');
    Route::get('/pengajuan-surat', [SuratController::class, 'index'])->name('pengajuan.surat');
    
    Route::get('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'store'])->name('pendaftaran.store');

    Route::get('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'createMandiri'])->name('pendaftaran-toeic/mandiri.create');
    Route::post('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'storeMandiri'])->name('pendaftaran-toeic/mandiri.store');

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



