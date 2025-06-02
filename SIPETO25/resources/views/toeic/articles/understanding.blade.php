<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Mengupas TOEIC - SIPETO</title>
  <meta name="description" content="Panduan lengkap tentang ujian TOEIC">
  <meta name="keywords" content="TOEIC, Ujian Bahasa Inggris, SIPETO, Persiapan TOEIC">

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
    
    .article-card {
      background: white;
      transition: transform 0.3s ease;
      margin: 30px auto;
      max-width: 1200px;
    }

    .article-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .article-header {
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

    .icon-wrapper {
      width: 60px;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
    }

    .benefit-card {
      transition: all 0.3s ease;
      border-radius: 0.5rem;
      border: none;
    }

    .benefit-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    .benefit-icon {
      transition: transform 0.3s ease;
    }

    .benefit-card:hover .benefit-icon {
      transform: scale(1.2);
    }

    .callout-box {
      background-color: rgba(106, 76, 147, 0.1);
      border-left: 4px solid #6A4C93;
      border-radius: 0.5rem;
    }

    .toc-nav {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      background-color: #f8f9fa;
      position: sticky;
      top: 0;
      z-index: 1020;
    }

    .toc-nav .nav-link {
      color: #6A4C93;
      font-weight: 500;
      position: relative;
      padding: 0.5rem 1rem;
      text-align: center;
    }

    .toc-nav .nav-link:hover {
      color: #29335C;
    }

    .toc-nav .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: #6A4C93;
      transition: all 0.3s ease;
    }

    .toc-nav .nav-link:hover::after {
      width: 100%;
      left: 0;
    }

    .total-score-box {
      transition: all 0.3s ease;
    }

    .total-score-box:hover {
      transform: scale(1.03);
    }

    .example-box {
      border-left: 3px solid #6A4C93;
      background-color: #f8f9fa;
      border-radius: 0.25rem;
    }

    .global-map {
      position: relative;
      border-radius: 0.5rem;
      overflow: hidden;
    }

    .map-marker {
      position: absolute;
      font-size: 1.5rem;
      animation: pulse 2s infinite;
      color: #dc3545;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.2); }
      100% { transform: scale(1); }
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
          <li><a href="toeic-guide.html" class="text-white active">Panduan TOEIC</a></li>
          <li><a href="schedule.html" class="text-white">Jadwal Tes</a></li>
          <li><a href="results.html" class="text-white">Hasil Tes</a></li>
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
          <article class="article-card shadow-lg rounded-3 overflow-hidden">
            <!-- Hero Section -->
            <header class="article-header text-center py-5 text-white position-relative" style="background: linear-gradient(rgba(41, 51, 92, 0.9), rgba(106, 76, 147, 0.9)), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;">
              <div class="container position-relative z-index-1">
                <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">Mengupas TOEIC</h1>
                <p class="lead mb-4 animate__animated animate__fadeIn animate__delay-1s">Gerbang penuh warna dan inspirasi global</p>
                <div class="animate__animated animate__zoomIn animate__delay-2s">
                  <span class="badge bg-white text-primary fs-6 me-2">Skor Maks 990</span>
                  <span class="badge bg-white text-primary fs-6 me-2">200 Pertanyaan</span>
                  <span class="badge bg-white text-primary fs-6">2 Jam Durasi</span>
                </div>
              </div>
              <div class="hero-shape">
                <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="shape-fill">
                  <path d="M1200 0L0 0 892.25 114.72 1200 0z"></path>
                </svg>
              </div>
            </header>

            <!-- Table of Contents -->
            <nav class="toc-nav bg-light py-3 sticky-top">
              <div class="container">
                <ul class="nav justify-content-center">
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center" href="#pengertian"><i class="bi bi-info-circle fs-4 mb-1"></i> Pengertian</a></li>
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center" href="#format"><i class="bi bi-list-check fs-4 mb-1"></i> Format Test</a></li>
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center" href="#skor"><i class="bi bi-graph-up fs-4 mb-1"></i> Sistem Skor</a></li>
                  <li class="nav-item"><a class="nav-link d-flex flex-column align-items-center" href="#manfaat"><i class="bi bi-award fs-4 mb-1"></i> Manfaat</a></li>
                </ul>
              </div>
            </nav>

            <!-- Main Content -->
            <div class="article-body p-4 p-md-5 bg-white">
              <!-- Pengertian Section -->
              <section id="pengertian" class="mb-5 animate__animated animate__fadeIn">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-primary rounded-circle p-3 me-3">
                    <i class="bi bi-info-circle-fill text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Pengertian TOEIC</h2>
                </div>
                
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <p class="lead">TOEIC (Test of English for International Communication) adalah tes standar internasional untuk mengukur kemampuan bahasa Inggris dalam konteks profesional.</p>
                    <p>Dikembangkan oleh ETS (Educational Testing Service), TOEIC digunakan oleh lebih dari 14.000 organisasi di 160 negara sebagai alat penilaian kemampuan bahasa Inggris.</p>
                    
                    <div class="callout-box p-4 rounded-3 mt-4">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <i class="bi bi-lightbulb-fill text-warning fs-3"></i>
                        </div>
                        <div>
                          <strong>Tahukah Anda?</strong> Rata-rata skor TOEIC meningkat 150 poin dengan persiapan yang tepat menggunakan materi resmi.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="global-map p-4">
                      <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=2312&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Global Communication" class="img-fluid rounded-3 shadow-sm">
                      <div class="map-marker" style="top: 30%; left: 75%;" data-bs-toggle="tooltip" title="14,000+ Perusahaan">
                        <i class="bi bi-geo-alt-fill"></i>
                      </div>
                      <div class="map-marker" style="top: 60%; left: 15%;" data-bs-toggle="tooltip" title="160 Negara">
                        <i class="bi bi-geo-alt-fill"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Format Test Section -->
              <section id="format" class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-success rounded-circle p-3 me-3">
                    <i class="bi bi-list-check text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Format Test TOEIC</h2>
                </div>

                <div class="row g-4">
                  <!-- Listening Card -->
                  <div class="col-md-6">
                    <div class="card h-100 border-primary shadow-sm animate__animated animate__fadeInLeft">
                      <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="bi bi-headphones me-2 fs-4"></i>
                        <h3 class="mb-0 fs-5">Listening Comprehension</h3>
                        <span class="badge bg-white text-primary ms-auto">45 menit</span>
                      </div>
                      <div class="card-body">
                        <div class="accordion accordion-flush" id="listeningAccordion">
                          <div class="accordion-item">
                            <h3 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#part1">
                                Part 1: Gambar (6 pertanyaan)
                              </button>
                            </h3>
                            <div id="part1" class="accordion-collapse collapse" data-bs-parent="#listeningAccordion">
                              <div class="accordion-body">
                                <p>Anda akan melihat gambar dan mendengar empat pernyataan. Pilih pernyataan yang paling menggambarkan gambar tersebut.</p>
                                <div class="example-box p-3 bg-light rounded-2">
                                  <p class="mb-2"><strong>Contoh:</strong></p>
                                  <p class="mb-1 fst-italic">"Pria itu sedang membaca koran di meja."</p>
                                  <p class="mb-1 fst-italic">"Ada tiga cangkir di rak."</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Additional parts would follow same pattern -->
                        </div>
                      </div>
                      <div class="card-footer bg-light">
                        <small class="text-muted">100 pertanyaan • Skor 5-495</small>
                      </div>
                    </div>
                  </div>

                  <!-- Reading Card -->
                  <div class="col-md-6">
                    <div class="card h-100 border-success shadow-sm animate__animated animate__fadeInRight">
                      <div class="card-header bg-success text-white d-flex align-items-center">
                        <i class="bi bi-book me-2 fs-4"></i>
                        <h3 class="mb-0 fs-5">Reading Comprehension</h3>
                        <span class="badge bg-white text-success ms-auto">75 menit</span>
                      </div>
                      <div class="card-body">
                        <div class="accordion accordion-flush" id="readingAccordion">
                          <div class="accordion-item">
                            <h3 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#part5">
                                Part 2: Kalimat Tidak Lengkap (30 pertanyaan)
                              </button>
                            </h3>
                            <div id="part5" class="accordion-collapse collapse" data-bs-parent="#readingAccordion">
                              <div class="accordion-body">
                                <p>Pilih kata atau frasa terbaik untuk melengkapi setiap kalimat.</p>
                                <div class="example-box p-3 bg-light rounded-2">
                                  <p class="mb-2"><strong>Contoh:</strong></p>
                                  <p>"Konferensi _____ tepat pukul 9:00 besok pagi."</p>
                                  <p class="mb-1">a) dimulai &nbsp; b) mulai &nbsp; c) akan mulai &nbsp; d) mulai</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Additional parts would follow same pattern -->
                        </div>
                      </div>
                      <div class="card-footer bg-light">
                        <small class="text-muted">100 pertanyaan • Skor 5-495</small>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Skor Section -->
              <section id="skor" class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-warning rounded-circle p-3 me-3">
                    <i class="bi bi-graph-up text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Sistem Penilaian TOEIC</h2>
                </div>

                <div class="row">
                  <div class="col-lg-8">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                          <tr>
                            <th class="text-nowrap">Rentang Skor</th>
                            <th>Tingkat Kemampuan</th>
                            <th>Kemampuan di Dunia Kerja</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="animate__animated animate__fadeIn" data-bs-toggle="tooltip" title="Dapat menangani negosiasi dan presentasi kompleks">
                            <td class="fw-bold">905-990</td>
                            <td>Profesional Internasional</td>
                            <td>Berfungsi efektif dalam konteks profesional apapun</td>
                          </tr>
                          <tr class="animate__animated animate__fadeIn" data-bs-delay="100" data-bs-toggle="tooltip" title="Dapat berpartisipasi dalam rapat dan menulis laporan">
                            <td class="fw-bold">785-900</td>
                            <td>Kemampuan Kerja Plus</td>
                            <td>Menangani sebagian besar komunikasi bisnis dengan baik</td>
                          </tr>
                          <!-- Additional rows would follow same pattern -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card bg-light h-100 border-0 shadow-sm">
                      <div class="card-body">
                        <h4 class="d-flex align-items-center mb-3">
                          <i class="bi bi-calculator-fill text-primary me-2"></i>
                          Kalkulator Skor
                        </h4>
                        <div class="mb-3">
                          <label for="listeningScore" class="form-label">Skor Listening</label>
                          <input type="range" class="form-range" min="5" max="495" step="5" id="listeningScore">
                          <div class="d-flex justify-content-between">
                            <small>5</small>
                            <small>495</small>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="readingScore" class="form-label">Skor Reading</label>
                          <input type="range" class="form-range" min="5" max="495" step="5" id="readingScore">
                          <div class="d-flex justify-content-between">
                            <small>5</small>
                            <small>495</small>
                          </div>
                        </div>
                        <div class="total-score-box p-3 bg-primary text-white rounded-3 text-center">
                          <h5 class="mb-0">Total Skor: <span id="totalScore">10</span>/990</h5>
                        </div>
                        <div class="mt-3">
                          <select class="form-select" id="scoreRequirement">
                            <option selected>Pilih Persyaratan Skor</option>
                            <option value="600">Perusahaan Lokal (600)</option>
                            <option value="750">Perusahaan Multinasional (750)</option>
                            <option value="850">Manajer/Executive (850)</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Manfaat Section -->
              <section id="manfaat" class="mb-5 pt-4">
                <div class="d-flex align-items-center mb-4">
                  <div class="icon-wrapper bg-danger rounded-circle p-3 me-3">
                    <i class="bi bi-award text-white fs-3"></i>
                  </div>
                  <h2 class="mb-0">Manfaat Mengambil TOEIC</h2>
                </div>

                <div class="row g-4">
                  <div class="col-md-4 animate__animated animate__fadeInUp">
                    <div class="card h-100 border-0 shadow-sm benefit-card">
                      <div class="card-body text-center p-4">
                        <div class="benefit-icon mb-3">
                          <i class="bi bi-briefcase-fill fs-1 text-primary"></i>
                        </div>
                        <h4>Kemajuan Karir</h4>
                        <p class="mb-0">73% peserta melaporkan peluang kerja lebih baik dalam 6 bulan setelah mencapai 800+</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card h-100 border-0 shadow-sm benefit-card">
                      <div class="card-body text-center p-4">
                        <div class="benefit-icon mb-3">
                          <i class="bi bi-mortarboard-fill fs-1 text-success"></i>
                        </div>
                        <h4>Persyaratan Akademik</h4>
                        <p class="mb-0">Diakui oleh 500+ universitas di seluruh dunia untuk persyaratan penerimaan dan kelulusan</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="card h-100 border-0 shadow-sm benefit-card">
                      <div class="card-body text-center p-4">
                        <div class="benefit-icon mb-3">
                          <i class="bi bi-globe fs-1 text-warning"></i>
                        </div>
                        <h4>Pengakuan Global</h4>
                        <p class="mb-0">Diakui oleh perusahaan, lembaga pemerintah, dan institusi di 160 negara</p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Testimoni Section -->
              <section class="testimonial-section mb-5 py-5 bg-light rounded-3">
                <div class="container">
                  <h3 class="text-center mb-5">Apa Kata Mereka?</h3>
                  <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                      <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                          <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle mb-3" width="80" alt="Testimoni">
                          <div class="rating mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                          </div>
                          <p class="mb-3">"Skor TOEIC 850 membantu saya mendapatkan promosi di perusahaan multinasional."</p>
                          <h5 class="mb-0">Dewi Lestari</h5>
                          <small class="text-muted">Marketing Manager</small>
                        </div>
                      </div>
                    </div>
                    <!-- Additional testimonials would follow same pattern -->
                  </div>
                </div>
              </section>

              <!-- CTA Section -->
              <section class="cta-section text-center py-5 mt-5 rounded-3 animate__animated animate__zoomIn">
                <h3 class="text-white mb-4">Siap Memulai Perjalanan TOEIC Anda?</h3>
                <div class="d-flex justify-content-center gap-3">
                  <a href="#" class="btn btn-light btn-lg px-4 fw-bold">Ambil Tes Latihan</a>
                  <a href="#" class="btn btn-outline-light btn-lg px-4">Rencana Belajar</a>
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
            <li class="mb-2"><a href="schedule.html" class="text-white text-decoration-none">Jadwal Tes</a></li>
            <li class="mb-2"><a href="results.html" class="text-white text-decoration-none">Hasil Tes</a></li>
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

    // Score calculator functionality
    const listeningScore = document.getElementById('listeningScore');
    const readingScore = document.getElementById('readingScore');
    const totalScore = document.getElementById('totalScore');
    const scoreRequirement = document.getElementById('scoreRequirement');

    function updateTotalScore() {
      const total = parseInt(listeningScore.value) + parseInt(readingScore.value);
      totalScore.textContent = total;
      
      if (scoreRequirement.value && total >= parseInt(scoreRequirement.value)) {
        totalScore.parentElement.classList.add('bg-success');
        totalScore.parentElement.classList.remove('bg-primary');
      } else {
        totalScore.parentElement.classList.add('bg-primary');
        totalScore.parentElement.classList.remove('bg-success');
      }
    }

    listeningScore.addEventListener('input', updateTotalScore);
    readingScore.addEventListener('input', updateTotalScore);
    scoreRequirement.addEventListener('change', updateTotalScore);

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