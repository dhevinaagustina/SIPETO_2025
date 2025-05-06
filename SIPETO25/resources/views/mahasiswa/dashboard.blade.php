@extends('layouts.template')

@section('title', 'Beranda')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-white bg-primary rounded p-3" style="background-color: #29335C;">
            WELCOME TO SIPETO
        </h2>
        <p class="text-secondary">Your English Certification Gateway</p>
    </div>

    {{-- Informasi Mahasiswa --}}
    <div class="alert text-white d-flex align-items-start" style="background-color: #28AE38;">
        <i class="bi bi-info-circle-fill me-2 fs-4"></i>
        <div>
            <strong>Informasi Mahasiswa</strong>
            <p class="mb-0">
                Mahasiswa yang telah mendaftar ujian TOEIC periode Mei 2025 diharapkan untuk memperhatikan jadwal pelaksanaan berikut:
                <br>📅 Hari, Tanggal: Selasa, 20 Mei 2025
                <br>🕘 Waktu: Pukul 09.00 WIB – selesai
                <br>📍 Tempat: Gedung D Lantai 3, Ruang Lab Bahasa
                <br><br>
                Pastikan hadir 30 menit sebelum ujian dimulai untuk proses registrasi ulang. Jangan lupa membawa kartu identitas dan bukti pendaftaran ujian.
            </p>
        </div>
    </div>

    {{-- Menu Utama --}}
    <div class="row g-4 mt-2">
        <div class="col-md-6">
            <a href="{{ route('daftar.ujian') }}" class="text-decoration-none">
                <div class="card shadow p-3 h-100">
                    <img src="{{ asset('images/daftar-ujian.png') }}" alt="Daftar Ujian" class="mx-auto" style="height: 100px;">
                    <h5 class="text-center mt-3">Daftar Ujian</h5>
                    <p class="bg-danger text-white text-center py-2 rounded" style="background-color: #DB2B39;">
                        lorem ipsum lorem ipsum lorem ipsum
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('hasil.ujian') }}" class="text-decoration-none">
                <div class="card shadow p-3 h-100">
                    <img src="{{ asset('images/hasil-ujian.png') }}" alt="Hasil Ujian" class="mx-auto" style="height: 100px;">
                    <h5 class="text-center mt-3">Hasil Ujian</h5>
                    <p class="bg-warning text-dark text-center py-2 rounded" style="background-color: #F3A711;">
                        lorem ipsum lorem ipsum lorem ipsum
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('riwayat.ujian') }}" class="text-decoration-none">
                <div class="card shadow p-3 h-100">
                    <img src="{{ asset('images/riwayat-ujian.png') }}" alt="Riwayat Ujian" class="mx-auto" style="height: 100px;">
                    <h5 class="text-center mt-3">Riwayat Ujian</h5>
                    <p class="bg-warning text-dark text-center py-2 rounded" style="background-color: #F3A711;">
                        lorem ipsum lorem ipsum lorem ipsum
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('pengajuan.surat') }}" class="text-decoration-none">
                <div class="card shadow p-3 h-100">
                    <img src="{{ asset('images/pengajuan-surat.png') }}" alt="Pengajuan Surat" class="mx-auto" style="height: 100px;">
                    <h5 class="text-center mt-3">Pengajuan Surat</h5>
                    <p class="bg-danger text-white text-center py-2 rounded" style="background-color: #DB2B39;">
                        lorem ipsum lorem ipsum lorem ipsum
                    </p>
                </div>
            </a>
        </div>
    </div>

    {{-- Quote --}}
    <div class="text-center mt-5 fst-italic">
        <blockquote>
            "One language sets you in a corridor for life. Two languages open every door along the way." – Frank Smith
        </blockquote>
    </div>
</div>
@endsection
