<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPETO - Sistem Pendaftaran TOEIC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .hero {
            background-color: #eef1f7;
            padding: 80px 20px;
            text-align: center;
        }
        .hero h1 {
            font-weight: bold;
            color: #29335C;
        }
        .features .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .features .card:hover {
            transform: translateY(-5px);
        }
        .features .card h5 {
            color: #29335C;
        }
        .btn-primary {
            background-color: #29335C;
            border-color: #29335C;
        }
        .btn-primary:hover {
            background-color: #1e274b;
            border-color: #1e274b;
        }
        .btn-warning {
            background-color: #F3A711;
            border-color: #F3A711;
            color: #000;
        }
        .btn-warning:hover {
            background-color: #d99000;
            border-color: #d99000;
            color: #000;
        }
        .btn-danger {
            background-color: #DB2B39;
            border-color: #DB2B39;
        }
        footer {
            background-color: #29335C;
            color: white;
            padding: 20px 0;
        }
    </style>
    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #29335C;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/img/logo.png" alt="Logo SIPETO" class="me-2" style="height: 60px; max-width: 100%;">
                <span class="fw-bold text-white">SIPETO POLINEMA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Kontak</a></li>
                    <li class="nav-item"><a class="btn btn-warning ms-3" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    


<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>Uji Kemampuan Bahasa Inggrismu Bersama SIPETO</h1>
        <p class="lead mt-3">Platform pendaftaran TOEIC yang mudah, cepat, dan terpercaya.</p>
        <a href="/register" class="btn btn-primary btn-lg mt-3">Daftar Sekarang</a>
    </div>
</section>

<!-- Fitur -->
<section class="features py-5">
    <div class="container">
      <h2 class="text-center mb-4">Fitur Unggulan</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card p-3 text-center">
            <img src="https://img.icons8.com/fluency/48/book.png" class="mx-auto mb-2" />
            <h5>Daftar Ujian</h5>
            <div class="p-2 mt-2 text-white" style="background-color: #DB2B39; border-radius: 8px;">
              Mudah mendaftar TOEIC sesuai jadwal yang tersedia.
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card p-3 text-center">
            <img src="https://img.icons8.com/fluency/48/test-passed.png" class="mx-auto mb-2" />
            <h5>Hasil Ujian</h5>
            <div class="p-2 mt-2 text-dark" style="background-color: #F3A711; border-radius: 8px;">
              Lihat hasil ujianmu secara langsung dan aman.
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card p-3 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/1827/1827370.png" alt="Riwayat Ujian" class="mx-auto mb-2" style="height: 48px;">
            <h5>Riwayat Ujian</h5>
            <div class="p-2 mt-2 text-white" style="background-color: #DB2B39; border-radius: 8px;">
              Telusuri seluruh riwayat tes TOEIC-mu dengan mudah.
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card p-3 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/3143/3143460.png" alt="Pengajuan Surat" class="mx-auto mb-2" style="height: 48px;">
            <h5>Pengajuan Surat</h5>
            <div class="p-2 mt-2 text-dark" style="background-color: #F3A711; border-radius: 8px;">
              Ajukan surat keterangan hasil ujian dengan cepat.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

<!-- CTA -->
<section class="text-center bg-warning py-5">
    <div class="container">
        <h2>Siap meningkatkan kemampuan bahasa Inggrismu?</h2>
        <a href="/register" class="btn btn-dark mt-3">Mulai Sekarang</a>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>“One language sets you in a corridor for life. Two languages open every door along the way.” - Frank Smith</p>
        <p class="mb-0">&copy; 2025 SIPETO. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
