<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CekDataController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardControllerAdmin;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ToeicController;
use App\Http\Controllers\Admin\MessageController;


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
// Mahasiswa Routes
// =======================

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
// =======================
// Admin Routes
// =======================

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/data-peserta', [AdminController::class, 'dataPeserta'])->name('data-peserta');
    Route::get('/input-hasil', [AdminController::class, 'inputHasil'])->name('input-hasil');
    Route::get('/cekdata', [CekDataController::class, 'index'])->name('admin.cekdata');
    Route::get('/export/excel', [CekDataController::class, 'exportExcel'])->name('export.excel');
    Route::get('/export/pdf', [CekDataController::class, 'exportPDF'])->name('export.pdf');
});


// Password Reset Routes
// Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/test-db', function() {
    try {
        DB::connection()->getPdo();
        return "Connected to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

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