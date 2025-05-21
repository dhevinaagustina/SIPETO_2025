@extends('layouts-mahasiswa.template')

@section('content')
<div class="container-fluid py-4" style="background-color: #F8FAFC; min-height: 100vh;">
  <!-- Animate.css and Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  {{-- Hero Banner --}}
  <div class="text-center mb-5">
    <div class="py-5 px-4 mx-auto text-white" style="background: linear-gradient(135deg, #29335C 0%, #1E4B8F 100%); border-radius: 12px; max-width: 1140px; box-shadow: 0 8px 24px rgba(41, 51, 92, 0.15);">
      <h1 class="mb-3 fw-bold animate__animated animate__fadeInDown">WELCOME TO SIPETO</h1>
      <p class="mb-0 fs-5 animate__animated animate__fadeIn animate__delay-1s">Your Complete TOEIC Preparation Platform</p>
      <div class="mt-4 animate__animated animate__fadeIn animate__delay-2s">
      </div>
    </div>
  </div>

  {{-- Main Content --}}
  <div class="container">
    {{-- Announcements Section --}}
    <div class="row mb-5">
      <div class="col-12">
        <div class="card shadow-sm border-0 animate__animated animate__fadeIn">
          <div class="card-header bg-white border-0 pt-4">
            <h3 class="fw-bold" style="color: #29335C;">
              <i class="fas fa-bullhorn text-warning me-2"></i>Latest Announcements
            </h3>
          </div>
          <div class="card-body">
            <div class="alert alert-info d-flex align-items-center mb-3" role="alert">
              <i class="fas fa-calendar-check me-3 fs-4"></i>
              <div>
                <h5 class="alert-heading mb-1">May 2025 Test Schedule</h5>
                <p class="mb-0">Registered students for May 2025 TOEIC test should check the schedule...</p>
              </div>
            </div>
            <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
              <i class="fas fa-certificate me-3 fs-4"></i>
              <div>
                <h5 class="alert-heading mb-1">Certificate Collection</h5>
                <p class="mb-0">April 2025 test takers can collect certificates at Building A, 2nd Floor...</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Articles Section --}}
    <div class="row g-4 mb-5">
      <div class="col-12">
        <h3 class="fw-bold mb-4" style="color: #29335C;">
          <i class="fas fa-newspaper text-primary me-2"></i>TOEIC Learning Resources
        </h3>
      </div>

      @php
        $articles = [
          [
            'title' => 'Understanding TOEIC',
            'content' => 'Learn about the TOEIC test format, scoring system, and how it can benefit your academic and professional journey.',
            'image' => 'https://img.freepik.com/free-vector/english-school-banner_33099-1727.jpg',
            'icon' => 'fas fa-question-circle',
            'color' => '#FF6B35'
          ],
          [
            'title' => 'Test-Taking Strategies',
            'content' => 'Discover proven techniques to maximize your score in both Listening and Reading sections.',
            'image' => 'https://img.freepik.com/free-vector/learning-concept-illustration_114360-6186.jpg',
            'icon' => 'fas fa-lightbulb',
            'color' => '#1E90FF'
          ],
          [
            'title' => 'Practice Resources',
            'content' => 'Access our curated collection of practice tests and study materials to boost your preparation.',
            'image' => 'https://img.freepik.com/free-vector/online-test-concept_23-2148524703.jpg',
            'icon' => 'fas fa-book',
            'color' => '#6A4C93'
          ],
        ];
      @endphp

      @foreach($articles as $article)
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm animate__animated animate__fadeInUp" style="border-radius: 12px; transition: transform 0.3s ease;">
          <div class="position-relative">
            <img src="{{ $article['image'] }}" class="card-img-top" style="border-top-left-radius: 12px; border-top-right-radius: 12px; height: 180px; object-fit: cover;" alt="article image">
            <div class="position-absolute top-0 start-0 mt-3 ms-3">
              <div class="p-3 rounded-circle" style="background-color: {{ $article['color'] }}; color: white;">
                <i class="{{ $article['icon'] }} fs-4"></i>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold" style="color: #29335C;">{{ $article['title'] }}</h5>
            <p class="card-text text-muted">{{ $article['content'] }}</p>
          </div>
          <div class="card-footer bg-transparent border-0">
            <a href="#" class="btn btn-sm px-3 py-2 rounded-pill" style="background-color: {{ $article['color'] }}; color: white;">
              Read More <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    {{-- Quick Tips Section --}}
    <div class="row mb-5">
  <div class="col-12">
    <div class="card shadow-sm border-0 animate__animated animate__fadeIn">
      <div class="card-header bg-white border-0 pt-4">
        <h3 class="fw-bold" style="color: #29335C;">
          <i class="fas fa-trophy text-warning me-2"></i>TOEIC Quick Tips
        </h3>
      </div>
      <div class="card-body">
        <div class="row g-4">
          <div class="col-md-4">
            <div class="d-flex">
              <div class="me-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center"
                     style="background-color: #FF6B35; color: white; width: 48px; height: 48px;">
                  <i class="fas fa-headphones fs-5"></i>
                </div>
              </div>
              <div>
                <h5 class="fw-bold" style="color: #29335C;">Listening Section</h5>
                <ul class="text-muted ps-3">
                  <li>Focus on question words</li>
                  <li>Note keywords in dialogues</li>
                  <li>Practice with accents</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="d-flex">
              <div class="me-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center"
                     style="background-color: #1E90FF; color: white; width: 48px; height: 48px;">
                  <i class="fas fa-book-reader fs-5"></i>
                </div>
              </div>
              <div>
                <h5 class="fw-bold" style="color: #29335C;">Reading Section</h5>
                <ul class="text-muted ps-3">
                  <li>Skim passages first</li>
                  <li>Watch for synonyms</li>
                  <li>Manage time wisely</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="d-flex">
              <div class="me-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center"
                     style="background-color: #6A4C93; color: white; width: 48px; height: 48px;">
                  <i class="fas fa-clock fs-5"></i>
                </div>
              </div>
              <div>
                <h5 class="fw-bold" style="color: #29335C;">Test Day</h5>
                <ul class="text-muted ps-3">
                  <li>Arrive early</li>
                  <li>Bring required documents</li>
                  <li>Stay calm and focused</li>
                </ul>
              </div>
            </div>
          </div>
        </div> <!-- row -->
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