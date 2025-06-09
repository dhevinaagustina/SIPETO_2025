@extends('layouts-mahasiswa.template')

@section('content')
<div class="container-fluid py-4" style="background-color: #F8FAFC; min-height: 100vh;">
  <!-- Animate.css and Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  {{-- Hero Banner --}}
  <div class="text-center mb-5">
    <div class="py-4 px-4 mx-auto text-white" style="background: linear-gradient(135deg, #29335C 0%, #1E4B8F 100%); border-radius: 12px; max-width: 960px; box-shadow: 0 6px 18px rgba(41, 51, 92, 0.12);">
      <h2 class="mb-2 fw-semibold animate__animated animate__fadeInDown" style="font-size: 1.75rem;">Selamat Datang di SIPETO</h2>
      <p class="mb-0 fs-6 animate__animated animate__fadeIn animate__delay-1s">Platform persiapan TOEIC lengkap Anda</p>
    </div>
  </div>
  

  {{-- Main Content --}}
  <div class="container">
    {{-- Announcements Section --}}
    {{-- <div class="row mb-5">
      <div class="col-12">
        <div class="card shadow-sm border-0 animate__animated animate__fadeIn">
          <div class="card-header bg-white border-0 pt-4">
            <h3 class="fw-bold" style="color: #29335C;">
              <i class="fas fa-bullhorn text-warning me-7"></i> Latest Announcements
            </h3>
          </div>
          <div class="card-body">
            <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
              <div>
                <i class="fas fa-calendar-check me-3 fs-4"></i>
                <h5 class="alert-heading mb-8">May 2025 Test Schedule</h5>
                <p class="mb-0">Registered students for May 2025 TOEIC test should check the schedule...</p>
              </div>
            </div>
            <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
              <div>
                <i class="fas fa-certificate me-3 fs-4"></i>
                <h5 class="alert-heading mb-1">Certificate Collection</h5>
                <p class="mb-0">April 2025 test takers can collect certificates at Building A, 2nd Floor...</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

{{-- Articles Section --}}
<div class="row g-4 mb-5">
  <div class="col-12">
    <h3 class="fw-bold mb-4" style="color: #29335C;">
      <i class="fas fa-newspaper text-primary me-3" style="width: 24px; text-align: center;"></i> Sumber Belajar TOEIC
    </h3>
  </div>

  @php
    $articles = [
      [
        'title' => 'Memahami TOEIC',
        'content' => 'Pelajari tentang format tes TOEIC, sistem penilaian, dan bagaimana hal itu dapat bermanfaat bagi perjalanan akademis dan profesional Anda.',
        'image' => 'https://img.freepik.com/free-vector/collaboration-concept-illustration_114360-2590.jpg?uid=R113173288&ga=GA1.1.1978484221.1748225306&semt=ais_items_boosted&w=740',
        'icon' => 'fas fa-question-circle',
        'color' => '#FF6B35',
        'link' => route('toeic.understanding')
      ],
      [
        'title' => 'Strategi Mengikuti Ujian',
        'content' => 'Temukan teknik yang terbukti untuk memaksimalkan skor Anda di bagian Mendengarkan dan Membaca.',
        'image' => 'https://img.freepik.com/free-vector/hand-drawn-business-strategy-concept_23-2149171108.jpg?uid=R113173288&ga=GA1.1.1978484221.1748225306&semt=ais_items_boosted&w=740',
        'icon' => 'fas fa-lightbulb',
        'color' => '#1E90FF',
        'link' => route('toeic.strategies')
      ],
      [
        'title' => 'Sumber Latihan',
        'content' => 'Akses koleksi tes latihan dan materi belajar pilihan kami untuk meningkatkan persiapan Anda.',
        'image' => 'https://img.freepik.com/free-vector/professional-development-teachers-abstract-concept-illustration-school-authority-initiative-training-teachers-conference-seminar-qualification-programme_335657-3477.jpg?uid=R113173288&ga=GA1.1.1978484221.1748225306&semt=ais_items_boosted&w=740',
        'icon' => 'fas fa-book',
        'color' => '#6A4C93',
        'link' => route('toeic.practice')
      ],
    ];
  @endphp

  @foreach($articles as $article)
  <div class="col-md-6 col-lg-4 d-flex">
    <div class="card h-100 border-0 shadow-sm animate__animated animate__fadeInUp w-100" style="border-radius: 12px; transition: transform 0.3s ease; display: flex; flex-direction: column;">
      <div class="position-relative" style="height: 180px; overflow: hidden; border-top-left-radius: 12px; border-top-right-radius: 12px;">
        <img src="{{ $article['image'] }}" class="w-100 h-100" style="object-fit: cover;" alt="article image">
        <div class="position-absolute" style="top: 1rem; left: 1rem;">
          <div class="p-3 rounded-circle shadow-sm" style="background-color: {{ $article['color'] }}; color: white; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
            <i class="{{ $article['icon'] }} fs-5"></i>
          </div>
        </div>
      </div>
      <div class="card-body pt-4 px-4 d-flex flex-column" style="flex: 1;">
        <div>
          <h5 class="card-title fw-bold mb-3" style="color: #29335C;">{{ $article['title'] }}</h5>
          <p class="card-text text-muted">{{ $article['content'] }}</p>
        </div>
        <div class="mt-auto pt-3">
          <a href="{{ $article['link'] }}" class="btn btn-sm px-3 py-2 rounded-pill w-50 text-start d-flex justify-content-between align-items-center" style="background-color: {{ $article['color'] }}; color: white;">
            <span>Baca Selengkapnya</span>
            <i class="fas fa-arrow-right ms-2"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{-- Quick Tips Section --}}
<div class="row mb-5">
  <div class="col-12">
    <div class="card shadow-sm border-0 animate__animated animate__fadeIn">
      <div class="card-header bg-white border-0 pt-4 pb-3">
        <h3 class="fw-bold mb-0 d-flex align-items-center justify-content-center" style="color: #29335C;">
          <i class="fas fa-trophy text-warning mx-3" style="font-size: 1.5rem;"></i>
          <span class="text-center">Tips Singkat TOEIC</span>
          <i class="fas fa-trophy text-warning mx-3" style="font-size: 1.5rem;"></i>
        </h3>
      </div>
      <div class="card-body pt-3">
        <div class="row g-4">
          <!-- Listening Section -->
          <div class="col-md-4">
            <div class="h-100 d-flex flex-column">
              <div class="d-flex align-items-center mb-3 px-2"> <!-- Added px-2 for side padding -->
                <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3"
                     style="background-color: #FF6B35; color: white; width: 50px; height: 50px; flex-shrink: 0;">
                  <i class="fas fa-headphones fs-5"></i>
                </div>
                <h5 class="fw-bold mb-0" style="color: #29335C; padding-left: 8px;">Bagian Mendengarkan</h5>
              </div>
              <ul class="text-muted ps-4 mb-0">
                <li class="mb-2">Fokus pada kata tanya</li>
                <li class="mb-2">Perhatikan kata kunci dalam dialog</li>
                <li>Berlatihlah dengan aksen</li>
              </ul>
            </div>
          </div>

          <!-- Reading Section -->
          <div class="col-md-4">
            <div class="h-100 d-flex flex-column">
              <div class="d-flex align-items-center mb-3 px-2">
                <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3"
                     style="background-color: #1E90FF; color: white; width: 50px; height: 50px; flex-shrink: 0;">
                  <i class="fas fa-book-reader fs-5"></i>
                </div>
                <h5 class="fw-bold mb-0" style="color: #29335C; padding-left: 8px;">Bagian Membaca</h5>
              </div>
              <ul class="text-muted ps-4 mb-0">
                <li class="mb-2">Baca sekilas bagian-bagiannya terlebih dahulu</li>
                <li class="mb-2">Perhatikan sinonimnya</li>
                <li>Kelola waktu dengan bijak</li>
              </ul>
            </div>
          </div>

          <!-- Test Day -->
          <div class="col-md-4">
            <div class="h-100 d-flex flex-column">
              <div class="d-flex align-items-center mb-3 px-2">
                <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3"
                     style="background-color: #6A4C93; color: white; width: 50px; height: 50px; flex-shrink: 0;">
                  <i class="fas fa-clock fs-5"></i>
                </div>
                <h5 class="fw-bold mb-0" style="color: #29335C; padding-left: 8px;">Hari Ujian</h5>
              </div>
              <ul class="text-muted ps-4 mb-0">
                <li class="mb-2">Tiba lebih awal</li>
                <li class="mb-2">Bawa dokumen yang diperlukan</li>
                <li>Tetap tenang dan fokus</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    {{-- Motivational Quote --}}
    <div class="row mb-4">
      <div class="col-12">
        <div class="p-4 rounded-3 animate__animated animate__fadeIn" style="background: linear-gradient(135deg, #29335C 0%, #1E4B8F 100%);">
          <div class="text-center text-white py-3">
            <i class="fas fa-quote-left fs-1 opacity-25 mb-3"></i>
            <h3 class="fw-bold mb-3">"Success is the sum of small efforts, repeated day in and day out."</h3>
            <p class="mb-0 fst-italic">- Robert Collier</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection