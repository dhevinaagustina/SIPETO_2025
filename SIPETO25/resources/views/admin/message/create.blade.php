<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kirim Pesan - Admin SIPETO</title>
  
  <!-- Favicon -->
  <link rel="icon" href="https://via.placeholder.com/50" type="image/png">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
  <!-- Custom CSS -->
  <style>
    .student-row {
      margin-bottom: 15px;
      padding: 15px;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      position: relative;
    }
    .remove-student {
      position: absolute;
      right: 10px;
      top: 10px;
      color: #dc3545;
      cursor: pointer;
    }
    .success-option {
      color: #28a745;
    }
    .fail-option {
      color: #dc3545;
    }
    .btn-add-student {
      margin-bottom: 20px;
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
          <a href="#" class="nav-link active">Kirim Pesan</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- User Menu -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="https://via.placeholder.com/30" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline">Admin SIPETO</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="https://via.placeholder.com/80" class="img-circle elevation-2" alt="User Image">
              <p>
                Admin SIPETO
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
                  <a href="{{ url('/admin/dashboard') }}" class="nav-link sidebar-button">
                    <i class="fas fa-home nav-icon me-2"></i>
                    <span>Beranda</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/admin/pesan') }}" class="nav-link sidebar-button active">
                    <i class="fas fa-envelope nav-icon me-2"></i>
                    <span>Kirim Pesan</span>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item mb-2">
              <a href="{{ url('/admin/mahasiswa') }}" class="nav-link sidebar-button">
                <i class="fas fa-users nav-icon me-2"></i>
                <span>Data Mahasiswa</span>
              </a>
            </li>
            
            <li class="nav-item mb-2">
              <a href="{{ url('/admin/ujian') }}" class="nav-link sidebar-button">
                <i class="fas fa-calendar-alt nav-icon me-2"></i>
                <span>Jadwal Ujian</span>
              </a>
            </li>
            
            <li class="nav-item mb-2">
              <a href="{{ url('/admin/hasil') }}" class="nav-link sidebar-button">
                <i class="fas fa-clipboard-check nav-icon me-2"></i>
                <span>Hasil Ujian</span>
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
              <h1 class="m-0">Kirim Pesan Notifikasi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard Admin</a></li>
                <li class="breadcrumb-item active">Kirim Pesan</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <form id="messageForm" action="{{ route('admin.messages.send') }}" method="POST">
                @csrf
                
                <div id="studentsContainer">
                  <!-- Student row template (hidden) -->
                  <div class="student-row template" style="display: none;">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nim">NIM Mahasiswa</label>
                        <select class="form-control nim-select" name="students[0][nim]" required>
                          <option value="">Pilih NIM</option>
                          @foreach($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->nim }}" data-name="{{ $mahasiswa->name }}">{{ $mahasiswa->nim }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="name">Nama Mahasiswa</label>
                        <input type="text" class="form-control name-display" name="students[0][name]" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <div class="form-check">
                        <input class="form-check-input status-radio" type="radio" name="students[0][status]" id="success0" value="success" checked>
                        <label class="form-check-label success-option" for="success0">
                          <i class="fas fa-check-circle"></i> Berhasil
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input status-radio" type="radio" name="students[0][status]" id="fail0" value="fail">
                        <label class="form-check-label fail-option" for="fail0">
                          <i class="fas fa-times-circle"></i> Gagal
                        </label>
                      </div>
                    </div>
                    <i class="fas fa-times remove-student"></i>
                  </div>
                  
                  <!-- First student row -->
                  <div class="student-row">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nim">NIM Mahasiswa</label>
                        <select class="form-control nim-select" name="students[0][nim]" required>
                          <option value="">Pilih NIM</option>
                          @foreach($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->nim }}" data-name="{{ $mahasiswa->name }}">{{ $mahasiswa->nim }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="name">Nama Mahasiswa</label>
                        <input type="text" class="form-control name-display" name="students[0][name]" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <div class="form-check">
                        <input class="form-check-input status-radio" type="radio" name="students[0][status]" id="success0" value="success" checked>
                        <label class="form-check-label success-option" for="success0">
                          <i class="fas fa-check-circle"></i> Berhasil
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input status-radio" type="radio" name="students[0][status]" id="fail0" value="fail">
                        <label class="form-check-label fail-option" for="fail0">
                          <i class="fas fa-times-circle"></i> Gagal
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                
                <button type="button" id="addStudentBtn" class="btn btn-secondary btn-add-student">
                  <i class="fas fa-plus"></i> Tambah Mahasiswa
                </button>
                
                <div class="form-group">
                  <label for="message">Pesan</label>
                  <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-paper-plane"></i> Kirim Pesan
                </button>
              </form>
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
  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
  <!-- Custom JS -->
  <script>
    $(document).ready(function() {
      // Initialize Select2 for NIM dropdown
      $('.nim-select').select2();
      
      // Update name when NIM is selected
      $(document).on('change', '.nim-select', function() {
        const selectedOption = $(this).find('option:selected');
        const name = selectedOption.data('name');
        $(this).closest('.form-row').find('.name-display').val(name);
      });
      
      // Add new student row
      let studentCount = 1;
      $('#addStudentBtn').click(function() {
        const template = $('.student-row.template').clone();
        template.removeClass('template').show();
        
        // Update all names/ids in the cloned template
        template.find('select, input, label').each(function() {
          const elem = $(this);
          const oldId = elem.attr('id');
          const oldName = elem.attr('name');
          
          if (oldId) {
            elem.attr('id', oldId.replace(/[0-9]+/, studentCount));
          }
          
          if (oldName) {
            elem.attr('name', oldName.replace(/[0-9]+/, studentCount));
          }
        });
        
        // Initialize Select2 for the new select element
        template.find('.nim-select').select2();
        
        // Add to container
        template.appendTo('#studentsContainer');
        studentCount++;
      });
      
      // Remove student row
      $(document).on('click', '.remove-student', function() {
        if ($('.student-row:not(.template)').length > 1) {
          $(this).closest('.student-row').remove();
        } else {
          alert('Anda harus memiliki setidaknya satu mahasiswa.');
        }
      });
    });
  </script>
</body>
</html>