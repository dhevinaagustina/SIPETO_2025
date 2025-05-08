<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SIPETO - Sistem Pendaftaran TOEIC</title>
  <meta name="description" content="Sistem Pendaftaran Ujian TOEIC Online">
  <meta name="keywords" content="TOEIC, Ujian Bahasa Inggris, SIPETO, Pendaftaran TOEIC">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
  <body class="index-page">
    <header id="header" class="header">
      <div class="container d-flex justify-content-between align-items-center">
        <a href="/" class="logo d-flex align-items-center">
          <div class="logo-images">
            <img src="{{ asset('assets/img/LOGO POLITEKNIK NEGERI MALANG.png') }}" alt="Polinema" class="logo-img">
            <img src="{{ asset('assets/img/sipetonavbar.png') }}" alt="SIPETO" class="logo-img">
          </div>
          <div class="logo-text">
            <span class="tagline1">SIPETO</span>
            <span class="tagline">Sistem Pendaftaran TOEIC</span>
          </div>
        </a>
  
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Beranda</a></li>
            <li><a href="#features">Fitur Utama</a></li>
            <li><a href="#why">Keunggulan</a></li>
            <li><a href="#footer">Kontak</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </header>
  
    <!-- Hero Section -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1>Selamat Datang di <span class="text-accent">SIPETO!</span></h1>
            <p>SIPETO merupakan sistem berbasis web yang dirancang untuk memudahkan dalam proses pendaftaran, pelaksanaan, serta pengelolaan data ujian TOEIC secara efisien dan terpusat. Dengan SIPETO, seluruh proses dapat dilakukan dengan digital dan transparan!</p>
            <div class="hero-buttons">
              <a href="/login" class="btn-get-started">Masuk</a>
              <a href="/register" class="btn-secondary">Daftar</a>
            </div>
          </div>
          <div class="col-lg-6 hero-img">
            <div class="image-stack">
              <img src="{{ asset('assets/img/gedung-jti.png') }}" class="img-fluid main-image" alt="Gedung JTI">
              <img src="{{ asset('assets/img/gambar-nulis.png') }}" class="img-fluid overlay-image" alt="Gambar Menulis">
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- Rest of your HTML remains the same -->

 

    <!-- Features Section -->
    <!-- Features Section -->
<section id="features" class="features section">
  <div class="container">
    <div class="section-title text-center">
      <h2>Kelola Ujian TOEIC Anda dengan Mudah dan Cepat!</h2>
      <p>SIPETO dirancang untuk membantu mengatur seluruh proses ujian TOEIC secara digital, semua dapat dilakukan dalam satu platform yang terintegrasi.</p>
    </div>

    <div class="features-content">
      <div class="row">
        <!-- Feature 1 - Daftar Ujian -->
        <div class="col-md-3 col-sm-6 feature-column">
          <div class="feature-title">
            <h3>Daftar Ujian</h3>
          </div>
          <div class="feature-box orange">
            <div class="feature-icon">
              <img src="{{ asset('assets/img/nulis.png') }}" alt="Hasil Ujian">
            </div>
            <p>Pendaftaran ujian TOEIC langsung dari sistem, tanpa formulir manual. Setelah daftar, Anda otomatis diarahkan ke situs resmi ujian.</p>
          </div>
        </div>

        <!-- Feature 2 - Hasil Ujian -->
        <div class="col-md-3 col-sm-6 feature-column">
          <div class="feature-title">
            <h3>Hasil Ujian</h3>
          </div>
          <div class="feature-box blue">
            <div class="feature-icon">
              <img src="{{ asset('assets/img/daftar.png') }}" alt="Daftar Ujian">
            </div>
            <p>Lihat hasil Ujian TOEIC Anda langsung dari akun. Nilai ditampilkan dengan jelas, bisa langsung digunakan untuk keperluan akademik.</p>
          </div>
        </div>

        <!-- Feature 3 - Riwayat Ujian -->
        <div class="col-md-3 col-sm-6 feature-column">
          <div class="feature-title">
            <h3>Riwayat Ujian</h3>
          </div>
          <div class="feature-box brown">
            <div class="feature-icon">
              <img src="{{ asset('assets/img/riwayat.png') }}" alt="Riwayat Ujian">
            </div>
            <p>Pantau semua pelaksanaan TOEIC yang telah Anda ikuti dalam satu tampilan. Mudah dilacak kapan pun dibutuhkan.</p>
          </div>
        </div>

        <!-- Feature 4 - Surat Pernyataan -->
        <div class="col-md-3 col-sm-6 feature-column">
          <div class="feature-title">
            <h3>Surat Pernyataan</h3>
          </div>
          <div class="feature-box red">
            <div class="feature-icon">
              <img src="{{ asset('assets/img/pin.png') }}" alt="Surat Pernyataan">
            </div>
            <p>Ajukan surat dalam satu platform. Pantau statusnya secara real-time, dan unduh surat kapan saja.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Why SIPETO Section -->
<section id="why" class="why-section section">
  <div class="container">
    <div class="row align-items-center">
      <!-- Graphic Column - Building Image -->
      <div class="col-lg-6 d-none d-lg-block">
        <div class="why-graphic">
          <img src="{{ asset('assets/img/why.png') }}" alt="Gedung Politeknik" class="img-fluid building-image">
          <div class="image-overlay"></div>
        </div>
      </div>
      
      <!-- Content Column -->
      <div class="col-lg-6">
        <div class="why-content">
          <h2 class="section-title">Kenapa SIPETO?</h2>
          
          <div class="why-list">
            <div class="why-item integrated">
              <div class="why-icon">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <div class="why-text">
                <h3>Terintegrasi</h3>
                <p>Seluruh proses tersedia dalam satu sistem yang saling terhubung.</p>
              </div>
            </div>
            
            <div class="why-item transparent">
              <div class="why-icon">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <div class="why-text">
                <h3>Transparan</h3>
                <p>Pemantauan proses dapat dilakukan secara real-time.</p>
              </div>
            </div>
            
            <div class="why-item efficient">
              <div class="why-icon">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <div class="why-text">
                <h3>Efisien</h3>
                <p>Menghemat waktu dan tenaga karena semua dapat dilakukan secara daring.</p>
              </div>
            </div>
            
            <div class="why-item accessible">
              <div class="why-icon">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <div class="why-text">
                <h3>Akses Mudah</h3>
                <p>Dapat diakses kapan saja dan dimana saja, mendukung fleksibilitas kebutuhan pengguna.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-section">
          <div class="footer-brand">
            <div class="logo-images">
              <img src="{{ asset('assets/img/LOGO POLITEKNIK NEGERI MALANG.png') }}" alt="Polinema" class="logo-img">
              <img src="{{ asset('assets/img/sipetonavbar.png') }}" alt="SIPETO" class="logo-img">
            </div>
            <div class="footer-title">
              <h3>SIPETO</h3>
              <p>Sistem Pendaftaran TOEIC<br>Politeknik Negeri Malang</p>
            </div>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-6 footer-section">
          <h4>Kontak Kami</h4>
          <p>Jl. Soekarno-Hatta No. 9<br>
             Malang, 65141<br>
             Telepon: +62 (0341) 404424-404425<br>
             Faks: +62 (0341) 404420</p>
        </div>
  
        <div class="col-lg-2 col-md-6 footer-links footer-section">
          <h4>Tautan Penting</h4>
          <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="#features">Fitur Utama</a></li>
            <li><a href="#why">Kenapa SIPETO</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 footer-section">
          <h4>Berita Terbaru</h4>
          <p>Anda dapat mengakses berita terbaru disini.</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  
    <div class="footer-divider"></div>
    
    <div class="copyright-container">
      <div class="copyright">
        &copy; 2025 <strong><span>SIPETO</span></strong>. All Rights Reserved
      </div>
    </div>
    
    <div class="footer-divider"></div>
  
  </footer>
</body>
</html>


