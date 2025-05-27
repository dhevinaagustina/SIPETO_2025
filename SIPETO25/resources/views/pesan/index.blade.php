<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan - SIPETO</title>
  
  <!-- Favicon -->
  <link rel="icon" href="https://via.placeholder.com/50" type="image/png">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  
  <!-- Custom CSS -->
  <style>
    .message-container {
      display: flex;
      height: calc(100vh - 120px);
    }
    .message-sidebar {
      width: 300px;
      border-right: 1px solid #dee2e6;
      overflow-y: auto;
    }
    .message-content {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
    }
    .message-item {
      padding: 10px 15px;
      border-bottom: 1px solid #f4f4f4;
      cursor: pointer;
    }
    .message-item:hover {
      background-color: #f8f9fa;
    }
    .message-item.active {
      background-color: #e9f5ff;
    }
    .message-item.unread {
      font-weight: bold;
    }
    .message-subject {
      display: block;
      margin-bottom: 5px;
    }
    .message-sender, .message-time {
      font-size: 12px;
      color: #6c757d;
    }
    .message-header {
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 15px;
      margin-bottom: 15px;
    }
    .message-sender-info {
      font-size: 14px;
      color: #6c757d;
      margin-bottom: 15px;
    }
    .btn-download {
      margin-top: 20px;
    }
    
    /* Sidebar Custom Styles */
    .main-sidebar {
      background-color: #29335C !important;
    }
    .sidebar-logo {
      width: 100px;
      height: auto;
      display: block;
      margin: 0 auto 10px auto;
    }
    .brand-link {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 15px 0;
      text-align: center;
    }
    .sidebar-button {
      display: flex;
      align-items: center;
      padding: 10px 16px;
      border-radius: 8px;
      color: #ffffff;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .sidebar-button:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateX(4px);
    }
    .sidebar-button.active {
      background-color: #ffffff !important;
      color: #29335C !important;
      font-weight: 600;
    }
    .sidebar-button.active .nav-icon {
      color: #29335C !important;
    }
    .nav-icon {
      width: 20px;
      text-align: center;
      color: white;
      margin-right: 10px;
    }
    .nav-treeview .nav-link {
      font-size: 14px;
      padding-left: 35px;
    }
    .nav-item.menu-open > .nav-link {
      background-color: rgba(255, 255, 255, 0.1) !important;
      color: white !important;
    }

    .bg-success-light {
    background-color: rgba(40, 167, 69, 0.1);
    border-left: 4px solid #28a745;
    }

    .bg-danger-light {
        background-color: rgba(220, 53, 69, 0.1);
        border-left: 4px solid #dc3545;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/') }}" class="nav-link">Beranda</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link active">Jadwal Periode Mei 2025</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- User Menu -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="https://via.placeholder.com/30" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline">Olivia Rodrigo</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="https://via.placeholder.com/80" class="img-circle elevation-2" alt="User Image">
              <p>
                Olivia Rodrigo - Mahasiswa
                <small>Member since Nov. 2023</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
              <a href="#" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link text-center py-4">
        <img src="{{ asset('adminlte/dist/img/logo-sipeto-2.png') }}" class="sidebar-logo mb-2" alt="Logo SIPETO">
        <h5 class="text-white font-weight-bold m-0">SIPETO</h5>
        <small class="text-white d-block">Sistem Pendaftaran TOEIC</small>
      </a>

      <!-- Sidebar Menu -->
      <div class="sidebar">
        <nav class="mt-4 px-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <li class="nav-item mb-2 has-treeview menu-open">
              <a href="#" class="nav-link sidebar-button active-parent">
                <i class="fas fa-th-large nav-icon me-2"></i>
                <span>Dashboard</span>
                <i class="right fas fa-angle-down ms-auto"></i>
              </a>
              <ul class="nav nav-treeview ps-4">
                <li class="nav-item">
                  <a href="{{ url('/dashboard/beranda') }}" class="nav-link sidebar-button">
                    <i class="fas fa-home nav-icon me-2"></i>
                    <span>Beranda</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/dashboard/pesan') }}" class="nav-link sidebar-button active">
                    <i class="fas fa-bell nav-icon me-2"></i>
                    <span>Pesan</span>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item mb-2 has-treeview">
              <a href="#" class="nav-link sidebar-button">
                <i class="fas fa-pencil-alt nav-icon me-2"></i>
                <span>Daftar Ujian</span>
                <i class="right fas fa-angle-down ms-auto"></i>
              </a>
              <ul class="nav nav-treeview ps-4">
                <li class="nav-item">
                  <a href="{{ url('/daftar-ujian/gratis') }}" class="nav-link sidebar-button">
                    <i class="fas fa-receipt nav-icon me-2"></i>
                    <span>Gratis</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/daftar-ujian/mandiri') }}" class="nav-link sidebar-button">
                    <i class="fas fa-dollar-sign nav-icon me-2"></i>
                    <span>Mandiri</span>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item mb-2">
              <a href="{{ url('/hasil-ujian') }}" class="nav-link sidebar-button">
                <i class="fas fa-calendar-alt nav-icon me-2"></i>
                <span>Hasil Ujian</span>
              </a>
            </li>
            
            <li class="nav-item mb-2">
              <a href="{{ url('/riwayat-ujian') }}" class="nav-link sidebar-button">
                <i class="fas fa-clock nav-icon me-2"></i>
                <span>Riwayat Ujian</span>
              </a>
            </li>
            
            <li class="nav-item mb-2">
              <a href="{{ url('/pengajuan-surat') }}" class="nav-link sidebar-button">
                <i class="fas fa-pen-fancy nav-icon me-2"></i>
                <span>Pengajuan Surat</span>
              </a>
            </li>
            
            <!-- Logout -->
            <li class="nav-item mt-4">
              <a href="{{ route('logout') }}" class="nav-link sidebar-button text-white">
                <i class="fas fa-sign-out-alt nav-icon me-2"></i>
                <span>Log out</span>
              </a>
            </li>
          </ul>   
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pesan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/dashboard/beranda') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pesan</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body p-0">
              <div class="message-container">
                @foreach($messages as $message)
                <div class="message-item {{ $message->status === 'success' ? 'bg-success-light' : 'bg-danger-light' }} p-3 mb-3 rounded">
                    <h5>{{ $message->status === 'success' ? 'Berhasil' : 'Gagal' }}</h5>
                    <p>{{ $message->message }}</p>
                    <small class="text-muted">Dikirim oleh: {{ $message->admin->name }} pada {{ $message->created_at->format('d M Y H:i') }}</small>
                </div>
                @endforeach
                <!-- Message Sidebar -->
                <div class="message-sidebar p-3">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari pesan...">
                    <div class="input-group-append">
                      <button class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  
                  <div class="list-group">
                    <a href="#" class="message-item unread active">
                      <span class="message-subject">Jadwal Periode Mei 2025</span>
                      <span class="message-sender">tc &lt;Olivia@gmail.com&gt;</span>
                      <span class="message-time">a few second ago</span>
                    </a>
                    <a href="#" class="message-item">
                      <span class="message-subject">Informasi Pengambilan Sertifikat</span>
                      <span class="message-sender">tc &lt;Olivia@gmail.com&gt;</span>
                      <span class="message-time">a few second ago</span>
                    </a>
                  </div>
                </div>
                
                <!-- Message Content -->
                <div class="message-content">
                  <div class="message-header">
                    <h3>Jadwal Periode Mei 2025</h3>
                    <div class="message-sender-info">tc &lt;Olivia@gmail.com&gt;</div>
                  </div>
                  
                  <p>Mahasiswa yang telah mendaftar ujian TOEIC periode Mei 2025 diharapkan untuk memperhatikan jadwal pelaksanaan berikut:</p>
                  <ul>
                    <li>Hari, Tanggai: Seissa, 7 Mei 2025</li>
                    <li>Waktu: Pukul 09.00 WIB - seiesai</li>
                    <li>Tempat: LAB Bahasa, Gedung A, Kampus Utama</li>
                  </ul>
                  <p>Pastikan hadir 30 menit sebelum ujian dimulai untuk proses registrasi ulang. Jangan lupa membawa kartu identitas dan bukti pendaftaran ujian.</p>
                  
                  <button class="btn btn-primary btn-download">
                    <i class="fas fa-download"></i> Unduh Jadwal
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2025 <a href="#">SIPETO</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 2.0.0
      </div>
    </footer>
  </div>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>