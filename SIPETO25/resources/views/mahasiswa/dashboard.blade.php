@extends('layouts-mahasiswa.template')

@section('content')
<div class="container-fluid py-4" style="background-color: #F8FAFC; min-height: 100vh;">
  <!-- Animate.css and Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  {{-- Hero Banner --}}
  <div class="text-center mb-5">
    <div class="py-4 px-4 mx-auto text-white" style="background: linear-gradient(135deg, #29335C 0%, #1E4B8F 100%); border-radius: 12px; max-width: 960px; box-shadow: 0 6px 18px rgba(41, 51, 92, 0.12);">
      <h2 class="mb-2 fw-semibold animate__animated animate__fadeInDown" style="font-size: 1.75rem;">
        {{ __('mahasiswa.welcome_heading') }}
      </h2>
      <p class="mb-0 fs-6 animate__animated animate__fadeIn animate__delay-1s">
        {{ __('mahasiswa.welcome_subtext') }}
      </p>
    </div>
  </div>

  {{-- Main Content --}}
  <div class="container">
    {{-- Articles Section --}}
    <div class="row g-4 mb-5">
      <div class="col-12">
        <h3 class="fw-bold mb-4" style="color: #29335C;">
          <i class="fas fa-newspaper text-primary me-3" style="width: 24px; text-align: center;"></i> 
          {{ __('mahasiswa.section_learning_resources') }}
        </h3>
      </div>

      @php
        $articles = [
          [
            'title' => __('mahasiswa.articles.0.title'),
            'content' => __('mahasiswa.articles.0.content'),
            'read_more' => __('mahasiswa.articles.0.read_more'),
            'image' => 'https://img.freepik.com/free-vector/collaboration-concept-illustration_114360-2590.jpg',
            'icon' => 'fas fa-question-circle',
            'color' => '#FF6B35',
            'link' => route('toeic.understanding')
          ],
          [
            'title' => __('mahasiswa.articles.1.title'),
            'content' => __('mahasiswa.articles.1.content'),
            'read_more' => __('mahasiswa.articles.1.read_more'),
            'image' => 'https://img.freepik.com/free-vector/hand-drawn-business-strategy-concept_23-2149171108.jpg',
            'icon' => 'fas fa-lightbulb',
            'color' => '#1E90FF',
            'link' => route('toeic.strategies')
          ],
          [
            'title' => __('mahasiswa.articles.2.title'),
            'content' => __('mahasiswa.articles.2.content'),
            'read_more' => __('mahasiswa.articles.2.read_more'),
            'image' => 'https://img.freepik.com/free-vector/professional-development-teachers-abstract-concept-illustration_335657-3477.jpg',
            'icon' => 'fas fa-book',
            'color' => '#6A4C93',
            'link' => route('toeic.practice')
          ],
        ];
      @endphp

      @foreach($articles as $article)
      <div class="col-md-6 col-lg-4 d-flex">
        <div class="card h-100 border-0 shadow-sm animate__animated animate__fadeInUp w-100" style="border-radius: 12px; transition: transform 0.3s ease;">
          <div class="position-relative" style="height: 180px; overflow: hidden; border-top-left-radius: 12px; border-top-right-radius: 12px;">
            <img src="{{ $article['image'] }}" class="w-100 h-100" style="object-fit: cover;" alt="article image">
            <div class="position-absolute" style="top: 1rem; left: 1rem;">
              <div class="p-3 rounded-circle shadow-sm" style="background-color: {{ $article['color'] }}; color: white; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                <i class="{{ $article['icon'] }} fs-5"></i>
              </div>
            </div>
          </div>
          <div class="card-body pt-4 px-4">
            <h5 class="card-title fw-bold mb-3" style="color: #29335C;">{{ $article['title'] }}</h5>
            <p class="card-text text-muted mb-4">{{ $article['content'] }}</p>
            <a href="{{ $article['link'] }}" class="btn btn-sm px-3 py-2 rounded-pill w-50 text-start d-flex justify-content-between align-items-center" style="background-color: {{ $article['color'] }}; color: white;">
              <span>{{ $article['read_more'] }}</span>
              <i class="fas fa-arrow-right ms-2"></i>
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
          <div class="card-header bg-white border-0 pt-4 pb-3">
            <h3 class="fw-bold mb-0 d-flex align-items-center justify-content-center" style="color: #29335C;">
              <i class="fas fa-trophy text-warning mx-3" style="font-size: 1.5rem;"></i>
              <span class="text-center">{{ __('mahasiswa.quick_tips_title') }}</span>
              <i class="fas fa-trophy text-warning mx-3" style="font-size: 1.5rem;"></i>
            </h3>
          </div>
          <div class="card-body pt-3">
            <div class="row g-4">
              <!-- Listening Section -->
              <div class="col-md-4">
                <div class="h-100 d-flex flex-column px-3">
                  <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3"
                         style="background-color: #FF6B35; color: white; width: 50px; height: 50px;">
                      <i class="fas fa-headphones fs-5"></i>
                    </div>
                    <h5 class="fw-bold mb-0" style="color: #29335C;">
                      {{ __('mahasiswa.sections.listening.title') }}
                    </h5>
                  </div>
                  <ul class="text-muted ps-4 mb-0">
                    @foreach(__('mahasiswa.sections.listening.tips') as $tip)
                      <li class="mb-2">{{ $tip }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>

              <!-- Reading Section -->
              <div class="col-md-4">
                <div class="h-100 d-flex flex-column px-3">
                  <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3"
                        style="background-color: #1E90FF; color: white; width: 50px; height: 50px;">
                      <i class="fas fa-book-reader fs-5"></i>
                    </div>
                    <h5 class="fw-bold mb-0" style="color: #29335C;">
                      {{ __('mahasiswa.sections.reading.title') }}
                    </h5>
                  </div>
                  <ul class="text-muted ps-4 mb-0">
                    @foreach(__('mahasiswa.sections.reading.tips') as $tip)
                      <li class="mb-2">{{ $tip }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>

              <!-- Test Day -->
              <div class="col-md-4">
                <div class="h-100 d-flex flex-column px-3">
                  <div class="d-flex align-items-center mb-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm me-3"
                        style="background-color: #6A4C93; color: white; width: 50px; height: 50px;">
                      <i class="fas fa-clock fs-5"></i>
                    </div>
                    <h5 class="fw-bold mb-0" style="color: #29335C;">
                      {{ __('mahasiswa.sections.test_day.title') }}
                    </h5>
                  </div>
                  <ul class="text-muted ps-4 mb-0">
                    @foreach(__('mahasiswa.sections.test_day.tips') as $tip)
                      <li class="mb-2">{{ $tip }}</li>
                    @endforeach
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
            <h3 class="fw-bold mb-3">{{ __('mahasiswa.quote_text') }}</h3>
            <p class="mb-0 fst-italic">- {{ __('mahasiswa.quote_author') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection