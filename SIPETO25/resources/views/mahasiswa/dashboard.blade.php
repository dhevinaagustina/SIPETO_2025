@extends('layouts.template')

@section('content')
<div class="container-fluid py-4" style="background-color: #F2F2F2; min-height: 100vh;">

  {{-- Welcome Section --}}
  <div class="text-center mb-4">
    <div class="py-4 px-4 mx-auto" style="background-color: #29335C; border-radius: 10px; max-width: 1140px;">
      <h2 class="text-white mb-2 font-weight-bold">WELCOME TO SIPETO</h2>
      <p class="text-white mb-0">Your English Certification Gateway</p>
    </div>
  </div>

  {{-- Informasi Mahasiswa --}}
  <div class="mx-auto mb-5" style="max-width: 1140px;">
    <div class="card border-0 shadow-sm" style="border-radius: 10px;">
      <div class="card-header text-white" style="background-color: #29335C; border-radius: 10px 10px 0 0;">
        <strong>📘 Informasi Mahasiswa</strong>
      </div>
      <div class="card-body" style="border-radius: 0 0 10px 10px; background-color: #fff;">
        <p>Mahasiswa yang telah mendaftar ujian TOEIC periode Mei 2025 diharapkan untuk memperhatikan jadwal pelaksanaan berikut:</p>
        <ul class="mb-2">
          <li>📅 <strong>Hari, Tanggal:</strong> Selasa, 20 Mei 2025</li>
          <li>🕘 <strong>Waktu:</strong> Pukul 09.00 WIB – selesai</li>
          <li>📍 <strong>Tempat:</strong> Gedung D Lantai 3, Ruang Lab Bahasa</li>
        </ul>
        <p class="mb-0">Pastikan hadir 30 menit sebelum ujian dimulai untuk proses registrasi ulang. Jangan lupa membawa kartu identitas dan bukti pendaftaran ujian.</p>
      </div>
    </div>
  </div>

<div class="mx-auto" style="max-width: 1140px;">
  <div class="container py-5">
    <div class="row gx-4 gy-4 justify-content-center">

      <!-- Card 1 -->
      <div class="col-md-6 col-lg-6">
        <div class="card-outer mb-4">
          <div class="card card-custom bg-danger-light">
            <div class="badge-header bg-danger text-white">
              <i class="bi bi-pencil-square me-2"></i>Daftar Ujian
            </div>
            <div class="card-body text-center">
              <p class="mb-0">Mahasiswa dapat mendaftar untuk ujian TOEIC secara online.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6 col-lg-6">
        <div class="card-outer mb-4">
          <div class="card card-custom bg-primary-light">
            <div class="badge-header text-white" style="background-color: #2e3361;">
              <i class="bi bi-graph-up-arrow me-2"></i>Hasil Ujian
            </div>
            <div class="card-body text-center">
              <p class="mb-0">Lihat dan unduh hasil ujian TOEIC Anda di sini.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-6 col-lg-6">
        <div class="card-outer mb-4">
          <div class="card card-custom bg-warning-light">
            <div class="badge-header text-white" style="background-color: #f1a500;">
              <i class="bi bi-clock-history me-2"></i>Riwayat Ujian
            </div>
            <div class="card-body text-center">
              <p class="mb-0">Lacak semua pendaftaran dan hasil ujian TOEIC sebelumnya.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-6 col-lg-6">
        <div class="card-outer mb-4">
          <div class="card card-custom bg-brown-light">
            <div class="badge-header text-white" style="background-color: #8c6404;">
              <i class="bi bi-file-earmark-text me-2"></i>Surat Pernyataan
            </div>
            <div class="card-body text-center">
              <p class="mb-0">Ajukan surat keterangan hasil ujian atau kebutuhan lainnya.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
.card-outer {
  background: #ffffff;
  padding: 14px;
  border-radius: 20px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-outer:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
}

.card-custom {
  position: relative;
  border-radius: 16px;
  border: none;
  padding-top: 36px;
  min-height: 160px;
  transition: all 0.3s ease;
}

.badge-header {
  position: absolute;
  top: -20px;
  left: 50%;
  transform: translateX(-50%);
  padding: 10px 24px;
  border-radius: 16px;
  font-size: 1rem;
  font-weight: 600;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
  z-index: 10;
}

.bg-danger-light {
  background-color: #ffecec;
}

.bg-primary-light {
  background-color: #e6f0ff;
}

.bg-warning-light {
  background-color: #fdf1dc;
}

.bg-brown-light {
  background-color: #f6efe2;
}

@media (max-width: 576px) {
  .badge-header {
    font-size: 0.85rem;
    padding: 8px 16px;
  }

  .card-custom {
    padding-top: 30px;
  }

  .card-body p {
    font-size: 0.9rem;
  }
}
</style>


{{-- Quote Section --}}
<div class="d-flex justify-content-center my-5" style="background-color: #F2F2F2;">
  <div class="px-3 w-100" style="max-width: 1140px; display: flex; align-items: stretch;">
    
    <!-- Blue strip on the outside -->
    <div style="width: 6px; background-color: #29335C; border-radius: 6px 0 0 6px;"></div>

    <!-- Quote Card -->
    <div style="
      flex: 1;
      background-color: #ffffff;
      padding: 18px 24px;
      border-radius: 0 12px 12px 0;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    ">
      <p style="margin: 0; font-style: italic; font-size: 1rem; color: #000;">
        "One language sets you in a corridor for life. Two languages open every door along the way."
        <span style="font-style: normal;"> - Frank Smith</span>
      </p>
    </div>

  </div>
</div>


</div>
@endsection
