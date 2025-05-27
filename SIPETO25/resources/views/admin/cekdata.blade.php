<!-- filepath: c:\laragon\www\SIPETO_2025\SIPETO25\resources\views\admin\cekdata.blade.php -->
<!DOCTYPE html>
@extends('layouts-admin.app')

@section('title', 'Data Mahasiswa')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Mahasiswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Data Mahasiswa</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">

    {{-- INFO BOX --}}
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Mahasiswa</span>
            <span class="info-box-number">{{ $totalMahasiswa }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Sudah Mendaftar</span>
            <span class="info-box-number">{{ $sudahMendaftar }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-clock"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Belum Mendaftar</span>
            <span class="info-box-number">{{ $totalMahasiswa - $sudahMendaftar }}</span>
          </div>
        </div>
      </div>

    {{-- FILTER + EXPORT --}}
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Mahasiswa</h3>
        <div class="card-tools">
          <a href="{{ route('cekdata.export.excel') }}" class="btn btn-success btn-sm">
            <i class="fas fa-file-excel"></i> Export Excel
          </a>
          <a href="{{ route('cekdata.export.pdf') }}" class="btn btn-danger btn-sm">
            <i class="fas fa-file-pdf"></i> Export PDF
          </a>
        </div>
      </div>
      <div class="card-body">

        {{-- Filter & Search --}}
        <div class="row mb-3">
          <div class="col-md-6">
            <select id="filterJurusan" name="filterJurusan" class="form-control">
              <option value="">-- Filter Jurusan --</option>
              <option>Teknologi Informasi</option>
              <option>Teknik Kimia</option>
              <option>Teknik Elektro</option>
              <option>Teknik Mesin</option>
              <option>Teknik Sipil</option>
              <option>Akuntansi</option>
              <option>Administrasi Niaga</option>
            </select>
          </div>
          <div class="col-md-6">
            <input type="text" id="searchMahasiswa" name="searchMahasiswa" class="form-control" placeholder="Cari Nama atau NIM Mahasiswa...">
          </div>
        </div>

        {{-- Table --}}
        <table id="mahasiswaTable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Prodi</th>
              <th>Status Pendaftaran</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
    {{-- DataTables & jQuery --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            let table = $('#mahasiswaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('cekdata.data') }}",
                    data: function (d) {
                        d.jurusan = $('#filterJurusan').val();
                        d.search = $('#searchMahasiswa').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nim', name: 'nim' },
                    { data: 'nama', name: 'nama' },
                    { data: 'jurusan', name: 'jurusan' },
                    { data: 'prodi', name: 'prodi' },
                    { 
                        data: 'status_pendaftaran', 
                        name: 'status_pendaftaran', 
                        render: function(data) {
                            return data && data !== '-' ? data : '<span class="text-muted">-</span>';
                        }
                    },
                    { 
                        data: 'status_ujian', 
                        name: 'status_ujian', 
                        render: function(data) {
                            return data && data !== '-' ? data : '<span class="text-muted">-</span>';
                        }
                    },
                ],
                language: {
                    emptyTable: "Tidak ada data tersedia di tabel",
                    processing: "Memuat...",
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });

            $('#filterJurusan').on('change', function () {
                table.ajax.reload();
            });

            $('#searchMahasiswa').on('keyup', function () {
                table.ajax.reload();
            });
        });
    </script>
@endsection