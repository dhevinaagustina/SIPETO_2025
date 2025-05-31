@extends('layouts-admin.template')

@section('content')
<style>
    .table-custom {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #fff;
        border-collapse: collapse;
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
        text-align: center;
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
        margin-bottom: 15px;
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
    .dataTables_paginate {
        display: none; /* Hide default DataTables pagination */
    }
    .pagination-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }
    .pagination {
        margin: 0;
    }
</style>

<section class="content">
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        {{-- FILTER + SEARCH --}}
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

            <select id="filterStatus" name="filterStatus" class="form-control">
                <option value="">Semua Status</option>
                <option value="selesai">Selesai</option>
                <option value="diajukan">Diajukan</option>
            </select>
            
            <input type="text" id="searchInput" name="searchInput" class="form-control" placeholder="Cari...">
        </div>

        <table id="tableSurat" class="table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>File Surat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $item->mahasiswa->nim }}</td>
                        <td>{{ $item->mahasiswa->prodi }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}</td>
                        <td>
                            @if ($item->status === 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-warning text-dark">Diajukan</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->file_surat)
                                <a href="{{ asset('storage/' . $item->file_surat) }}" class="btn btn-sm btn-outline-success" target="_blank">Lihat</a>
                            @else
                                <span class="text-muted">Belum tersedia</span>
                            @endif
                        </td>
                        <td>
                            @if (!$item->file_surat)
                                <a href="{{ route('admin.surat_pernyataan.generate', $item->id) }}" class="btn btn-sm btn-primary">
                                    Generate Surat
                                </a>
                            @else
                                 <button class="btn btn-sm btn-secondary" disabled>Sudah dibuat</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Custom Pagination -->
        <div class="pagination-container">
            <nav aria-label="Page navigation">
                <ul class="pagination" id="customPagination">
                    <li class="page-item" id="prevPage"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item" id="nextPage"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>

@section('scripts')
    {{-- DataTables & jQuery --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#tableSurat').DataTable({
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
                },
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                pagingType: "full_numbers",
                dom: '<"top"lf>rt<"bottom"ip>',
                initComplete: function() {
                    // Hide default DataTables pagination
                    $('.dataTables_paginate').hide();
                    
                    // Initialize custom pagination
                    updateCustomPagination();
                },
                drawCallback: function() {
                    updateCustomPagination();
                }
            });

            // Function to update custom pagination
            function updateCustomPagination() {
                var info = table.page.info();
                var pagination = $('#customPagination');
                pagination.empty();
                
                // Previous button
                pagination.append(
                    '<li class="page-item" id="prevPage">' +
                    '<a class="page-link" href="#" aria-label="Previous">' +
                    '<span aria-hidden="true">Previous</span>' +
                    '</a></li>'
                );
                
                // Page numbers
                var start = Math.max(1, info.page - 2);
                var end = Math.min(info.pages, info.page + 2);
                
                if (info.page > 3) {
                    pagination.append(
                        '<li class="page-item"><a class="page-link" href="#">1</a></li>' +
                        '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>'
                    );
                }
                
                for (var i = start; i <= end; i++) {
                    var active = i === info.page + 1 ? 'active' : '';
                    pagination.append(
                        '<li class="page-item ' + active + '">' +
                        '<a class="page-link" href="#">' + i + '</a></li>'
                    );
                }
                
                if (info.page < info.pages - 3) {
                    pagination.append(
                        '<li class="page-item disabled"><a class="page-link" href="#">...</a></li>' +
                        '<li class="page-item"><a class="page-link" href="#">' + info.pages + '</a></li>'
                    );
                }
                
                // Next button
                pagination.append(
                    '<li class="page-item" id="nextPage">' +
                    '<a class="page-link" href="#" aria-label="Next">' +
                    '<span aria-hidden="true">Next</span>' +
                    '</a></li>'
                );
                
                // Enable/disable Previous/Next buttons
                $('#prevPage').toggleClass('disabled', !info.hasPrevious);
                $('#nextPage').toggleClass('disabled', !info.hasNext);
            }
            
            // Handle custom pagination clicks
            $('#customPagination').on('click', 'a.page-link', function(e) {
                e.preventDefault();
                var li = $(this).parent();
                
                if (li.is('#prevPage')) {
                    table.page('previous').draw('page');
                } else if (li.is('#nextPage')) {
                    table.page('next').draw('page');
                } else if (!li.hasClass('disabled') && !li.hasClass('active')) {
                    var pageNum = parseInt($(this).text());
                    table.page(pageNum - 1).draw('page');
                }
            });

            // Change entries per page
            $('#entriesSelect').on('change', function() {
                table.page.len($(this).val()).draw();
            });

            // Filter by status
            $('#filterStatus').on('change', function() {
                var status = $(this).val();
                if (status === '') {
                    table.columns(5).search('').draw();
                } else {
                    table.columns(5).search(status).draw();
                }
            });

            // Search input
            $('#searchInput').on('keyup', function() {
                table.search($(this).val()).draw();
            });

            // Initialize entries select with current value
            $('#entriesSelect').val(table.page.len());
        });
    </script>
@endsection
@endsection