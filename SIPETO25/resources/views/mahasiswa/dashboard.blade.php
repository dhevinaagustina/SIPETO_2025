@extends('layouts.template')

@section('content')
<div class="container-fluid py-4" style="background-color: #F2F2F2; min-height: 100vh;">
  <!-- Tambahkan ini di <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


  {{-- Welcome Header --}}
  <div class="text-center mb-4">
    <div class="py-4 px-4 mx-auto text-white" style="background-color: #29335C; border-radius: 10px; max-width: 1140px;">
      <h2 class="mb-2 font-weight-bold">WELCOME TO SIPETO</h2>
      <p class="mb-0">Your English Certification Gateway</p>
    </div>
  </div>

  {{-- Menu Section --}}
  <div class="container py-4">
    <div class="row g-4 justify-content-center">

      @php
        $menus = [
          [
            'title' => 'Daftar Ujian Gratis', 
            'description' => 'Ajukan pendaftaran TOEIC secara gratis langsung melalui SIPETO.',
            'icon' => 'bi-pencil-square', 
            'header_color' => '#DB2B39', 
            'card_color' => '#FFF5F5'
          ],
          [
            'title' => 'Daftar Ujian Mandiri', 
            'description' => 'Ajukan pendaftaran TOEIC secara gratis langsung melalui SIPETO.',
            'icon' => 'bi-journal-check', 
            'header_color' => '#29335C', 
            'card_color' => '#F0F4FF'
          ],
          [
            'title' => 'Riwayat Ujian', 
            'description' => 'Ajukan pendaftaran TOEIC secara gratis langsung melalui SIPETO.',
            'icon' => 'bi-clock-history', 
            'header_color' => '#D89B00', 
            'card_color' => '#FFF8E5'
          ],
          [
            'title' => 'Pengajuan Surat', 
            'description' => 'Ajukan pendaftaran TOEIC secara gratis langsung melalui SIPETO.',
            'icon' => 'bi-file-earmark-text', 
            'header_color' => '#DB2B39', 
            'card_color' => '#FFF5F5'
          ],
          [
            'title' => 'Hasil Ujian', 
            'description' => 'Ajukan pendaftaran TOEIC secara gratis langsung melalui SIPETO.',
            'icon' => 'bi-graph-up-arrow', 
            'header_color' => '#D89B00', 
            'card_color' => '#FFF8E5'
          ],
        ];
      @endphp

      @foreach($menus as $menu)
      <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center mb-4 animate__animated animate__fadeInUp">
        <div class="p-2" style="background-color: white; border-radius: 20px;">
          <div class="card card-hover-scale border-0 shadow-sm position-relative h-100" 
              style="width: 100%; max-width: 280px; border-radius: 16px; background-color: {{ $menu['card_color'] }};">
            
            <!-- Card Header -->
            <div class="d-flex justify-content-center w-100 position-absolute" style="top: -15px;">
              <div class="d-flex align-items-center py-1 px-3" 
                  style="background-color: {{ $menu['header_color'] }}; color: white; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                <i class="bi {{ $menu['icon'] }} me-2"></i>
                <span>{{ $menu['title'] }}</span>
              </div>
            </div>

            <!-- Card Body -->
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center" 
                style="min-height: 120px; padding: 1.5rem;">
              <p class="mb-0 px-2" style="font-size: 0.9rem; color: #555;">{{ $menu['description'] }}</p>
            </div>

          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  <style>
    .card-hover-scale {
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .card-hover-scale:hover,
    .card-hover-scale:active {
      transform: scale(1.05);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
  </style>



{{-- Notification Section --}}
<div class="mx-auto mt-5" style="max-width: 1140px;">
  <div class="card border-0 shadow-sm">
    <div class="card-header d-flex align-items-center" style="background-color: #29335C; color: white;">
      <i class="bi bi-info-circle me-2 fs-5"></i>
      <span>Notifikasi</span>
    </div>
    <ul class="list-group list-group-flush" 
        style="max-height: 200px; overflow-y: auto;">
      <li class="list-group-item">
        <strong>Jadwal Periode Mei 2025</strong><br>
        Mahasiswa yang telah mendaftar ujian TOEIC periode Mei 2025 diharapkan untuk memperhatikan jadwal pelaksanaan...
      </li>
      <li class="list-group-item">
        <strong>Informasi Pengambilan Sertifikat</strong><br>
        Bagi mahasiswa yang telah mengikuti ujian TOEIC periode April 2025 dapat mengambil sertifikat di Gedung A, Lantai 2...
      </li>
      <li class="list-group-item">
        <strong>Pengumuman Libur Nasional</strong><br>
        Perkuliahan dan ujian akan libur pada tanggal 17 Agustus 2025 sehubungan dengan Hari Kemerdekaan Republik Indonesia.
      </li>
      <li class="list-group-item">
        <strong>Perubahan Jadwal Ujian</strong><br>
        Ujian TOEIC untuk periode Juni 2025 akan dijadwalkan ulang ke tanggal 10 Juni 2025.
      </li>
      <li class="list-group-item">
        <strong>Pemberitahuan Sistem</strong><br>
        Sistem pendaftaran online akan mengalami maintenance pada tanggal 1 Mei 2025 pukul 22.00-24.00 WIB.
      </li>
    </ul>
  </div>
</div>


  {{-- Quote Section --}}
  <div class="d-flex justify-content-center my-5">
    <div class="px-3 w-100" style="max-width: 1140px; display: flex; align-items: stretch;">
      <div style="width: 6px; background-color: #29335C; border-radius: 6px 0 0 6px;"></div>
      <div style="flex: 1; background-color: #ffffff; padding: 18px 24px; border-radius: 0 12px 12px 0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);">
        <p style="margin: 0; font-style: italic; font-size: 1rem; color: #000;">
          "One language sets you in a corridor for life. Two languages open every door along the way."
          <span style="font-style: normal;"> - Frank Smith</span>
        </p>
      </div>
    </div>
  </div>

</div>
@endsection
