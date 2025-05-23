<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Hasil Ujian - SIPETO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light navbar-white">
        <div class="container">
            <a href="#" class="navbar-brand">
                <span class="brand-text font-weight-light">SIPETO</span>
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="content-wrapper">
        <div class="container mt-4">
            <h3 class="mb-4">Input Hasil Ujian TOEIC</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('inputujian.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nim">NIM Mahasiswa</label>
                    <input type="text" name="nim" id="nim" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nilai">Nilai TOEIC</label>
                    <input type="number" name="nilai" id="nilai" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_ujian">Tanggal Ujian</label>
                    <input type="date" name="tanggal_ujian" id="tanggal_ujian" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('hasil-ujian.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center mt-5">
        <strong>&copy; {{ date('Y') }} SIPETO.</strong> All rights reserved.
    </footer>
</div>

<!-- JS Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
</body>
</html>
