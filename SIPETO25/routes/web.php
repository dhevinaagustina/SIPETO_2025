<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CekDataController;

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardControllerAdmin;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ToeicController;
use App\Http\Controllers\Admin\MessageController;

use App\Http\Controllers\SuratPernyataanController;
use App\Http\Controllers\InputHasilUjianController;
use App\Http\Controllers\PendaftaranToeicController;
use App\Http\Controllers\RiwayatUjianController;
use App\Http\Controllers\MahasiswaRiwayatUjianController;
use Illuminate\Support\Facades\Auth;



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


// Grup route untuk admin
Route::prefix('admin')->name('admin.')->group(function() {
    // Route autentikasi
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // Route yang diproteksi
    Route::middleware(['auth:admin'])->group(function() {
        Route::get('/dashboard', [DashboardControllerAdmin::class, 'index'])->name('dashboard');
        Route::get('/daftar-ujian', [UjianController::class, 'daftar'])->name('daftar.ujian');
        Route::get('/hasil-ujian', [UjianController::class, 'hasil'])->name('hasil.ujian');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/messages', [MessageController::class, 'create']);
    Route::post('/messages/send', [MessageController::class, 'send']);

// Login Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'loginAdmin']);

});
// // Route khusus untuk preview tanpa auth
// Route::prefix('preview/admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     });
    
//     Route::get('/data-peserta', function () {
//         return view('admin.data-peserta');
//     });
// });

// // Route tanpa middleware untuk preview
// Route::get('/admin-preview', function () {
//     return view('admin.dashboard', [
//         'user' => (object)[
//             'name' => 'Admin Preview',
//             'email' => 'preview@example.com'
//         ],
//         'stats' => [
//             'total' => 1000,
//             'passed' => 650,
//             'pending' => 35
//         ]
//     ]);
// });

// if (app()->environment('local')) {
//     Route::get('/admin-preview', function () {
//         Auth::loginUsingId(1); // Login dengan user ID 1
//         return redirect()->route('admin.dashboard');
//     });
// }

// =======================
// Mahasiswa Routes (Protected)
// =======================
Route::middleware(['auth:mahasiswa'])->group(function () {

    Route::get('/dashboard/beranda', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/riwayat-ujian', [RiwayatUjianController::class, 'riwayat'])->name('riwayat.ujian');


    Route::get('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'store'])->name('pendaftaran.store');


Route::middleware([])->group(function () {
    Route::get('/dashboard/beranda', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/pesan', [\App\Http\Controllers\Student\MessageController::class, 'index'])->name('student.messages.index');
    Route::post('/messages/{message}/mark-as-read', [\App\Http\Controllers\Student\MessageController::class, 'markAsRead'])->name('student.messages.markAsRead');
    Route::get('/riwayat-ujian', [UjianController::class, 'riwayat'])->name('riwayat.ujian');
    Route::get('/pengajuan-surat', [SuratController::class, 'index'])->name('pengajuan.surat');
    Route::get('/mahasiswa/pesan', [Mahasiswa\MessageController::class, 'index']);
});

Route::get('/pesan', function () {
    return view('pesan.index');
});

// =======================
// ARTIKEL 
// =======================

Route::get('/toeic-resources', [ToeicController::class, 'index'])->name('toeic.resources');
Route::get('/toeic-resources/understanding', [ToeicController::class, 'understanding'])->name('toeic.understanding');
Route::get('/toeic-resources/strategies', [ToeicController::class, 'strategies'])->name('toeic.strategies');
Route::get('/toeic-resources/practice', [ToeicController::class, 'practice'])->name('toeic.practice');

    Route::get('/dashboard/beranda', [DashboardController::class, 'index'])->name('dashboard.beranda');
    Route::get('/hasil-ujian', [UjianController::class, 'hasil'])->name('hasil.ujian');
    Route::get('/riwayat-ujian', [UjianController::class, 'riwayat'])->name('riwayat.ujian');

    // TOEIC Gratis
    Route::get('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'create'])
        ->name('pendaftaran.create');
    Route::post('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'store'])
        ->name('pendaftaran.store');
    Route::get('/pendaftaran-toeic/cek', [PendaftaranToeicController::class, 'cekGratis'])
        ->name('pendaftaran.cek');
    

    // TOEIC Mandiri
    Route::get('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'createMandiri'])
        ->name('pendaftaran-toeic/mandiri.create');
    Route::post('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'storeMandiri'])
        ->name('pendaftaran-toeic/mandiri.store');

    // Halaman dan aksi pengajuan surat
    Route::get('/surat_pernyataan', [SuratPernyataanController::class, 'mahasiswaIndex'])->name('mahasiswa.surat_pernyataan.index');
    Route::post('/surat_pernyataan/ajukan', [SuratPernyataanController::class, 'ajukanSurat'])->name('mahasiswa.surat_pernyataan.ajukan');
    // ✅ Route tambahan untuk AJAX validasi sebelum ajukan surat
    Route::get('/surat_pernyataan/cek', [SuratPernyataanController::class, 'cekPengajuan'])->name('mahasiswa.surat_pernyataan.cek');

    // web.php
    Route::get('/mahasiswa/riwayat-ujian', [MahasiswaRiwayatUjianController::class, 'index'])->name('mahasiswa.riwayat');
    Route::get('/mahasiswa/riwayat-ujian/ajax', [MahasiswaRiwayatUjianController::class, 'getData'])->name('mahasiswa.riwayat.ajax');

});


// =======================
// Admin Routes
// =======================


// Admin Routes
Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // ... route lainnya
    
    // Message Routes
    Route::prefix('messages')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\MessageController::class, 'create'])->name('admin.messages.create');
        Route::post('/send', [\App\Http\Controllers\Admin\MessageController::class, 'send'])->name('admin.messages.send');
    });
});

// Student Routes
Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    // ... route lainnya
    
    // Message Routes
    
});

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/cekdata', [CekDataController::class, 'index'])->name('cekdata.index');
    Route::get('/cekdata/data', [CekDataController::class, 'getData'])->name('cekdata.data');
    Route::get('/cekdata/export-excel', [CekDataController::class, 'exportExcel'])->name('cekdata.export.excel');
    Route::get('/cekdata/export-pdf', [CekDataController::class, 'exportPDF'])->name('cekdata.export.pdf');

    Route::get('/cekdata/data', [CekDataController::class, 'getData'])->name('cekdata.data');

// Route untuk menampilkan daftar hasil ujian
Route::get('/hasil-ujian', [InputHasilUjianController::class, 'index'])->name('hasil-ujian.index');

    Route::get('/riwayat-ujian', [RiwayatUjianController::class, 'index'])->name('admin.riwayat');
    Route::get('/riwayat-ujian/ajax', [RiwayatUjianController::class, 'getData'])->name('admin.riwayat.ajax');
    Route::post('/admin/riwayat-ujian/simpan', [RiwayatUjianController::class, 'simpan'])->name('riwayatujian.simpan');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('admin.logout');
});


