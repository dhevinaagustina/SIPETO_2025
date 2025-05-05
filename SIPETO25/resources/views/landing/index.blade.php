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

  <header id="header" class="header sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
      <a href="/" class="logo d-flex align-items-center">
        <h1 class="sitename">SIPETO</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#features">Fitur</a></li>
          <li><a href="#why">Keunggulan</a></li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="/login" class="btn-login">Masuk</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1>Selamat Datang di SIPETO!</h1>
            <p>SIPETO merupakan sistem berbasis web yang dirancang untuk memudahkan dalam proses pendaftaran, pelaksanaan, serta pengelolaan data ujian TOEIC secara efisien dan terpusat. Dengan SIPETO, seluruh proses dapat dilakukan dengan digital dan transparan!</p>
            <div class="hero-buttons">
              <a href="/login" class="btn-get-started">Masuk</a>
              <a href="/register" class="btn-secondary">Daftar</a>
            </div>
          </div>
          <div class="col-lg-6 hero-img">
            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="img-fluid" alt="Ilustrasi ujian online">
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features section">
      <div class="container">
        <div class="section-title">
          <h2>Kelola Ujian TOEIC Anda dengan Mudah dan Cepat!</h2>
          <p>SIPETO dirancang untuk membantu mengatur seluruh proses ujian TOEIC secara digital dalam satu platform terintegrasi</p>
        </div>

        <div class="row gy-4">
          <!-- Feature 1 -->
          <div class="col-md-6 col-lg-3" data-aos="fade-up">
            <div class="feature-box">
              <div class="icon"><i class="bi bi-pencil-square"></i></div>
              <h4>Daftar Ujian</h4>
              <p>Pendaftaran ujian TOEIC langsung dari sistem, tanpa formulir manual. Setelah daftar, Anda otomatis diarahkan ke situs resmi ujian.</p>
            </div>
          </div>

          <!-- Feature 2 -->
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-box">
              <div class="icon"><i class="bi bi-clipboard-data"></i></div>
              <h4>Hasil Ujian</h4>
              <p>Lihat hasil Ujian TOEIC Anda langsung dari akun. Nilai ditampilkan dengan jelas, bisa langsung digunakan untuk keperluan akademik.</p>
            </div>
          </div>

          <!-- Feature 3 -->
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-box">
              <div class="icon"><i class="bi bi-clock-history"></i></div>
              <h4>Riwayat Ujian</h4>
              <p>Pantau semua pelaksanaan TOEIC yang telah Anda ikuti dalam satu tampilan. Mudah dilacak kapan pun dibutuhkan.</p>
            </div>
          </div>

          <!-- Feature 4 -->
          <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-box">
              <div class="icon"><i class="bi bi-file-earmark-text"></i></div>
              <h4>Surat Pernyataan</h4>
              <p>Ajukan surat dalam satu platform. Pantau statusnya secara real-time, dan unduh surat kapan saja.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Why SIPETO Section -->
    <section id="why" class="why-section section">
      <div class="container">
        <div class="section-title">
          <h2>Kenapa SIPETO?</h2>
        </div>

        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="checklist">
              <div class="checklist-item" data-aos="fade-up">
                <div class="check-icon"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                  <h4>Terintegrasi</h4>
                  <p>Seluruh proses tersedia dalam satu sistem yang saling terhubung.</p>
                </div>
              </div>

              <div class="checklist-item" data-aos="fade-up" data-aos-delay="100">
                <div class="check-icon"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                  <h4>Transparan</h4>
                  <p>Pemantauan proses dapat dilakukan secara real-time.</p>
                </div>
              </div>

              <div class="checklist-item" data-aos="fade-up" data-aos-delay="200">
                <div class="check-icon"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                  <h4>Efisien</h4>
                  <p>Menghemat waktu dan tenaga karena semua dapat dilakukan secara daring.</p>
                </div>
              </div>

              <div class="checklist-item" data-aos="fade-up" data-aos-delay="300">
                <div class="check-icon"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                  <h4>Akses Mudah</h4>
                  <p>Akses kapan saja dan dimana saja, mendukung fleksibilitas kebutuhan pengguna.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container">
        <div class="section-title">
          <h2>Kontak Kami</h2>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Jalan Soekarno-Hatta No. 9<br>Malang, 65141</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Telepon</h3>
              <p>+62 (0341) 404424 - 404425<br>Faks: +62 (0341) 404420</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="info-box">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>info@sipetotoday.com<br>support@sipetotoday.com</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6">
          <h3>SIPETO</h3>
          <p>Sistem Pendaftaran TOEIC<br>Jurusan Teknologi Informasi<br>Politeknik Negeri Malang</p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Tautan Penting</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#features">Fitur Utama</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#why">Kenapa SIPETO</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6">
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

    <div class="container mt-4">
      <div class="copyright">
        &copy; 2025 <strong><span>SIPETO</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>