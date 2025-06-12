<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CekDataController;
use App\Http\Controllers\SuratPernyataanController;
use App\Http\Controllers\PendaftaranToeicController;
use App\Http\Controllers\RiwayatUjianController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MahasiswaRiwayatUjianController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ToeicController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('landing.index');
})->name('landing');

Route::get('/', function () {
    $locale = session('locale', 'en');
    App::setLocale($locale);
    return view('landing.index'); // jika file kamu berada di resources/views/landing/index.blade.php
})->name('landing');

Route::get('/set-locale/{lang}', function ($lang) {
    if (in_array($lang, ['id', 'en'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
});

// =======================
// Auth (Login & Logout)
// =======================

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Login Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'loginAdmin']);
});



// =// =======================
// Mahasiswa Routes (Protected)
// =======================
Route::middleware(['auth:mahasiswa'])->group(function () {

    // ✉️ Pesan
    Route::get('/dashboard/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/dashboard/pesan/{id}', [PesanController::class, 'show'])->name('pesan.show');
    Route::get('/dashboard/pesan/{id}/download', [PesanController::class, 'download'])->name('pesan.download');

    // 📚 Artikel TOEIC
    Route::get('/toeic-resources', [ToeicController::class, 'index'])->name('toeic.resources');
    Route::get('/toeic-resources/understanding', [ToeicController::class, 'understanding'])->name('toeic.understanding');
    Route::get('/toeic-resources/strategies', [ToeicController::class, 'strategies'])->name('toeic.strategies');
    Route::get('/toeic-resources/practice', [ToeicController::class, 'practice'])->name('toeic.practice');

    // 📜 Riwayat Ujian Mahasiswa
    Route::get('/mahasiswa/riwayat-ujian', [MahasiswaRiwayatUjianController::class, 'index'])->name('mahasiswa.riwayat');
    Route::get('/mahasiswa/riwayat-ujian/ajax', [MahasiswaRiwayatUjianController::class, 'getData'])->name('mahasiswa.riwayat.ajax');

    // 📜 Riwayat Ujian TOEIC (umum)
    Route::get('/riwayat-ujian', [RiwayatUjianController::class, 'riwayat'])->name('riwayat.ujian');

    // 👨‍🎓 Mahasiswa Aktif Only
    Route::middleware(['isaktif'])->group(function () {
        // Dashboard Mahasiswa Aktif
        Route::get('/dashboard/beranda', [DashboardController::class, 'index'])->name('dashboard.beranda');

        // TOEIC Gratis
        Route::get('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'create'])->name('pendaftaran.create');
        Route::post('/pendaftaran-toeic/gratis', [PendaftaranToeicController::class, 'store'])->name('pendaftaran.store');
        Route::get('/pendaftaran-toeic/cek', [PendaftaranToeicController::class, 'cekGratis'])->name('pendaftaran.cek');
    });

    // 🎓 Alumni Only
    Route::middleware(['isalumni'])->group(function () {
        // (Opsional) Dashboard Alumni
        Route::get('/alumni/dashboard', function () {
            return view('alumni.dashboard');
        })->name('alumni.dashboard');

        // TOEIC Mandiri
        Route::get('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'createMandiri'])->name('pendaftaran-toeic/mandiri.create');
        Route::post('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'storeMandiri'])->name('pendaftaran-toeic/mandiri.store');

        // Surat Pernyataan

    });

        Route::get('/surat_pernyataan', [SuratPernyataanController::class, 'mahasiswaIndex'])->name('mahasiswa.surat_pernyataan.index');
        Route::post('/surat_pernyataan/ajukan', [SuratPernyataanController::class, 'ajukanSurat'])->name('mahasiswa.surat_pernyataan.ajukan');
        Route::get('/surat_pernyataan/cek', [SuratPernyataanController::class, 'cekPengajuan'])->name('mahasiswa.surat_pernyataan.cek');
});

    // Route::middleware([])->group(function () {
    // Route::get('/dashboard/beranda', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard/pesan', [\App\Http\Controllers\Student\MessageController::class, 'index'])->name('student.messages.index');
    // Route::post('/messages/{message}/mark-as-read', [\App\Http\Controllers\Student\MessageController::class, 'markAsRead'])->name('student.messages.markAsRead');
    // Route::get('/mahasiswa/pesan', [\App\Http\Controllers\Student\MessageController::class, 'index']);
    // });

    // Route::get('/pesan', function () {
    //     return view('pesan.index');
    // });

Route::middleware(['auth.mahasiswa.or.dosen'])->group(function () {
    // Akses terbatas untuk dosen
    Route::get('/dashboard/beranda', [DashboardController::class, 'index'])->name('dashboard.beranda');

    Route::get('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'createMandiri'])->name('pendaftaran-toeic/mandiri.create');
    Route::post('/pendaftaran-toeic/mandiri', [PendaftaranToeicController::class, 'storeMandiri'])->name('pendaftaran-toeic/mandiri.store');

    Route::get('/toeic-resources', [ToeicController::class, 'index'])->name('toeic.resources');
    Route::get('/toeic-resources/understanding', [ToeicController::class, 'understanding'])->name('toeic.understanding');
    Route::get('/toeic-resources/strategies', [ToeicController::class, 'strategies'])->name('toeic.strategies');
    Route::get('/toeic-resources/practice', [ToeicController::class, 'practice'])->name('toeic.practice');

    Route::get('/dashboard/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/dashboard/pesan/{id}', [PesanController::class, 'show'])->name('pesan.show');
    Route::get('/dashboard/pesan/{id}/download', [PesanController::class, 'download'])->name('pesan.download');
});




// =======================
// Admin Routes
// =======================
Route::prefix('admin')->name('admin.')->middleware('admin_or_super')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

   
        Route::middleware('superadmin_only')->group(function () {
            // Kelola Admin - hanya untuk super admin
            Route::get('/kelola-admin', [SuperAdminController::class, 'index'])->name('kelola_admin');
            Route::get('/kelola-admin/create', [SuperAdminController::class, 'create'])->name('kelola_admin.create');
            Route::post('/kelola-admin', [SuperAdminController::class, 'store'])->name('kelola_admin.store');
            Route::get('/kelola-admin/{id}/edit', [SuperAdminController::class, 'edit'])->name('kelola_admin.edit');
            Route::put('/kelola-admin/{id}', [SuperAdminController::class, 'update'])->name('kelola_admin.update');
            Route::delete('/kelola-admin/{id}', [SuperAdminController::class, 'destroy'])->name('kelola_admin.destroy');

            // Kelola Mahasiswa
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
                Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
                Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
                Route::get('/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
                Route::put('/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
                Route::delete('/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
            });

            // Kelola Dosen
            Route::prefix('dosen')->group(function () {
                Route::get('/', [DosenController::class, 'index'])->name('dosen.index');       // Menampilkan list + modal
                Route::post('/', [DosenController::class, 'store'])->name('dosen.store');      // Simpan dosen baru (Create)
                Route::put('/{id}', [DosenController::class, 'update'])->name('dosen.update'); // Update dosen
                Route::delete('/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy'); // Hapus dosen
            });


        });

    // Manajemen Mahasiswa
    Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
        Route::get('/baru', [MahasiswaController::class, 'mahasiswaBaru'])->name('baru');
        // Route::get('/status', [MahasiswaController::class, 'statusPendaftaran'])->name('status');
        Route::get('/{id}', [MahasiswaController::class, 'showAjax'])->name('showAjax');
        Route::post('/cari', [MahasiswaController::class, 'cari'])->name('cari');
    });

    // Kirim Informasi
    Route::get('/kirim-informasi', [InformasiController::class, 'create'])->name('kirim_informasi');
    Route::post('/kirim-informasi', [InformasiController::class, 'store'])->name('informasi_store');

    // Laporan & Export Data
    Route::prefix('laporan')->name('laporan.')->group(function () {
        Route::get('/pendaftaran', [LaporanController::class, 'pendaftaran'])->name('pendaftaran');
        Route::get('/export', [LaporanController::class, 'export'])->name('export');
        Route::get('/generate', [LaporanController::class, 'generate'])->name('generate');
        Route::get('/export-pdf', [DashboardController::class, 'exportPdf'])->name('export_pdf');
    });

    // Cek Data TOEIC
    Route::prefix('cekdata')->name('cekdata.')->group(function () {
        Route::get('/', [CekDataController::class, 'index'])->name('index');
        Route::get('/data', [CekDataController::class, 'getData'])->name('getdata');
        Route::get('/admin/cek-dokumen/{id}', [CekDataController::class, 'showDokumen'])->name('cek-dokumen');
        Route::get('/{id_mahasiswa}', [CekDataController::class, 'showDetail'])->name('show');
    });

    // Riwayat Ujian TOEIC
    Route::get('/riwayat-ujian', [RiwayatUjianController::class, 'index'])->name('riwayat');
    Route::get('/riwayat-ujian/ajax', [RiwayatUjianController::class, 'getData'])->name('riwayat.ajax');
    Route::post('/riwayat-ujian/simpan', [RiwayatUjianController::class, 'simpan'])->name('riwayat.simpan');
    });

    // Surat Pernyataan
    Route::get('/surat-pernyataan', function () {
    return redirect()->route('admin.surat_pernyataan.by_tipe', ['tipe' => 'aktif']);
    })->name('admin.surat_pernyataan.index');

    Route::get('/surat-pernyataan/generate/{id}', [\App\Http\Controllers\SuratPernyataanController::class, 'generateSurat'])
        ->name('admin.surat_pernyataan.generate');

    Route::post('/admin/surat_pernyataan/validasi/{id}', [SuratPernyataanController::class, 'validasi'])
        ->name('admin.surat_pernyataan.validasi');
    // Cek Lampiran Surat
    Route::get('/surat-pernyataan/lampiran/{id}', [\App\Http\Controllers\SuratPernyataanController::class, 'lihatLampiran'])
    ->name('admin.surat_pernyataan.lampiran');

    Route::get('/surat-pernyataan/{tipe}', [SuratPernyataanController::class, 'indexByTipe'])
    ->whereIn('tipe', ['aktif', 'alumni'])
    ->name('admin.surat_pernyataan.by_tipe');

    // =======================
    // Admin Routes (Pesan)
    // =======================
    // Tulis pesan informasi
        // Halaman form kirim informasi
    Route::get('/informasi', [InformasiController::class, 'create'])->name('admin.informasi.create');
    // Proses kirim informasi
    Route::post('/informasi', [InformasiController::class, 'store'])->name('admin.informasi.store');
    // Ambil data mahasiswa (AJAX)
    Route::get('/get-mahasiswa', [InformasiController::class, 'getMahasiswa']);
    // Menampilkan daftar informasi (misalnya untuk admin melihat histori)
    Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('informasi.index');


    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('admin.logout');

// =======================
// Bilingual Language Change
//=========================
Route::get('/change-language/{lang}', function ($lang) {
    if (in_array($lang, ['id', 'en'])) {
        session(['locale' => $lang]);
        app()->setLocale($lang);
    }
    return back();
})->name('change.language');

