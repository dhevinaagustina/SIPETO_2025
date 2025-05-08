<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Landing Page
Route::get('/', function () {
    return view('landing.index');
});

Route::get('/portfolio-details', function () {
    return view('landing.portfolio-details');
});

Route::get('/service-details', function () {
    return view('landing.service-details');
});

Route::post('/send-contact', [FormController::class, 'sendContact']);
Route::post('/subscribe-newsletter', [FormController::class, 'subscribeNewsletter']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Admin Login (gunakan URL dengan /admin)
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login']);
// Admin Register
// Menampilkan form registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
// Menangani proses registrasi
Route::post('/register', [RegisterController::class, 'register']);



// Halaman untuk Mahasiswa
Route::middleware('auth:mahasiswa')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Daftar Ujian
    Route::get('/daftar-ujian', [UjianController::class, 'daftar'])->name('daftar.ujian');

    // Hasil Ujian
    Route::get('/hasil-ujian', [UjianController::class, 'hasil'])->name('hasil.ujian');

    // Riwayat Ujian
    Route::get('/riwayat-ujian', [UjianController::class, 'riwayat'])->name('riwayat.ujian');

    // Pengajuan Surat
    Route::get('/pengajuan-surat', [SuratController::class, 'index'])->name('pengajuan.surat');
});