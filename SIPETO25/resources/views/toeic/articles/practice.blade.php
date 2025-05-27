<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Kuasai TOEIC dengan Latihan Tepat - SIPETO</title>
  <meta name="description" content="Sumber belajar terbaik untuk persiapan TOEIC">
  <meta name="keywords" content="TOEIC, Latihan TOEIC, Persiapan TOEIC, SIPETO">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <style>
    :root {
      --primary: #4361ee;
      --secondary: #3f37c9;
      --accent: #4895ef;
      --light: #f8f9fa;
      --dark: #212529;
      --success: #4cc9f0;
      --warning: #f72585;
    }
    
    body {
      font-family: 'Montserrat', sans-serif;
      color: #333;
      background-color: #f8f9fa;
    }
    
    .practice-resources {
      background: white;
      transition: transform 0.3s ease;
      margin: 30px auto;
      max-width: 1200px;
      box-shadow: 0 5px 30px rgba(0,0,0,0.1);
      border-radius: 0.5rem;
      overflow: hidden;
    }

    .resources-header {
      position: relative;
      overflow: hidden;
      background: linear-gradient(135deg, #29335C 0%, #6A4C93 100%);
    }

    .hero-shape {
      height: 100px;
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
    }

    .shape-fill {
      fill: #FFFFFF;
      width: 100%;
      height: 100%;
    }

    .section-title {
      font-size: 1.8rem;
      color: #29335C;
      padding-bottom: 0.5rem;
      border-bottom: 3px solid #f0f0f0;
      margin-bottom: 1.5rem;
    }

    .resources-nav {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      background-color: #f8f9fa;
      position: sticky;
      top: 0;
      z-index: 1020;
    }

    .resources-nav .nav-link {
      color: #6A4C93;
      font-weight: 500;
      position: relative;
      padding: 0.5rem 1.5rem;
      border-radius: 2rem;
      margin: 0 0.5rem;
      transition: all 0.3s ease;
    }

    .resources-nav .nav-link.active {
      background-color: #6A4C93;
      color: white;
    }

    .resources-nav .nav-link:hover:not(.active) {
      color: #29335C;
    }

    .resource-card {
      transition: all 0.3s ease;
      border-radius: 0.5rem;
      border: none;
      overflow: hidden;
    }

    .resource-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .resource-icon {
      transition: transform 0.3s ease;
    }

    .resource-card:hover .resource-icon {
      transform: scale(1.1);
    }

    .callout-box {
      background-color: rgba(106, 76, 147, 0.1);
      border-left: 4px solid #6A4C93;
      border-radius: 0.5rem;
    }

    .rating {
      font-size: 1.2rem;
      color: #ffc107;
    }

    .bg-primary-light {
      background-color: rgba(41, 51, 92, 0.1);
    }

    .bg-success-light {
      background-color: rgba(25, 135, 84, 0.1);
    }

    .testimonial-section {
      background-color: #f8f9fa;
      border-radius: 0.5rem;
    }

    .cta-section {
      background: linear-gradient(135deg, rgba(106, 76, 147, 0.9), rgba(41, 51, 92, 0.9)), url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;
      border-radius: 0.5rem;
      padding: 3rem;
    }

    .accordion-button:not(.collapsed) {
      background-color: rgba(106, 76, 147, 0.1);
      color: #6A4C93;
    }

    .accordion-button:focus {
      box-shadow: 0 0 0 0.25rem rgba(106, 76, 147, 0.25);
    }

    .practice-stats-card {
      border-left: 4px solid #6A4C93;
      background-color: rgba(106, 76, 147, 0.1);
    }

    .resource-features {
      list-style: none;
      padding-left: 0;
    }

    .resource-features li {
      margin-bottom: 0.5rem;
    }

    @media (max-width: 768px) {
      .resources-nav .nav {
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: flex-start;
        padding-bottom: 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header id="header" class="header fixed-top" style="background-color: #1f2b6c;">
    <div class="container d-flex justify-content-between align-items-center py-2">
      <!-- Logo -->
      <a href="/" class="logo d-flex align-items-center">
        <img src="assets/img/logo-poltek.png" alt="Polinema" height="40">
        <img src="assets/img/logo.png" alt="SIPETO" height="40" class="ms-2">
        <div class="ms-2">
          <h1 class="text-white mb-0" style="font-size: 1.2rem;">SIPETO</h1>
          <p class="text-white mb-0" style="font-size: 0.8rem;">Sistem Pendaftaran TOEIC</p>
        </div>
      </a>

      <!-- Navigation -->
      <nav class="navmenu">
        <ul class="d-flex mb-0">
          <li><a href="index.html" class="text-white">Beranda</a></li>
          <li><a href="toeic-guide.html" class="text-white">Panduan TOEIC</a></li>
          <li><a href="practice-resources.html" class="text-white active">Sumber Latihan</a></li>
          <li><a href="schedule.html" class="text-white">Jadwal Tes</a></li>
        </ul>
        <a href="login.html" class="btn btn-warning ms-3">Masuk</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main style="padding-top: 70px;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12">
          <article class="practice-resources shadow-lg rounded-3 overflow-hidden">
            <!-- Hero Section -->
            <header class="article-header text-center py-5 text-white position-relative" style="background: linear-gradient(rgba(41, 51, 92, 0.9), rgba(106, 76, 147, 0.9)), url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;">
              <div class="container position-relative z-index-1">
                <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Kuasai TOEIC dengan Latihan Tepat</h1>
                <p class="lead mb-4 animate__animated animate__fadeIn animate__delay-1s">Sumber belajar terbaik untuk persiapan TOEIC</p>
                <div class="animate__animated animate__zoomIn animate__delay-2s">
                  <span class="badge bg-white text-primary fs-6 me-2"><i class="bi bi-book me-1"></i> Materi Resmi</span>
                  <span class="badge bg-white text-primary fs-6 me-2"><i class="bi bi-globe me-1"></i> Sumber Online</span>
                  <span class="badge bg-white text-primary fs-6"><i class="bi bi-phone me-1"></i> Aplikasi Mobile</span>
                </div>
              </div>
              <div class="hero-shape">
                <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="shape-fill">
                  <path d="M1200 0L0 0 892.25 114.72 1200 0z"></path>
                </svg>
              </div>
            </header>

            <!-- Resource Navigation -->
            <nav class="toc-nav bg-light py-3 sticky-top">
              <div class="container">
                <ul class="nav justify-content-center">
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center active" href="#materi-resmi"><i class="bi bi-award fs-4 mb-1"></i> Materi Resmi</a></li>
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center" href="#buku"><i class="bi bi-book fs-4 mb-1"></i> Buku</a></li>
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center" href="#online"><i class="bi bi-globe fs-4 mb-1"></i> Online</a></li>
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center" href="#aplikasi"><i class="bi bi-phone fs-4 mb-1"></i> Aplikasi</a></li>
                </ul>
              </div>
            </nav>

            <!-- Main Content -->
            <div class="article-body p-4 p-md-5 bg-white">
              <!-- Introduction -->
              <section class="mb-5 text-center animate__animated animate__fadeIn">
                <div class="practice-stats-card p-4 rounded-3">
                  <p class="lead mb-0">Siswa yang menyelesaikan <span class="fw-bold text-primary">3+ tes latihan lengkap</span> mencetak skor <span class="fw-bold text-primary">150 poin lebih tinggi</span> rata-rata dibandingkan yang tidak.</p>
                </div>
              </section>

              <!-- Pendahuluan Section -->
              <section class="mb-5">
                <h2 class="section-title">Persiapan TOEIC dengan Sumber yang Tepat</h2>
                <p class="lead">Persiapan tanpa sumber belajar yang tepat akan membuatmu terjebak dalam kebingungan. Di bawah ini adalah kumpulan sumber latihan berkualitas untuk membantumu menaklukkan TOEIC.</p>
              </section>

              <!-- Materi Resmi Section -->
              <section id="materi-resmi" class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-primary rounded-circle p-3 me-3">
                    <i class="bi bi-award-fill text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Materi Resmi dari ETS</h2>
                </div>

                <div class="row g-4">
                  <div class="col-md-6 animate__animated animate__fadeInUp">
                    <div class="card h-100 border-primary shadow-sm resource-card">
                      <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 fs-5"><i class="bi bi-file-earmark-text-fill me-2"></i> Official TOEIC Tests</h3>
                      </div>
                      <div class="card-body">
                        <p class="text-muted small">Diterbitkan oleh ETS (Pembuat TOEIC)</p>
                        <ul class="resource-features">
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>2 tes lengkap dengan format asli</li>
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Penjelasan jawaban detail</li>
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Audio asli untuk bagian listening</li>
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Kunci jawaban dan skoring</li>
                        </ul>
                      </div>
                      <div class="card-footer bg-transparent">
                        <a href="https://www.ets.org/toeic" target="_blank" class="btn btn-primary w-100">
                          <i class="bi bi-box-arrow-up-right me-1"></i> Kunjungi Situs Resmi
                        </a>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card h-100 border-success shadow-sm resource-card">
                      <div class="card-header bg-success text-white">
                        <h3 class="mb-0 fs-5"><i class="bi bi-headphones me-2"></i> TOEIC Listening & Reading Prep</h3>
                      </div>
                      <div class="card-body">
                        <p class="text-muted small">Aplikasi Resmi dari ETS</p>
                        <ul class="resource-features">
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>1000+ soal latihan</li>
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Simulasi tes lengkap</li>
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Pembahasan setiap soal</li>
                          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Pelacakan perkembangan</li>
                        </ul>
                      </div>
                      <div class="card-footer bg-transparent">
                        <div class="d-flex gap-2">
                          <a href="#" class="btn btn-success flex-grow-1">
                            <i class="bi bi-google-play me-1"></i> Android
                          </a>
                          <a href="#" class="btn btn-dark flex-grow-1">
                            <i class="bi bi-apple me-1"></i> iOS
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Buku Section -->
              <section id="buku" class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-warning rounded-circle p-3 me-3">
                    <i class="bi bi-book-fill text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Buku Rekomendasi</h2>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover align-middle">
                    <thead class="table-primary">
                      <tr>
                        <th>Judul Buku</th>
                        <th class="text-nowrap">Tes Latihan</th>
                        <th>Audio</th>
                        <th>Harga</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="animate__animated animate__fadeIn">
                        <td>
                          <strong>Barron's TOEIC Superpack</strong>
                          <small class="d-block text-muted">Edisi ke-4</small>
                        </td>
                        <td><i class="bi bi-check-circle-fill text-success"></i> 4 tes</td>
                        <td><i class="bi bi-check-circle-fill text-success"></i> MP3 CD</td>
                        <td>Rp 450.000</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-cart-plus"></i>
                          </a>
                        </td>
                      </tr>
                      
                      <tr class="animate__animated animate__fadeIn">
                        <td>
                          <strong>TOEIC Official Test-Preparation Guide</strong>
                          <small class="d-block text-muted">Edisi 2023</small>
                        </td>
                        <td><i class="bi bi-check-circle-fill text-success"></i> 2 tes</td>
                        <td><i class="bi bi-check-circle-fill text-success"></i> Online</td>
                        <td>Rp 350.000</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-cart-plus"></i>
                          </a>
                        </td>
                      </tr>
                      
                      <tr class="animate__animated animate__fadeIn">
                        <td>
                          <strong>TOEIC Trainer</strong>
                          <small class="d-block text-muted">Cambridge University Press</small>
                        </td>
                        <td><i class="bi bi-check-circle-fill text-success"></i> 6 tes</td>
                        <td><i class="bi bi-check-circle-fill text-success"></i> MP3 CD</td>
                        <td>Rp 375.000</td>
                        <td>
                          <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-cart-plus"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </section>

              <!-- Online Section -->
              <section id="online" class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-info rounded-circle p-3 me-3">
                    <i class="bi bi-globe text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Sumber Latihan Online</h2>
                </div>

                <div class="row g-4">
                  <div class="col-md-6 animate__animated animate__fadeInUp">
                    <div class="card h-100 border-0 shadow-sm">
                      <div class="card-header bg-info text-white">
                        <h3 class="mb-0 fs-5"><i class="bi bi-gift-fill me-2"></i> Sumber Gratis</h3>
                      </div>
                      <div class="card-body">
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <i class="bi bi-patch-check-fill text-info fs-3"></i>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h4>Exam English</h4>
                            <p>Latihan gratis untuk semua bagian TOEIC dengan penilaian instan.</p>
                            <a href="https://www.examenglish.com/TOEIC/" target="_blank" class="btn btn-sm btn-outline-info">Kunjungi Situs</a>
                          </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <i class="bi bi-patch-check-fill text-info fs-3"></i>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h4>EnglishClub</h4>
                            <p>Contoh latihan listening dengan berbagai aksen bahasa Inggris.</p>
                            <a href="https://www.englishclub.com/esl-exams/ets-toeic-practice.htm" target="_blank" class="btn btn-sm btn-outline-info">Kunjungi Situs</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card h-100 border-0 shadow-sm">
                      <div class="card-header bg-warning text-dark">
                        <h3 class="mb-0 fs-5"><i class="bi bi-star-fill me-2"></i> Sumber Premium</h3>
                      </div>
                      <div class="card-body">
                        <div class="d-flex mb-3">
                          <div class="flex-shrink-0">
                            <i class="bi bi-gem text-warning fs-3"></i>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h4>TOEIC Official Prep</h4>
                            <p>Kursus online lengkap dengan rencana belajar personalisasi.</p>
                            <span class="badge bg-warning text-dark">$29/bulan</span>
                            <a href="#" class="btn btn-sm btn-outline-warning ms-2">Coba Gratis</a>
                          </div>
                        </div>
                        
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <i class="bi bi-gem text-warning fs-3"></i>
                          </div>
                          <div class="flex-grow-1 ms-3">
                            <h4>Magoosh TOEIC Prep</h4>
                            <p>Video penjelasan dan bank soal dengan pembahasan detail.</p>
                            <span class="badge bg-warning text-dark">Rp 299.000/bulan</span>
                            <a href="#" class="btn btn-sm btn-outline-warning ms-2">Pelajari</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="mt-4">
                  <h4 class="d-flex align-items-center mb-3">
                    <i class="bi bi-youtube text-danger me-2"></i>
                    Channel YouTube Rekomendasi
                  </h4>
                  
                  <div class="row g-3">
                    <div class="col-md-4 animate__animated animate__fadeInUp">
                      <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                          <img src="https://via.placeholder.com/80" class="rounded-circle mb-2" alt="Channel">
                          <h5 class="mb-1">TST Prep TOEIC</h5>
                          <p class="text-muted small">Tips dan strategi menjawab soal</p>
                          <a href="#" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-youtube me-1"></i> Subscribe
                          </a>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
                      <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                          <img src="https://via.placeholder.com/80" class="rounded-circle mb-2" alt="Channel">
                          <h5 class="mb-1">TOEIC Mastery</h5>
                          <p class="text-muted small">Latihan listening dengan transkrip</p>
                          <a href="#" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-youtube me-1"></i> Subscribe
                          </a>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                      <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                          <img src="https://via.placeholder.com/80" class="rounded-circle mb-2" alt="Channel">
                          <h5 class="mb-1">English with Lucy</h5>
                          <p class="text-muted small">Vocabulary untuk TOEIC</p>
                          <a href="#" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-youtube me-1"></i> Subscribe
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Aplikasi Section -->
              <section id="aplikasi" class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-purple rounded-circle p-3 me-3" style="background-color: #6A4C93;">
                    <i class="bi bi-phone text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Aplikasi Mobile</h2>
                </div>

                <div class="row g-4">
                  <div class="col-md-4 animate__animated animate__fadeInUp">
                    <div class="card h-100 border-0 shadow-sm resource-card">
                      <div class="card-body text-center p-4">
                        <img src="https://via.placeholder.com/60" class="rounded-3 mb-3" alt="App Icon">
                        <h4>TOEIC Master</h4>
                        <div class="rating mb-2">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                          <span class="text-muted ms-1">(4.7)</span>
                        </div>
                        <p class="small">Pertanyaan latihan harian dengan penjelasan detail</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="badge bg-light text-dark"><i class="bi bi-phone me-1"></i> iOS/Android</span>
                          <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card h-100 border-0 shadow-sm resource-card">
                      <div class="card-body text-center p-4">
                        <img src="https://via.placeholder.com/60" class="rounded-3 mb-3" alt="App Icon">
                        <h4>Magoosh TOEIC Prep</h4>
                        <div class="rating mb-2">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star"></i>
                          <span class="text-muted ms-1">(4.3)</span>
                        </div>
                        <p class="small">Video penjelasan dan bank soal TOEIC</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="badge bg-light text-dark"><i class="bi bi-phone me-1"></i> iOS/Android</span>
                          <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="card h-100 border-0 shadow-sm resource-card">
                      <div class="card-body text-center p-4">
                        <img src="https://via.placeholder.com/60" class="rounded-3 mb-3" alt="App Icon">
                        <h4>TOEIC Vocabulary</h4>
                        <div class="rating mb-2">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <span class="text-muted ms-1">(4.9)</span>
                        </div>
                        <p class="small">Kosakata penting TOEIC dengan flashcard</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="badge bg-light text-dark"><i class="bi bi-phone me-1"></i> iOS/Android</span>
                          <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Tips Section -->
              <section class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-success rounded-circle p-3 me-3">
                    <i class="bi bi-lightbulb-fill text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Tips Menggunakan Sumber Latihan</h2>
                </div>
                
                <div class="row g-4">
                  <div class="col-md-6 animate__animated animate__fadeInLeft">
                    <div class="card h-100 border-success shadow-sm">
                      <div class="card-header bg-success text-white">
                        <h3 class="mb-0 fs-5"><i class="bi bi-clock-history me-2"></i> Simulasi Waktu Nyata</h3>
                      </div>
                      <div class="card-body">
                        <p>Gunakan timer saat berlatih untuk membiasakan diri dengan tekanan waktu tes sebenarnya. Alokasikan waktu:</p>
                        <ul>
                          <li>45 menit untuk Listening</li>
                          <li>75 menit untuk Reading</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6 animate__animated animate__fadeInRight">
                    <div class="card h-100 border-primary shadow-sm">
                      <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 fs-5"><i class="bi bi-journal-check me-2"></i> Review dan Analisis</h3>
                      </div>
                      <div class="card-body">
                        <p>Jangan hanya mencocokkan jawaban, tetapi:</p>
                        <ul>
                          <li>Catat kesalahan dan pahami penyebabnya</li>
                          <li>Identifikasi pola kesalahan yang sering terjadi</li>
                          <li>Buat jurnal perkembangan untuk melacak peningkatan</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Penutup Section -->
              <section class="mb-5 pt-4">
                <div class="callout-box p-4 rounded-3">
                  <h3 class="d-flex align-items-center mb-3">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                    Sumber yang Tepat = Hasil Maksimal
                  </h3>
                  <p class="lead">Sumber yang tepat + waktu belajar yang konsisten = hasil maksimal. Jangan hanya berlatih, tetapi berlatih dengan bijak.</p>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>
                    <small class="text-muted">📚 Sumber: ETS Official TOEIC Practice Materials</small>
                  </div>
                </div>
              </section>

              <!-- CTA Section -->
              <section class="cta-section text-center py-5 mt-5 rounded-3 animate__animated animate__zoomIn">
                <h3 class="text-white mb-4">Siap Memulai Persiapan TOEIC Anda?</h3>
                <div class="d-flex justify-content-center gap-3">
                  <a href="#" class="btn btn-light btn-lg px-4 fw-bold">Ambil Tes Latihan</a>
                  <a href="#" class="btn btn-outline-light btn-lg px-4">Lihat Jadwal Tes</a>
                </div>
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
            <li class="mb-2"><a href="practice-resources.html" class="text-white text-decoration-none">Sumber Latihan</a></li>
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

  <!-- Animation and Interaction Scripts -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Scroll animations
    const animateOnScroll = function() {
      const elements = document.querySelectorAll('.animate__animated');
      
      elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementPosition < windowHeight - 100) {
          const animationClass = element.classList.item(1); // Get the animation class
          element.classList.add(animationClass);
        }
      });
    };

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Initialize on load
  });
  </script>
</body>
</html>