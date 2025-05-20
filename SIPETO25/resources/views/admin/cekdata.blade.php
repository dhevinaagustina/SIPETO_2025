<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIPETO - Sistem Pendaftaran TOEIC</title>
  
  <!-- Favicon -->
  <link rel="icon" href="https://via.placeholder.com/50" type="image/png">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
  
  <!-- Custom CSS -->
  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4895ef;
      --dark-color: #1e2b50;
      --light-color: #f8f9fa;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fb;
    }
    
    /* Sidebar Customization */
    .main-sidebar {
      background-color: var(--dark-color) !important;
      border-right: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .brand-link {
      height: 80px;
      padding: 15px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      background-color: rgba(0, 0, 0, 0.1);
    }
    
    .brand-link img {
      height: 40px;
      width: auto;
      margin-right: 10px;
    }
    
    .brand-text {
      font-weight: 600;
      font-size: 1.2rem;
      letter-spacing: 0.5px;
    }
    
    .nav-sidebar .nav-item > .nav-link {
      margin-bottom: 5px;
      border-radius: 4px;
      color: rgba(255, 255, 255, 0.8);
    }
    
    .nav-sidebar .nav-item > .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      color: white;
    }
    
    .nav-sidebar .nav-item > .nav-link.active {
      background-color: var(--primary-color);
      color: white;
      font-weight: 500;
    }
    
    .nav-sidebar .nav-link > .right {
      right: 1rem;
    }
    
    /* Main Header */
    .main-header {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-bottom: 1px solid #dee2e6;
    }
    
    /* Content Wrapper */
    .content-wrapper {
      background-color: #f5f7fb;
    }
    
    /* Card Customization */
    .card {
      border: none;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
      margin-bottom: 20px;
    }
    
    .card-header {
      background-color: white;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      padding: 15px 20px;
      border-radius: 8px 8px 0 0 !important;
    }
    
    .card-title {
      font-weight: 600;
      color: var(--dark-color);
      margin-bottom: 0;
    }
    
    /* Table Customization */
    .table {
      width: 100% !important;
    }
    
    .table thead th {
      background-color: #f8f9fa;
      color: var(--dark-color);
      font-weight: 600;
      border-bottom-width: 1px;
    }
    
    /* Buttons */
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
    }
    
    /* Search and Filter */
    .search-box {
      position: relative;
    }
    
    .search-box .form-control {
      padding-left: 40px;
      border-radius: 20px;
      border: 1px solid #dee2e6;
    }
    
    .search-box .search-icon {
      position: absolute;
      left: 15px;
      top: 10px;
      color: #6c757d;
    }
    
    /* User Panel */
    .user-panel {
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .user-panel img {
      width: 40px;
      height: 40px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .brand-link {
        height: 60px;
        padding: 10px;
      }
      
      .brand-link img {
        height: 30px;
      }
      
      .brand-text {
        font-size: 1rem;
      }
    }
    
    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .fade-in {
      animation: fadeIn 0.3s ease-out;
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
          <a href="index.html" class="nav-link">Beranda</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">3 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 1 new registration
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file-alt mr-2"></i> 2 test results ready
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-calendar mr-2"></i> New schedule available
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
          </div>
        </li>
        
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
                Olivia Rodrigo - Admin
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
      <a href="index.html" class="brand-link d-flex align-items-center">
        <img src="{{ asset('img/logo.png') }}" alt="SIPETO Logo">
        <span>SIPETO</span>
        <small>Sistem Pendaftaran TOEIC</small>
      </a>

      {{-- <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://via.placeholder.com/80" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Olivia Rodrigo</a>
            <small class="text-muted">Administrator</small>
          </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="index.html" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Beranda</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>Data Mahasiswa</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Input Hasil Ujian</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>Riwayat Ujian</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Pengajuan Surat</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Kelola Jadwal</p>
              </a>
            </li>
            
            <li class="nav-item mt-3">
              <a href="#" class="nav-link bg-danger">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Mahasiswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Mahasiswa</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box fade-in">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Mahasiswa</span>
                  <span class="info-box-number">1,254</span>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box fade-in">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sudah Ujian</span>
                  <span class="info-box-number">843</span>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box fade-in">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Belum Ujian</span>
                  <span class="info-box-number">411</span>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box fade-in">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar-times"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Jadwal Mendatang</span>
                  <span class="info-box-number">3</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Main card -->
          <div class="row">
            <div class="col-12">
              <div class="card fade-in">
                <div class="card-header">
                  <h3 class="card-title">Daftar Mahasiswa</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">
                          <i class="fas fa-plus"></i> Tambah Data
                        </button>
                        <button type="button" class="btn btn-default">
                          <i class="fas fa-download"></i> Export
                        </button>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                          <select class="form-control">
                            <option>Filter Jurusan</option>
                            <option>Teknologi Informasi</option>
                            <option>Teknik Elektro</option>
                            <option>Teknik Mesin</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <div class="search-box">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control" placeholder="Cari mahasiswa...">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <table id="mahasiswaTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Prodi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2341760071</td>
                        <td>Niriza Lailamuli Hidayat</td>
                        <td>Teknologi Informasi</td>
                        <td>D-IV Sistem Informasi Bisnis</td>
                        <td><span class="badge badge-success">Sudah Ujian</span></td>
                        <td>
                          <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>2341760072</td>
                        <td>Adinda Ivanka Maysanda Putri</td>
                        <td>Teknologi Informasi</td>
                        <td>D-IV Sistem Informasi Bisnis</td>
                        <td><span class="badge badge-success">Sudah Ujian</span></td>
                        <td>
                          <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>2341760073</td>
                        <td>Adyuta Raksa Ramadhana</td>
                        <td>Teknologi Informasi</td>
                        <td>D-IV Sistem Informasi Bisnis</td>
                        <td><span class="badge badge-warning">Belum Ujian</span></td>
                        <td>
                          <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>2341760074</td>
                        <td>Agung Prasetyo</td>
                        <td>Teknik Elektro</td>
                        <td>D-III Teknik Listrik</td>
                        <td><span class="badge badge-success">Sudah Ujian</span></td>
                        <td>
                          <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>2341760075</td>
                        <td>Bella Anastasya</td>
                        <td>Teknik Mesin</td>
                        <td>D-III Teknik Mesin</td>
                        <td><span class="badge badge-danger">Tidak Hadir</span></td>
                        <td>
                          <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                          <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2025 <a href="#">SIPETO</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 2.0.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  
  <!-- Custom Script -->
  <script>
    $(function () {
      // Initialize DataTable
      $('#mahasiswaTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "dom": '<"top"lfB>rt<"bottom"ip>',
        "buttons": [
          {
            extend: 'copy',
            className: 'btn btn-sm btn-default',
            text: '<i class="fas fa-copy"></i> Copy'
          },
          {
            extend: 'excel',
            className: 'btn btn-sm btn-success',
            text: '<i class="fas fa-file-excel"></i> Excel'
          },
          {
            extend: 'pdf',
            className: 'btn btn-sm btn-danger',
            text: '<i class="fas fa-file-pdf"></i> PDF'
          },
          {
            extend: 'print',
            className: 'btn btn-sm btn-info',
            text: '<i class="fas fa-print"></i> Print'
          }
        ],
        "language": {
          "search": "_INPUT_",
          "searchPlaceholder": "Cari...",
          "lengthMenu": "Tampilkan _MENU_ data per halaman",
          "zeroRecords": "Data tidak ditemukan",
          "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
          "infoEmpty": "Tidak ada data tersedia",
          "infoFiltered": "(difilter dari _MAX_ total data)"
        }
      });
      
      // Add animation class to elements
      $('.fade-in').each(function(i) {
        $(this).delay(i * 200).animate({'opacity':1}, 300);
      });
      
      // Tooltip initialization
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>