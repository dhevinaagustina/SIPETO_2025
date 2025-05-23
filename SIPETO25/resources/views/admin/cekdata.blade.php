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

    {{-- INFO BOX DINAMIS --}}
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
        <span class="info-box-text">Sudah Ujian</span>
        <span class="info-box-number">{{ $sudahUjian }}</span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-warning"><i class="fas fa-clock"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Belum Ujian</span>
        <span class="info-box-number">{{ $belumUjian }}</span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-danger"><i class="fas fa-calendar-times"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jadwal Mendatang</span>
        <span class="info-box-number">{{ $jadwalMendatang }}</span>
      </div>
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
            <select id="filterJurusan" class="form-control">
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
            <input type="text" id="searchMahasiswa" class="form-control" placeholder="Cari Nama atau NIM Mahasiswa...">
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
              <th>Status</th>
            </tr>
          </thead>
        </table>

      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  $(document).ready(function () {
    let table = $('#mahasiswaTable').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: false,
      ajax: {
        url: "{{ route('cekdata.data') }}",
        data: function(d) {
          d.jurusan = $('#filterJurusan').val();
        }
      },
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'nim', name: 'mahasiswa.nim' },
        { data: 'nama', name: 'mahasiswa.nama_mahasiswa' },
        { data: 'jurusan', name: 'mahasiswa.jurusan' },
        { data: 'prodi', name: 'mahasiswa.prodi' },
        { data: 'status', name: 'status_ujian', orderable: false, searchable: false }
      ],
      language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ entri",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
        paginate: {
          previous: "Sebelumnya",
          next: "Berikutnya"
        }
      }
    });

    // Filter jurusan
    $('#filterJurusan').on('change', function () {
      table.ajax.reload();
    });

    // Pencarian Nama/NIM
    $('#searchMahasiswa').on('keyup', function () {
      table.search(this.value).draw();
    });
  });
</script>
@endsection
