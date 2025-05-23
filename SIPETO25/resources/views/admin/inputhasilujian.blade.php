<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin TOEIC - Input Hasil Ujian</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"/>
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" class="active">
      <div class="sidebar-header">
        <h3>SISTEM TOEIC</h3>
        <strong>TOEIC</strong>
      </div>
      <ul class="list-unstyled components">
        <li><a href="#"><i class="bi bi-house"></i> Beranda</a></li>
        <li><a href="#"><i class="bi bi-search"></i> Cek Data</a></li>
        <li class="active"><a href="#"><i class="bi bi-journal-text"></i> Input Hasil Ujian</a></li>
        <li><a href="#"><i class="bi bi-clock-history"></i> Riwayat Ujian</a></li>
        <li><a href="#"><i class="bi bi-envelope"></i> Pengajuan Surat</a></li>
        <li><a href="#"><i class="bi bi-calendar-event"></i> Kelola Jadwal</a></li>
      </ul>
      <div class="logout-section">
        <a href="#" class="logout-btn"><i class="bi bi-box-arrow-right"></i> Logout</a>
      </div>
    </nav>

    <!-- Content -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="bi bi-list"></i>
          </button>
          <h2 class="mb-0">Input Hasil Ujian TOEIC</h2>
        </div>
      </nav>

      <div class="container-fluid">
        <!-- Dashboard Cards -->
        <div class="row mb-4">
          <div class="col-md-3"><div class="card text-white bg-primary"><div class="card-body"><h5 class="card-title">Total Peserta</h5><p class="display-6">215</p></div></div></div>
          <div class="col-md-3"><div class="card text-white bg-success"><div class="card-body"><h5 class="card-title">Lulus</h5><p class="display-6">143</p></div></div></div>
          <div class="col-md-3"><div class="card text-white bg-warning"><div class="card-body"><h5 class="card-title">Belum Ujian</h5><p class="display-6">42</p></div></div></div>
          <div class="col-md-3"><div class="card text-white bg-danger"><div class="card-body"><h5 class="card-title">Gagal</h5><p class="display-6">30</p></div></div></div>
        </div>

        <!-- Filter -->
        <div class="card mb-4">
          <div class="card-header"><i class="bi bi-filter"></i> Filter Data</div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-3">
                <label class="form-label">Cari Mahasiswa</label>
                <input type="text" class="form-control" placeholder="Nama atau ID...">
              </div>
              <div class="col-md-3">
                <label class="form-label">Tanggal Ujian</label>
                <input type="date" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Status</label>
                <select class="form-select">
                  <option value="">Semua</option>
                  <option value="lulus">Berhasil</option>
                  <option value="gagal">Gagal</option>
                </select>
              </div>
              <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-primary w-100"><i class="bi bi-funnel"></i> Terapkan Filter</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Table -->
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="bi bi-table"></i> Daftar Hasil Ujian Mahasiswa</div>
            <div>
              </button>
              <button class="btn btn-secondary btn-sm">
                <i class="bi bi-download"></i> Export
              </button>
            </div>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Ujian</th>
                  <th>Nama Mahasiswa</th>
                  <th>Tanggal Ujian</th>
                  <th>Listening</th>
                  <th>Reading</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>2341760071</td>
                  <td>Nitra Lailauni Hidayat</td>
                  <td>7 Mei 2025</td>
                  <td>120</td>
                  <td>120</td>
                  <td>240</td>
                  <td><span class="badge bg-danger">Gagal</span></td>
                  <td>
                    <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Hasil Ujian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">ID Ujian</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Tanggal Ujian</label>
                <input type="date" class="form-control" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Mahasiswa</label>
              <input type="text" class="form-control" required>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Nilai Listening</label>
                <input type="number" class="form-control" min="5" max="495" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Nilai Reading</label>
                <input type="number" class="form-control" min="5" max="495" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Catatan</label>
              <textarea class="form-control" rows="3"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button class="btn btn-primary">Simpan Data</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar
    document.getElementById("sidebarCollapse").addEventListener("click", function () {
      document.getElementById("sidebar").classList.toggle("active");
    });
  </script>
</body>
</html>
