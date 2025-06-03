@extends('layouts-admin.template')

@section('content')
<style>
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
    .filter-container {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
    }
    .entries-dropdown {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 180px; 
        flex: 1; 
    }
    .entries-dropdown select {
        width: 10%; 
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }
    #filterStatus {
        min-width: 200px; 
        flex: 0.5; 
        padding: 8px;
    }
    #searchMahasiswa {
        min-width: 250px; 
        flex: 0.5; 
        padding: 8px;
    }
    @media (max-width: 768px) {
        .filter-container {
            flex-direction: column;
            gap: 8px;
        }
        .entries-dropdown, 
        #filterStatus, 
        #searchMahasiswa {
            width: 100%;
            min-width: unset;
            flex: none;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="filter-container mb-3">
            <div class="entries-dropdown">
                <span>Tampilkan</span>
                <select id="entriesSelect" name="entriesSelect" class="form-control">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span>entri</span>
            </div>

            <select id="filterStatus" name="filterStatus" class="form-control">
                <option value="">Filter</option>
                <option value="sudah">Sudah Daftar</option>
                <option value="belum">Belum Daftar</option>
            </select>

            <input type="text" id="searchMahasiswa" name="searchMahasiswa" class="form-control" placeholder="Cari mahasiswa">
        </div>
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
                {{-- Data will be loaded by DataTable --}}
            </tbody>
        </table> 
        <br>
    </div>
</section>

@push('js')
<script>
    $(document).ready(function () {
        let table = $('#mahasiswaTable').DataTable({
            dom: 'tp',
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ route('cekdata.getdata') }}",
                data: function (d) {
                    d.status = $('#filterStatus').val();
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
                emptyTable: "Tidak ada data tersedia",
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

        $('#filterStatus').on('change', function () {
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