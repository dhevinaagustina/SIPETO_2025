<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Strategi TOEIC - SIPETO</title>
  <meta name="description" content="Strategi jitu menghadapi ujian TOEIC">
  <meta name="keywords" content="TOEIC, strategi TOEIC, tips TOEIC, SIPETO">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    :root {
      --primary: #2e7d32;
      --secondary: #388e3c;
      --accent: #66bb6a;
      --light: #f8f9fa;
      --dark: #212529;
    }
    
    body {
      font-family: 'Montserrat', sans-serif;
      color: #333;
      background-color: #f8f9fa;
    }
    
    .strategy-guide {
      background: white;
      transition: transform 0.3s ease;
      margin: 30px auto;
      max-width: 1200px;
      box-shadow: 0 5px 30px rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    .guide-header {
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, #2e7d32 0%, #388e3c 100%);
      padding: 4rem 0;
      text-align: center;
      color: white;
    }

    .guide-header::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('https://img.freepik.com/free-vector/abstract-wave-line-background_52683-73442.jpg') center/cover;
      opacity: 0.1;
    }

    .wave-divider {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 60px;
      overflow: hidden;
    }

    .wave-divider svg {
      width: 100%;
      height: 100%;
    }

    .section-title {
      font-size: 1.8rem;
      color: #2e7d32;
      padding-bottom: 0.5rem;
      border-bottom: 3px solid #e0e0e0;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
    }

    .section-icon {
      background-color: #2e7d32;
      color: white;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
    }

    .strategy-nav {
      background-color: #f8f9fa;
      position: sticky;
      top: 0;
      z-index: 1020;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .strategy-nav .nav-link {
      color: #2e7d32;
      font-weight: 500;
      border-radius: 20px;
      padding: 0.5rem 1.25rem;
      margin: 0 0.25rem;
      transition: all 0.3s ease;
    }

    .strategy-nav .nav-link.active {
      background-color: #2e7d32;
      color: white;
    }

    .strategy-card {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
      margin-bottom: 20px;
      border: none;
    }

    .strategy-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .card-header {
      background-color: #2e7d32;
      color: white;
      font-weight: 600;
      padding: 1rem;
      display: flex;
      align-items: center;
    }

    .card-header i {
      margin-right: 10px;
      font-size: 1.2rem;
    }

    .strategy-list {
      list-style-type: none;
      padding-left: 0;
    }

    .strategy-list li {
      padding: 0.75rem;
      margin-bottom: 0.5rem;
      border-radius: 5px;
      transition: all 0.3s ease;
      display: flex;
      align-items: flex-start;
    }

    .strategy-list li:hover {
      background-color: rgba(46, 125, 50, 0.1);
    }

    .strategy-list .badge {
      background-color: #2e7d32;
      color: white;
      margin-right: 10px;
      min-width: 25px;
      height: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
    }

    .demo-box {
      border-left: 3px solid #2e7d32;
      background-color: #f8f9fa;
      border-radius: 5px;
      padding: 1rem;
      margin-top: 1rem;
    }

    .time-grid {
      display: grid;
      grid-template-columns: 1fr 100px 1fr;
      gap: 1rem;
      margin-top: 2rem;
    }

    .time-card {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    .time-header {
      background-color: #2e7d32;
      color: white;
      padding: 0.75rem 1rem;
      font-weight: 500;
      display: flex;
      align-items: center;
    }

    .time-header i {
      margin-right: 10px;
    }

    .time-body {
      padding: 1rem;
      background-color: white;
    }

    .time-segment {
      margin-bottom: 1rem;
    }

    .time-part {
      font-weight: 500;
      color: #2e7d32;
    }

    .time-duration {
      font-size: 0.85rem;
      color: #666;
    }

    .progress {
      height: 8px;
      border-radius: 4px;
      margin-top: 5px;
    }

    .progress-bar {
      border-radius: 4px;
    }

    .break-time .time-header {
      background-color: #ffc107;
      color: #212529;
    }

    .reading-time .time-header {
      background-color: #1976d2;
    }

    .reading-time .progress-bar {
      background-color: #1976d2;
    }

    .mistake-item {
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 15px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .mistake-header {
      background-color: #f8f9fa;
      padding: 1rem;
      font-weight: 500;
      cursor: pointer;
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
    }

    .mistake-header:hover {
      background-color: #e9ecef;
    }

    .mistake-header i {
      color: #d32f2f;
      margin-right: 10px;
      font-size: 1.2rem;
    }

    .mistake-content {
      padding: 1rem;
      background-color: white;
      border-top: 1px solid #eee;
    }

    .strategy-summary {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 2rem;
      margin: 2rem 0;
      border-left: 4px solid #2e7d32;
    }

    .strategy-cta {
      background-color: #2e7d32;
      color: white;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      margin: 1rem 0;
    }

    .strategy-cta:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
      color: white;
      background-color: #388e3c;
    }

    .custom-card-header {
      background-color: #2e7d32;
    }

    @media (max-width: 768px) {
      .time-grid {
        grid-template-columns: 1fr;
      }
      
      .section-title {
        font-size: 1.5rem;
      }
      
      .strategy-nav .nav {
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: flex-start;
        padding-bottom: 10px;
      }

      
    }
  </style>
</head>

<body>
  <!-- Header -->
<header id="header" class="header fixed-top" style="background-color: #1f2b6c;">
  <div class="container d-flex justify-content-between align-items-center py-2">
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <button class="btn btn-sm btn-outline-light me-3" onclick="window.location.href='/dashboard/beranda'">
        <i class="bi bi-arrow-left"></i> Kembali
      </button>
      <a href="/" class="logo d-flex align-items-center text-decoration-none">
        <img src="{{ asset('assets/img/logo poltek.png') }}" alt="Polinema" height="40">
        <img src="{{ asset('assets/img/logo.png') }}" alt="SIPETO" height="40" class="ms-2">
        <div class="ms-2 text-white">
          <h1 class="mb-0" style="font-size: 1.2rem; line-height: 1.2;">SIPETO</h1>
          <p class="mb-0" style="font-size: 0.7rem;">Sistem Pendidikan TOEIC</p>
        </div>
      </a>
    </div>

    <!-- Navigation -->
    {{-- <nav class="navmenu">
      <ul class="d-flex mb-0 list-unstyled align-items-center">
        <li class="me-3"><a href="index.html" class="text-white text-decoration-none">Beranda</a></li>
        <li class="me-3"><a href="toeic-guide.html" class="text-white text-decoration-none active">Panduan TOEIC</a></li>
        <li class="me-3"><a href="schedule.html" class="text-white text-decoration-none">Jadwal Tes</a></li>
        <li class="me-3"><a href="results.html" class="text-white text-decoration-none">Hasil Tes</a></li>
        <li>
          <a href="login.html" class="btn btn-warning btn-sm px-3">
            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
          </a> 
        </li>
      </ul>
    </nav> --}}
  </div>
</header>

  <!-- Main Content -->
  <main style="padding-top: 70px;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12">
          <article class="strategy-guide">
            <!-- Hero Banner -->
            <header class="guide-header">
              <div class="container position-relative z-index-1">
                <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Strategi Jitu Menghadapi TOEIC</h1>
                <p class="lead mb-4 animate__animated animate__fadeIn animate__delay-1s">Kunci suksesmu di setiap bagian</p>
                <div class="animate__animated animate__zoomIn animate__delay-2s">
                  <span class="badge bg-white text-success fs-6 me-2"><i class="bi bi-check-circle-fill me-1"></i>Listening</span>
                  <span class="badge bg-white text-success fs-6 me-2"><i class="bi bi-check-circle-fill me-1"></i>Reading</span>
                  <span class="badge bg-white text-success fs-6"><i class="bi bi-check-circle-fill me-1"></i>Manajemen Waktu</span>
                </div>
              </div>
              <div class="wave-divider">
                <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
                  <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#fff"></path>
                  <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#fff"></path>
                  <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#fff"></path>
                </svg>
              </div>
            </header>

            <!-- Strategy Navigation -->
            <nav class="strategy-nav">
              <div class="container">
                <ul class="nav nav-pills justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" href="#pendahuluan">
                      <i class="bi bi-info-circle me-1"></i>Pendahuluan
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#listening">
                      <i class="bi bi-headphones me-1"></i>Listening
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#reading">
                      <i class="bi bi-book me-1"></i>Reading
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#mental">
                      <i class="bi bi-heart me-1"></i>Mental
                    </a>
                  </li>
                </ul>
              </div>
            </nav>

            <!-- Main Content -->
            <div class="guide-body p-4 p-md-5 bg-white">
              <!-- Pendahuluan -->
              <section id="pendahuluan" class="mb-5">
                <h2 class="section-title">
                  <span class="section-icon"><i class="bi bi-info-circle"></i></span>
                  <span>Pendahuluan</span>
                </h2>
                
                <div class="impact-card p-4 bg-light rounded-3 border-start border-success border-4 animate__animated animate__fadeIn">
                  <p class="lead mb-0">Peserta yang menggunakan strategi tepat meningkatkan skor mereka <span class="fw-bold text-success">120 poin lebih tinggi</span> dibandingkan yang hanya mengandalkan pengetahuan bahasa Inggris saja.</p>
                </div>
                
                <div class="row mt-4">
                  <div class="col-md-6">
                    <p>TOEIC mungkin terlihat seperti tes pilihan ganda biasa, tetapi sebenarnya membutuhkan strategi khusus untuk meraih skor tinggi. Tes ini tidak hanya mengukur kemampuan bahasa Inggris Anda, tetapi juga seberapa baik Anda bisa menyiasati waktu dan memahami pola soal.</p>
                  </div>
                  <div class="col-md-6">
                    <div class="card border-success strategy-card">
                      <div class="card-header">
                        <i class="bi bi-lightbulb"></i>Fakta Penting
                      </div>
                      <div class="card-body">
                        <p>TOEIC dirancang untuk mengukur kemampuan bahasa Inggris dalam konteks profesional. Pola soal cenderung berulang dari tahun ke tahun, sehingga mengenali pola ini memberi Anda keunggulan besar.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Listening Strategies -->
              <section id="listening" class="mb-5 pt-4">
                <h2 class="section-title">
                  <span class="section-icon"><i class="bi bi-headphones"></i></span>
                  <span>Strategi Listening Section</span>
                </h2>

                <div class="row g-4">
                  <!-- Part 1-2 -->
                  <div class="col-md-6 animate__animated animate__fadeInLeft">
                    <div class="card strategy-card">
                      <div class="card-header">
                        <i class="bi bi-image"></i>Part 1-2: Gambar & Respons
                      </div>
                      <div class="card-body">
                        <ul class="strategy-list">
                          <li>
                            <span class="badge">1</span>
                            <span><strong>Fokus pada audio pertama</strong> - Jangan mencoba menebak jawaban sebelum mendengar semua pilihan</span>
                          </li>
                          <li>
                            <span class="badge">2</span>
                            <span><strong>Latih telinga dengan berbagai aksen</strong> - TOEIC menggunakan berbagai dialek Inggris (Amerika, Inggris, Australia, Kanada)</span>
                          </li>
                          <li>
                            <span class="badge">3</span>
                            <span><strong>Manfaatkan soal gambar</strong> - Part 1 adalah kesempatan "panen poin" karena lebih mudah</span>
                          </li>
                        </ul>
                        <div class="demo-box">
                          <p class="fw-bold">Contoh Latihan:</p>
                          <p>Dengar audio: "Where is the conference room?"</p>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="listeningEx1" id="lOption1">
                            <label class="form-check-label" for="lOption1">a) It's on the second floor</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="listeningEx1" id="lOption2">
                            <label class="form-check-label" for="lOption2">b) Yes, I like conferences</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Part 3-4 -->
                  <div class="col-md-6 animate__animated animate__fadeInRight">
                    <div class="card strategy-card">
                      <div class="card-header">
                        <i class="bi bi-people"></i>Part 3-4: Percakapan & Monolog
                      </div>
                      <div class="card-body">
                        <ul class="strategy-list">
                          <li>
                            <span class="badge">1</span>
                            <span><strong>Catat kata kunci</strong> - Tulis nama, angka, tanggal, dan lokasi yang disebutkan</span>
                          </li>
                          <li>
                            <span class="badge">2</span>
                            <span><strong>Identifikasi konteks</strong> - Pahami situasi (rapat, reservasi, keluhan, dll.)</span>
                          </li>
                          <li>
                            <span class="badge">3</span>
                            <span><strong>Perhatikan pertanyaan</strong> - Urutan soal biasanya mengikuti urutan percakapan</span>
                          </li>
                        </ul>
                        <div class="demo-box">
                          <p class="fw-bold">Teknik Mencatat:</p>
                          <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary me-2">Q</span>
                            <span>Kapan meeting dijadwalkan?</span>
                          </div>
                          <div class="d-flex align-items-center">
                            <span class="badge bg-success me-2">A</span>
                            <span>Wednesday at 2 PM (dari audio)</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Reading Strategies -->
              <section id="reading" class="mb-5 pt-4">
                <h2 class="section-title">
                  <span class="section-icon"><i class="bi bi-book"></i></span>
                  <span>Strategi Reading Section</span>
                </h2>

                <div class="strategy-tabs">
                  <ul class="nav nav-tabs" id="readingTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="part5-tab" data-bs-toggle="tab" data-bs-target="#part5-content" type="button" role="tab">
                        Part 5-6: Grammar
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="part7-tab" data-bs-toggle="tab" data-bs-target="#part7-content" type="button" role="tab">
                        Part 7: Reading
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content p-4 border border-top-0 rounded-bottom" id="readingTabContent">
                    <div class="tab-pane fade show active" id="part5-content" role="tabpanel">
                      <div class="row">
                        <div class="col-md-6">
                          <h4><i class="bi bi-lightbulb text-warning me-2"></i>Fokus Grammar</h4>
                          <ul class="strategy-list">
                            <li>
                              <i class="bi bi-check-circle-fill text-success me-2"></i>
                              <span>Perbedaan tense (present perfect vs past simple)</span>
                            </li>
                            <li>
                              <i class="bi bi-check-circle-fill text-success me-2"></i>
                              <span>Preposisi (in, at, on, by, for)</span>
                            </li>
                            <li>
                              <i class="bi bi-check-circle-fill text-success me-2"></i>
                              <span>Bentuk kata (noun/verb/adjective)</span>
                            </li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <div class="grammar-drill p-3 bg-light rounded-2">
                            <p class="fw-bold mb-2">Latihan Soal:</p>
                            <p>The manager _____ the report before the meeting yesterday.</p>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="grammarQ1" id="gOption1">
                              <label class="form-check-label" for="gOption1">a) had reviewed</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="grammarQ1" id="gOption2">
                              <label class="form-check-label" for="gOption2">b) has reviewed</label>
                            </div>
                            <button class="btn btn-sm btn-outline-success mt-2 check-answer">Periksa Jawaban</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="part7-content" role="tabpanel">
                      <h4><i class="bi bi-speedometer2 text-primary me-2"></i>Teknik Membaca Cepat</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <ul class="strategy-list">
                            <li>
                              <i class="bi bi-1-circle-fill text-primary me-2"></i>
                              <span>Baca pertanyaan sebelum teks (skimming)</span>
                            </li>
                            <li>
                              <i class="bi bi-2-circle-fill text-primary me-2"></i>
                              <span>Cari kata kunci dari pertanyaan (scanning)</span>
                            </li>
                            <li>
                              <i class="bi bi-3-circle-fill text-primary me-2"></i>
                              <span>Perhatikan sinonim (misal: "purchase" vs "buy")</span>
                            </li>
                          </ul>
                        </div>
                        <div class="col-md-6">
                          <div class="progress mb-3">
                            <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 25%">Skim (10s)</div>
                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 50%">Scan (20s)</div>
                            <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 25%">Jawab (10s)</div>
                          </div>
                          <p class="small text-muted">Waktu yang disarankan per teks (total 40 detik)</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Time Management -->
              <section class="mb-5 pt-4">
                <h2 class="section-title">
                  <span class="section-icon"><i class="bi bi-clock"></i></span>
                  <span>Manajemen Waktu</span>
                </h2>

                <div class="time-grid">
                  <div class="time-card listening-time">
                    <div class="time-header">
                      <i class="bi bi-headphones"></i> Listening
                    </div>
                    <div class="time-body">
                      <div class="time-segment">
                        <span class="time-part">Part 1: Gambar</span>
                        <span class="time-duration">6 soal / 3 menit</span>
                        <div class="progress">
                          <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                      </div>
                      <div class="time-segment">
                        <span class="time-part">Part 2: Q-Response</span>
                        <span class="time-duration">25 soal / 12 menit</span>
                        <div class="progress">
                          <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="time-card break-time">
                    <div class="time-header">
                      <i class="bi bi-cup"></i> Istirahat
                    </div>
                    <div class="time-body text-center py-3">
                      <p class="mb-0">2 menit persiapan</p>
                    </div>
                  </div>
                  <div class="time-card reading-time">
                    <div class="time-header">
                      <i class="bi bi-book"></i> Reading
                    </div>
                    <div class="time-body">
                      <div class="time-segment">
                        <span class="time-part">Part 5: Grammar</span>
                        <span class="time-duration">30 soal / 10 menit</span>
                        <div class="progress">
                          <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                      </div>
                      <div class="time-segment">
                        <span class="time-part">Part 7: Reading</span>
                        <span class="time-duration">54 soal / 45 menit</span>
                        <div class="progress">
                          <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Mental Preparation -->
              <section id="mental" class="mb-5 pt-4">
                <h2 class="section-title">
                  <span class="section-icon"><i class="bi bi-heart"></i></span>
                  <span>Persiapan Mental</span>
                </h2>

                <div class="row g-4">
                  <div class="col-md-4">
                    <div class="card strategy-card h-100">
                      <div class="card-header">
                        <i class="bi bi-calendar-check"></i> Simulasi Tes
                      </div>
                      <div class="card-body">
                        <p>Lakukan latihan dalam kondisi seperti tes sesungguhnya:</p>
                        <ul>
                          <li>Waktu 2 jam penuh</li>
                          <li>Lingkungan tenang</li>
                          <li>Tanpa gangguan</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card strategy-card h-100">
                      <div class="card-header">
                        <i class="bi bi-moon"></i> Istirahat Cukup
                      </div>
                      <div class="card-body">
                        <p>Kualitas tidur mempengaruhi konsentrasi:</p>
                        <ul>
                          <li>Tidur 7-8 jam sebelum tes</li>
                          <li>Hindari begadang belajar</li>
                          <li>Relaksasi sebelum tidur</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card strategy-card h-100">
                      <div class="card-header">
                        <i class="bi bi-brightness-high"></i> Teknik Relaksasi
                      </div>
                      <div class="card-body">
                        <p>Atasi panik dengan:</p>
                        <ul>
                          <li>Pernapasan dalam (4-7-8)</li>
                          <li>Visualisasi positif</li>
                          <li>Fokus pada soal saat ini</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Common Mistakes -->
              <section class="mb-5 pt-4">
                <h2 class="section-title">
                  <span class="section-icon"><i class="bi bi-exclamation-triangle"></i></span>
                  <span>Kesalahan Umum</span>
                </h2>

                <div class="mistakes-accordion">
                  <div class="mistake-item">
                    <div class="mistake-header" data-bs-toggle="collapse" data-bs-target="#mistake1">
                      <i class="bi bi-x-circle-fill"></i>
                      Sering mengubah jawaban
                    </div>
                    <div class="mistake-content collapse" id="mistake1">
                      <p>Penelitian menunjukkan insting pertama benar 72% waktu. Hanya ubah jawaban jika Anda benar-benar yakin.</p>
                      <div class="row text-center">
                        <div class="col">
                          <div class="display-6 text-success">72%</div>
                          <small>Akurasi pilihan pertama</small>
                        </div>
                        <div class="col">
                          <div class="display-6 text-danger">28%</div>
                          <small>Jawaban yang diubah benar</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mistake-item">
                    <div class="mistake-header" data-bs-toggle="collapse" data-bs-target="#mistake2">
                      <i class="bi bi-x-circle-fill"></i>
                      Terlalu lama di satu soal
                    </div>
                    <div class="mistake-content collapse" id="mistake2">
                      <p>Jika ragu, tebak dan tandai untuk ditinjau kembali jika ada waktu tersisa. Jangan biarkan satu soal menghabiskan waktu berharga.</p>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Penutup -->
              <section class="mb-5 pt-4">
                <div class="card strategy-card border-success">
                  <div class="card-header bg-success text-white">
                    <i class="bi bi-check-circle"></i> Penutup
                  </div>
                  <div class="card-body">
                    <p class="lead">Skor tinggi TOEIC bukan hanya milik mereka yang fluent, tapi mereka yang cerdas dalam strategi.</p>
                    <p>Dengan memahami pola soal, mengelola waktu dengan baik, dan mempersiapkan mental, Anda bisa meraih skor maksimal meskipun kemampuan bahasa Inggris Anda belum sempurna.</p>
                    <div class="d-flex align-items-center mt-3">
                      <i class="bi bi-lightbulb text-warning fs-3 me-3"></i>
                      <p class="mb-0"><strong>Ingat:</strong> Latih strategi ini berulang-ulang sampai menjadi kebiasaan sebelum hari tes.</p>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Strategy Summary -->
              <section class="strategy-summary">
                <h3 class="d-flex align-items-center mb-3">
                  <i class="bi bi-card-checklist text-success me-2"></i>
                  Checklist Cepat Strategi TOEIC
                </h3>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="strategy1" checked>
                      <label class="form-check-label" for="strategy1">Preview pertanyaan listening dulu</label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="strategy2" checked>
                      <label class="form-check-label" for="strategy2">Catat kata kunci saat listening</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="strategy3" checked>
                      <label class="form-check-label" for="strategy3">Baca pertanyaan sebelum teks</label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" id="strategy4" checked>
                      <label class="form-check-label" for="strategy4">Kelola waktu ketat</label>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Add this section right before the "Final CTA" section -->
              <section class="mb-5 pt-4">
                <h2 class="section-title">
                  <span class="section-icon"><i class="bi bi-pencil-square"></i></span>
                  <span>Latihan Soal Online</span>
                </h2>
                
                <div class="card strategy-card border-primary">
                  <div class="card-header custom-card-header text-white">
                    <i class="bi bi-link-45deg"></i> Sumber Latihan TOEIC
                  </div>
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-md-8">
                        <h5>TOEIC TestPro by ESTUDYME</h5>
                        <p>Untuk latihan soal TOEIC online dengan simulasi yang mirip tes asli, Anda dapat mengunjungi platform berikut:</p>
                        <div class="d-flex align-items-center mt-3">
                          <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                          <div>
                            <p class="mb-1 fw-bold">Fitur Utama:</p>
                            <ul class="list-unstyled">
                              <li><i class="bi bi-check me-2 text-success"></i> Simulasi tes TOEIC lengkap</li>
                              <li><i class="bi bi-check me-2 text-success"></i> Pembahasan jawaban</li>
                              <li><i class="bi bi-check me-2 text-success"></i> Timer seperti tes sebenarnya</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 text-center">
                        <img src="{{ asset('adminlte/dist/img/download.png') }}"  alt="ESTUDYME Logo" class="img-fluid mb-3" style="max-height: 80px;">
                        <a href="https://estudyme.com/en/toeic-testpro/" target="_blank" class="btn btn-success btn-lg w-100">
                          <i class="bi bi-box-arrow-up-right me-2"></i> Kunjungi Website
                        </a>
                        <small class="text-muted">*Link eksternal</small>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Final CTA -->
              <section class="text-center py-4">
                <a href="#" class="btn strategy-cta">
                  <i class="bi bi-download me-2"></i> Unduh Panduan Strategi Lengkap (PDF)
                </a>
                <p class="text-muted mt-2"><small>Sumber: ETS TOEIC Preparation Guide</small></p>
              </section>
            </div>
          </article>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer bg-dark text-white pt-5 pb-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5 class="mb-3">Tentang SIPETO</h5>
          <p>Sistem Pendaftaran TOEIC Online yang dikembangkan oleh Politeknik Negeri Malang untuk memudahkan proses pendaftaran dan pengelolaan ujian TOEIC.</p>
        </div>
        <div class="col-lg-2 col-md-6 mb-4">
          <h5 class="mb-3">Tautan Cepat</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="index.html" class="text-white text-decoration-none">Beranda</a></li>
            <li class="mb-2"><a href="toeic-guide.html" class="text-white text-decoration-none">Panduan TOEIC</a></li>
            <li class="mb-2"><a href="strategi-toeic.html" class="text-white text-decoration-none">Strategi TOEIC</a></li>
            <li class="mb-2"><a href="schedule.html" class="text-white text-decoration-none">Jadwal Tes</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="mb-3">Kontak Kami</h5>
          <p><i class="bi bi-geo-alt-fill me-2"></i> Jl. Soekarno-Hatta No. 9, Malang</p>
          <p><i class="bi bi-envelope-fill me-2"></i> sipeto@polinema.ac.id</p>
          <p><i class="bi bi-telephone-fill me-2"></i> (0341) 404424</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="mb-3">Ikuti Kami</h5>
          <div class="social-links">
            <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-4"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-twitter-x fs-4"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-4"></i></a>
            <a href="#" class="text-white"><i class="bi bi-youtube fs-4"></i></a>
          </div>
        </div>
      </div>
      <hr class="my-4">
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          <p class="mb-0">&copy; 2025 SIPETO. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <p class="mb-0">Developed by <a href="https://www.polinema.ac.id" class="text-white text-decoration-none">Politeknik Negeri Malang</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize answer checking
    const checkAnswerBtns = document.querySelectorAll('.check-answer');
    checkAnswerBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const container = this.closest('.grammar-drill');
        const selectedOption = container.querySelector('input[type="radio"]:checked');
        
        if (selectedOption && selectedOption.id === 'gOption1') {
          this.innerHTML = '<i class="bi bi-check-circle-fill"></i> Benar!';
          this.classList.remove('btn-outline-success');
          this.classList.add('btn-success');
        } else {
          this.innerHTML = '<i class="bi bi-x-circle-fill"></i> Coba Lagi';
          this.classList.remove('btn-outline-success');
          this.classList.add('btn-danger');
        }
      });
    });

    // Audio button simulation
    const audioBtns = document.querySelectorAll('.audio-btn');
    audioBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        this.innerHTML = '<i class="bi bi-pause-fill"></i> Memutar...';
        setTimeout(() => {
          this.innerHTML = '<i class="bi bi-play-fill"></i> Mainkan Contoh';
        }, 3000);
      });
    });

    // Scroll animations
    const animateOnScroll = function() {
      const elements = document.querySelectorAll('.animate__animated');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementPosition < windowHeight - 100) {
          const animationClass = element.classList.item(1);
          element.classList.add(animationClass);
        }
      });
    };

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll();
  });
  </script>
</body>
</html>