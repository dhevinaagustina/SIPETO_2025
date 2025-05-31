<!DOCTYPE html>
@extends('layouts-admin.template')


@section('content')
<style>
    .card-header-custom {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        padding: 15px 20px;
    }
    .table-custom {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #fff;
        border-collapse: collapse;
        text-align: center;
        border: 1px solid #29335C;
    }
    .table-custom th, 
    .table-custom td {
        border: 1px solid #29335C;
        padding: 12px;
    }
    .table-custom thead th {
        background-color: #29335C;
        color: #fff;
    }
    .table-custom tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    .search-box {
        position: relative;
    }
    .search-box i {
        position: absolute;
        right: 10px;
        top: 10px;
        color: #6c757d;
    }
    .entries-info {
        color: #6c757d;
        margin-bottom: 15px;
    }
    .footer-text {
        text-align: center;
        color: #6c757d;
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid #dee2e6;
    }
    .pagination .page-item.active .page-link {
        background-color: #29335C;
        border-color: #dee2e6;
        color: #fff;
    }
    .pagination .page-link {
        color: #29335C;
    }
    .btn-dokumen {
        background-color: transparent;
        border: 1px solid #dee2e6;
        color: #495057;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-dokumen:hover {
        background-color: #f8f9fa;
    }
    .filter-container {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
    }
    .filter-container .form-control {
        flex: 1;
        min-width: 150px;
    }
    .entries-dropdown {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .entries-dropdown select {
        width: 80px;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }
    @media (max-width: 768px) {
        .filter-container {
            flex-direction: column;
            align-items: stretch;
        }
        .entries-dropdown {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>

<section class="content">
  <div class="container-fluid">
    {{-- FILTER + EXPORT --}}
    <div class="filter-container">
        <div class="entries-dropdown">
            <span>Show</span>
            <select id="entriesSelect" name="entriesSelect" class="form-control">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>entries</span>
        </div>

        <select id="filterJurusan" name="filterJurusan" class="form-control">
            <option value="">Filter</option>
            <option>Teknologi Informasi</option>
            <option>Teknik Kimia</option>
            <option>Teknik Elektro</option>
            <option>Teknik Mesin</option>
            <option>Teknik Sipil</option>
            <option>Akuntansi</option>
            <option>Administrasi Niaga</option>
        </select>
            
        <input type="text" id="searchMahasiswa" name="searchMahasiswa" class="form-control" placeholder="Cari mahasiswa">
    </div>
    <br>
    <div class="card">
      <div class="card-body">
        {{-- Table --}}
        <table id="mahasiswaTable" class="table-custom">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Prodi</th>
              <th>Dokumen</th>
            </tr>
          </thead>
          <tbody>
           {{-- Data di-load via AJAX --}}
          </tbody>
        </table>
        
        <div class="mt-3">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>


@push('scripts')
<script>
$(document).ready(function () {
    let table = $('#mahasiswaTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('cekdata.data') }}",
            data: function (d) {
                d.jurusan = $('#filterJurusan').val();
                d.searchMahasiswa = $('#searchMahasiswa').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nim', name: 'nim' },
            { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
            { data: 'jurusan', name: 'jurusan' },
            { data: 'prodi', name: 'prodi' },
            { data: 'dokumen', name: 'dokumen', orderable: false, searchable: false },
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

    $('#entriesSelect').on('change', function () {
        table.page.len($(this).val()).draw();
    });

    table.on('length.dt', function (e, settings, len) {
        $('#entriesSelect').val(len);
    });
});
</script>
@endpush
@endsection