<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SIPETO - Sistem Pendaftaran TOEIC</title>
  <meta name="description" content="Sistem Pendaftaran Ujian TOEIC Online">
  <meta name="keywords" content="TOEIC, Ujian Bahasa Inggris, SIPETO, Pendaftaran TOEIC">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }

    .carousel-item {
      height: 70vh;
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .carousel-item::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.5); /* overlay hitam */
      z-index: 1;
    }

    .carousel-content {
      position: relative;
      z-index: 2;
      background: rgba(0, 0, 0, 0.6);
      padding: 30px;
      border-radius: 10px;
    }

    .carousel-content h1,
    .carousel-content p {
      color: white;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
    }

    .btn-warning {
      font-weight: 600;
    }

    header.header {
      background-color: #1f2b6c;
      padding: 10px 0;
    }

    header.header .logo img {
      height: 50px;
      margin-right: 10px;
    }

    header.header h1,
    header.header p {
      margin: 0;
      color: #fff;
    }

    .navmenu {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .navmenu ul {
      list-style: none;
      padding-left: 0;
      margin-bottom: 0;
      display: flex;
      gap: 20px;
    }

    .navmenu ul li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>

<body>

  <!-- Header -->
<header id="header" class="header">
  <style>
    .language-selector {
      font-size: 14px;
      position: relative;
    }

    .language-selector .dropdown-toggle {
      background: none;
      border: none;
      color: #fff;
      padding: 5px 10px;
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .language-selector img {
      margin-right: 6px;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      object-fit: cover;
    }

    .language-selector .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      background: #fff;
      border-radius: 6px;
      padding: 8px 0;
      min-width: 140px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      z-index: 999;
      display: none;
    }

    .language-selector:hover .dropdown-menu {
      display: block;
    }

    .language-selector .dropdown-item {
      padding: 6px 15px;
      color: #333;
      text-decoration: none;
      display: flex;
      align-items: center;
    }

    .language-selector .dropdown-item img {
      margin-right: 8px;
    }

    .language-selector .dropdown-item:hover {
      background-color: #f0f0f0;
    }

    .navmenu ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 20px;
    }

    .navmenu ul li {
      margin: 20px;
    }


    .navmenu a {
      text-decoration: none;
      color: #fff;
      padding: 8px 12px;
    }

    .navmenu .btn {
      margin-left: 10px;
    }

    .logo h1 {
      color: white !important;
  }

    header.header .logo p {
      font-size: 15px;
      line-height: 1.2;
      white-space: nowrap;
  }
  </style>

  <div class="container d-flex justify-content-between align-items-center">
    <!-- Language Selector (kiri logo) -->
    <div class="language-selector me-4">
      <button class="dropdown-toggle" id="languageDropdown">
        <img src="{{ asset('assets/img/flag-en.jpg') }}" alt="EN"> English
      </button>
      <div class="dropdown-menu" aria-labelledby="languageDropdown">
        <a class="dropdown-item" href="?lang=en">
          <img src="{{ asset('assets/img/flag-en.jpg') }}" alt="EN"> English
        </a>
        <a class="dropdown-item" href="?lang=id">
          <img src="{{ asset('assets/img/flag-id.png') }}" alt="ID"> Indonesia
        </a>
      </div>
    </div>

    <!-- Logo -->
    <a href="/" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/logo poltek.png') }}" alt="Polinema">
      <img src="{{ asset('assets/img/logo.png') }}" alt="SIPETO">
      <div>
        <h1>SIPETO</h1>
        <p>Sistem Pendaftaran TOEIC</p>
      </div>
    </a>

    <!-- Nav Menu -->
    <nav class="navmenu">
      <ul>
        <li><a href="#hero">Beranda</a></li>
        <li><a href="#features">Fitur Utama</a></li>
        <li><a href="#schedule">Jadwal Tes</a></li>
        <li><a href="#why">Keunggulan</a></li>
        <li><a href="#footer">Kontak</a></li>
      </ul>
      <a href="/login" class="btn btn-warning">Masuk</a>
      <a href="/register" class="btn btn-outline-light">Daftar</a>
    </nav>
  </div>
</header>

  <!-- Hero Section (Carousel) -->
  <section id="hero" class="hero d-flex align-items-center">
    <div id="heroCarousel" class="carousel slide carousel-fade w-100" data-bs-ride="carousel" data-bs-interval="3000">
      <!-- Indicators -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
      </div>

      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url('{{ asset('assets/img/slide1.png') }}');">
          <div class="container d-flex h-100 align-items-center">
            <div class="carousel-content text-white">
              <h1 class="fw-bold">Selamat Datang di <span class="text-warning">SIPETO!</span></h1>
              <p>Sistem pendaftaran TOEIC berbasis web yang mudah, cepat, dan transparan.</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url('{{ asset('assets/img/slide2.png') }}');">
          <div class="container d-flex h-100 align-items-center">
            <div class="carousel-content text-white">
              <h1 class="fw-bold">Daftar TOEIC Online</h1>
              <p>Tanpa antre dan tanpa formulir manual. Semua digital!</p>
              <a href="#features" class="btn btn-warning">Lihat Fitur</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url('{{ asset('assets/img/slide3.png') }}');">
          <div class="container d-flex h-100 align-items-center">
            <div class="carousel-content text-white">
              <h1 class="fw-bold">Pantau Hasil dan Riwayat</h1>
              <p>Cek nilai dan riwayat ujian TOEIC Anda dengan mudah.</p>
              <a href="#schedule" class="btn btn-warning">Lihat Jadwal</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Sebelumnya</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Berikutnya</span>
      </button>
    </div>
  </section>
  <!-- JS Libraries -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

    <!-- Features Section -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPETO - Sistem Pengelolaan Ujian TOEIC</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        .section {
            padding: 80px 0;
        }
        
        .section-title {
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-weight: 700;
            position: relative;
            display: inline-block;
            color: var(--dark);
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: var(--primary);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Features Section */
        .features .feature-column {
            margin-bottom: 30px;
        }
        
        .feature-title h3 {
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
        }
        
        .feature-box {
            padding: 30px;
            border-radius: 15px;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            background: white;
            border-top: 4px solid;
        }
        
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .feature-box.orange {
            border-color: #ff7e33;
        }
        
        .feature-box.blue {
            border-color: #4361ee;
        }
        
        .feature-box.brown {
            border-color: #b5838d;
        }
        
        .feature-box.red {
            border-color: #f72585;
        }
        
        .feature-icon {
            margin-bottom: 20px;
        }
        
        .feature-icon img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
        /* Why SIPETO Section */
        .why-section {
            background-color: white;
        }
        
        .why-graphic {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .why-graphic img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(67, 97, 238, 0.2), rgba(63, 55, 201, 0.5));
        }
        
        .why-content h2 {
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--dark);
        }
        
        .why-list {
            margin-top: 30px;
        }
        
        .why-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }
        
        .why-icon {
            margin-right: 15px;
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .why-text h3 {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, #2b2d42 0%, #1a1a2e 100%);
            color: white;
            padding: 60px 0 0;
        }
        
        .footer-section {
            margin-bottom: 30px;
        }
        
        .footer h4 {
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer h4::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 2px;
            background: var(--primary);
            bottom: 0;
            left: 0;
        }
        
        .footer-brand img {
            max-width: 150px;
            margin-bottom: 15px;
        }
        
        .institution-name {
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .footer-links a {
            display: block;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 10px;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            color: white;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        .copyright-container {
            background: rgba(0, 0, 0, 0.2);
            padding: 20px 0;
            margin-top: 40px;
        }
        
        .copyright {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .why-graphic {
                margin-bottom: 40px;
            }
        }
        
        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }
            
            .feature-box {
                padding: 20px;
            }
            
            .schedule-item {
                flex-direction: column;
            }
            
            .schedule-date-box {
                min-width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Features Section -->
    <section id="features" class="features section">
        <div class="container">
            <div class="section-title text-center">
                <h2>Kelola Ujian TOEIC Anda dengan Mudah dan Cepat!</h2>
                <p class="lead">SIPETO dirancang untuk membantu mengatur seluruh proses ujian TOEIC secara digital dalam satu platform terintegrasi.</p>
            </div>

            <div class="features-content">
                <div class="row g-4">
                    <!-- Feature 1 - Daftar Ujian -->
                    <div class="col-lg-3 col-md-6 feature-column">
                        <div class="feature-title text-center">
                            <h3>Daftar Ujian</h3>
                        </div>
                        <div class="feature-box orange text-center">
                            <div class="feature-icon mx-auto">
                                <i class="bi bi-pencil-square" style="font-size: 2.5rem; color: #ff7e33;"></i>
                            </div>
                            <p>Pendaftaran ujian TOEIC langsung dari sistem, tanpa formulir manual. Setelah daftar, Anda otomatis diarahkan ke situs resmi ujian.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Daftar Sekarang</a>
                        </div>
                    </div>

                    <!-- Feature 2 - Hasil Ujian -->
                    <div class="col-lg-3 col-md-6 feature-column">
                        <div class="feature-title text-center">
                            <h3>Hasil Ujian</h3>
                        </div>
                        <div class="feature-box blue text-center">
                            <div class="feature-icon mx-auto">
                                <i class="bi bi-graph-up" style="font-size: 2.5rem; color: #4361ee;"></i>
                            </div>
                            <p>Lihat hasil Ujian TOEIC Anda langsung dari akun. Nilai ditampilkan dengan jelas, bisa langsung digunakan untuk keperluan akademik.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Cek Hasil</a>
                        </div>
                    </div>

                    <!-- Feature 3 - Riwayat Ujian -->
                    <div class="col-lg-3 col-md-6 feature-column">
                        <div class="feature-title text-center">
                            <h3>Riwayat Ujian</h3>
                        </div>
                        <div class="feature-box brown text-center">
                            <div class="feature-icon mx-auto">
                                <i class="bi bi-clock-history" style="font-size: 2.5rem; color: #b5838d;"></i>
                            </div>
                            <p>Pantau semua pelaksanaan TOEIC yang telah Anda ikuti dalam satu tampilan. Mudah dilacak kapan pun dibutuhkan.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Lihat Riwayat</a>
                        </div>
                    </div>

                    <!-- Feature 4 - Surat Pernyataan -->
                    <div class="col-lg-3 col-md-6 feature-column">
                        <div class="feature-title text-center">
                            <h3>Surat Pernyataan</h3>
                        </div>
                        <div class="feature-box red text-center">
                            <div class="feature-icon mx-auto">
                                <i class="bi bi-file-earmark-text" style="font-size: 2.5rem; color: #f72585;"></i>
                            </div>
                            <p>Ajukan surat dalam satu platform. Pantau statusnya secara real-time, dan unduh surat kapan saja.</p>
                            <a href="#" class="btn btn-outline-primary mt-3">Ajukan Surat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <style>
/* Main Container */
.schedule-container {
  max-width: 650px;
  margin: 0 auto;
  padding: 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Header */
.schedule-header {
  text-align: center;
  margin-bottom: 30px;
}

.schedule-header h1 {
  color: #1e293b;
  font-weight: 700;
  font-size: 1.8rem;
  margin-bottom: 8px;
}

.schedule-header p {
  color: #64748b;
  font-size: 1rem;
}

/* Schedule Grid */
.schedule-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

/* Schedule Card */
.schedule-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  padding: 18px;
  transition: all 0.2s ease;
}

.schedule-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.date-time {
  background-color: #f0f9ff;
  color: #0369a1;
  border-radius: 8px;
  padding: 10px;
  text-align: center;
  margin-bottom: 15px;
  font-size: 0.95rem;
}

.date-time strong {
  display: block;
  font-weight: 600;
}

.session-title {
  font-size: 1.05rem;
  color: #1e293b;
  font-weight: 600;
  margin-bottom: 8px;
}

.location {
  font-size: 0.9rem;
  color: #475569;
  margin-bottom: 12px;
}

.status-badge {
  display: inline-block;
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 6px;
  font-weight: 500;
  margin-bottom: 8px;
}

.available {
  background-color: #e0f2fe;
  color: #0369a1;
}

.almost-full {
  background-color: #fef9c3;
  color: #ca8a04;
}

.quota {
  background-color: #f1f5f9;
  color: #475569;
  display: inline-block;
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 6px;
  margin-bottom: 12px;
}

.register-btn {
  display: block;
  width: 100%;
  text-align: center;
  background-color: #0ea5e9;
  color: white;
  padding: 8px;
  border-radius: 6px;
  font-size: 0.9rem;
  text-decoration: none;
  transition: background-color 0.2s;
}

.register-btn:hover {
  background-color: #0284c7;
}

.view-all {
  text-align: center;
  margin-top: 30px;
}

.view-all-btn {
  display: inline-block;
  padding: 8px 20px;
  border-radius: 6px;
  background-color: transparent;
  color: #0ea5e9;
  border: 1px solid #0ea5e9;
  text-decoration: none;
  transition: all 0.2s;
}

.view-all-btn:hover {
  background-color: #f0f9ff;
}
</style>

<div class="schedule-container" style="color: white;">
  <div class="schedule-header">
    <h1 style="color: white;">Jadwal Tes TOEIC</h1>
    <p style="color: white;">Berikut adalah jadwal tes TOEIC yang tersedia melalui sistem SIPETO</p>
  </div>

  <div class="schedule-grid">
    <!-- Card 1 -->
    <div class="schedule-card">
      <div class="date-time">
        <strong>1 Juni 2026</strong>
        <span>08:00 - 11:00</span>
      </div>
      <div class="session-title">TOEIC (REGULER) SESI - 1</div>
      <div class="location">Gedung Teknologi Informasi - Ruang LPR 07/Lt.7</div>
      <div class="status-badge available">Tersedia</div>
      <div class="quota">Kuota: 30/50</div>
      <a href="#" class="register-btn">Daftar Sesi Ini</a>
    </div>

    <!-- Card 2 -->
    <div class="schedule-card">
      <div class="date-time">
        <strong>1 Juni 2026</strong>
        <span>13:00 - 16:00</span>
      </div>
      <div class="session-title">TOEIC (REGULER) SESI - 2</div>
      <div class="location">Gedung Teknologi Informasi - Ruang LPR 06/Lt.7</div>
      <div class="status-badge available">Tersedia</div>
      <div class="quota">Kuota: 42/50</div>
      <a href="#" class="register-btn">Daftar Sesi Ini</a>
    </div>

    <!-- Card 3 -->
    <div class="schedule-card">
      <div class="date-time">
        <strong>8 Juni 2026</strong>
        <span>09:00 - 11:00</span>
      </div>
      <div class="session-title">TOEIC (REGULER) SESI - 1</div>
      <div class="location">Gedung Teknologi Informasi - Ruang LPR 07/Lt.7</div>
      <div class="status-badge almost-full">Hampir Penuh</div>
      <div class="quota">Kuota: 48/50</div>
      <a href="#" class="register-btn">Daftar Sesi Ini</a>
    </div>

    <!-- Card 4 -->
    <div class="schedule-card">
      <div class="date-time">
        <strong>8 Juni 2026</strong>
        <span>13:00 - 16:00</span>
      </div>
      <div class="session-title">TOEIC (REGULER) SESI - 2</div>
      <div class="location">Gedung Teknologi Informasi - Ruang LPR 06/Lt.7</div>
      <div class="status-badge available">Tersedia</div>
      <div class="quota">Kuota: 15/50</div>
      <a href="#" class="register-btn">Daftar Sesi Ini</a>
    </div>
  </div>

  <div class="view-all">
    <a href="#" class="view-all-btn">Lihat Semua Jadwal</a>
  </div>
</div>
    <!-- Why SIPETO Section -->
    <section id="why" class="why-section section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Graphic Column - Building Image -->
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="why-graphic">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Gedung Politeknik" class="img-fluid building-image">
                        <div class="image-overlay"></div>
                    </div>
                </div>
                
                <!-- Content Column -->
                <div class="col-lg-6">
                    <div class="why-content">
                        <h2 class="section-title">Kenapa SIPETO?</h2>
                        <p class="lead mb-4">Platform terintegrasi untuk mengelola seluruh proses ujian TOEIC dengan efisien.</p>
                        
                        <div class="why-list">
                            <div class="why-item integrated">
                                <div class="why-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="why-text">
                                    <h3>Terintegrasi</h3>
                                    <p>Seluruh proses tersedia dalam satu sistem yang saling terhubung, dari pendaftaran hingga pengambilan sertifikat.</p>
                                </div>
                            </div>
                            
                            <div class="why-item transparent">
                                <div class="why-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="why-text">
                                    <h3>Transparan</h3>
                                    <p>Pemantauan proses dapat dilakukan secara real-time dengan notifikasi status setiap tahapan.</p>
                                </div>
                            </div>
                            
                            <div class="why-item efficient">
                                <div class="why-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="why-text">
                                    <h3>Efisien</h3>
                                    <p>Menghemat waktu dan tenaga karena semua dapat dilakukan secara daring tanpa antrian.</p>
                                </div>
                            </div>
                            
                            <div class="why-item accessible">
                                <div class="why-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="why-text">
                                    <h3>Akses Mudah</h3>
                                    <p>Dapat diakses kapan saja dan dimana saja melalui desktop maupun mobile.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-4">
                <!-- Logo Section with Politeknik Negeri Malang text -->
                <div class="col-lg-3 col-md-6 footer-section">
                    <div class="footer-brand">
                        <div class="logo-images">
                          <img src="{{ asset('img/logo.png') }}"  alt="SIPETO" style="height: 70px; margin-right: 10px;">
                            <p class="institution-name mt-2">Politeknik Negeri Malang</p>
                            <p class="mt-2 text-muted">Sistem Pengelolaan Ujian TOEIC Terintegrasi</p>
                        </div>
                    </div>
                </div>

                <!-- Kontak Kami Section -->
                <div class="col-lg-3 col-md-4 footer-section">
                    <h4>Kontak Kami</h4>
                    <address>
                        <p><i class="bi bi-geo-alt"></i> Jl. Soekarno-Hatta No. 9<br>
                        <span class="address-indent">Malang, 65141</span></p>
                        <p><i class="bi bi-telephone"></i> +62 (0341) 404424-404425</p>
                        <p><i class="bi bi-envelope"></i> sipeto@polinema.ac.id</p>
                        <p><i class="bi bi-printer"></i> +62 (0341) 404420</p>
                    </address>
                </div>

                <!-- Tautan Penting Section -->
                <div class="col-lg-3 col-md-4 footer-section">
                    <h4>Tautan Penting</h4>
                    <div class="footer-links">
                        <a href="#" class="tautan-link">Beranda</a>
                        <a href="#features" class="tautan-link">Fitur Utama</a>
                        <a href="#schedule" class="tautan-link">Jadwal Tes</a>
                        <a href="#why" class="tautan-link">Kenapa SIPETO</a>
                        <a href="#" class="tautan-link">FAQ</a>
                        <a href="#" class="tautan-link">Kebijakan Privasi</a>
                    </div>
                </div>

                <!-- Berita Terbaru Section -->
                <div class="col-lg-3 col-md-4 footer-section">
                    <h4>Berita Terbaru</h4>
                    <div class="news-item mb-3">
                        <a href="#" class="text-white">Pendaftaran TOEIC Gelombang Juni 2026 Dibuka</a>
                        <small class="d-block text-muted">15 Mei 2026</small>
                    </div>
                    <div class="news-item mb-3">
                        <a href="#" class="text-white">Workshop Persiapan TOEIC Gratis untuk Peserta</a>
                        <small class="d-block text-muted">10 Mei 2026</small>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright-container">
            <div class="container">
                <div class="copyright">
                    &copy; 2025 <strong><span>SIPETO</span></strong>. All Rights Reserved | Developed by <a href="https://www.polinema.ac.id" style="color: var(--accent);">Politeknik Negeri Malang</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>