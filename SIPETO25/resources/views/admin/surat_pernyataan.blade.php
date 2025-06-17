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
    .table-custom tbody tr:hover {
        background-color: #f0f4ff;
        cursor: pointer;
    }
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 16px;
        font-size: 14px;
        font-weight: 500;
        color: white;
        text-align: center;
        min-width: 80px;
    }
    .badge-selesai {
        background-color: #4CAF50;
    }
    .badge-proses {
        background-color: #ffbc02;
    }
    .badge-ditolak {
        background-color: #f44336;
    }
    .badge-diajukan {
        background-color: #2196F3;
    }
    .no-data {
        color: #6c757d;
        padding: 20px;
        text-align: center;
        font-style: italic;
    }
    .btn-primary-custom {
        background-color: #29335C;
        border-color: #29335C;
        color: #fff;
    }
    .btn-primary-custom:hover {
        background-color: #1f294a;
        border-color: #1f294a;
        color: #fff;
    }
    .btn-info-custom {
        background-color: #2196F3;
        border-color: #2196F3;
        color: #fff;
    }
    .btn-info-custom:hover {
        background-color: #0b7dda;
        border-color: #0a78d1;
        color: #fff;
    }
    .btn-success-custom {
        background-color: #4CAF50;
        border-color: #4CAF50;
        color: #fff;
    }
    .btn-success-custom:hover {
        background-color: #3e8e41;
        border-color: #3e8e41;
        color: #fff;
    }
    .pagination .page-item.active .page-link {
        background-color: #29335C;
        border-color: #29335C;
        color: white;
    }
    
    .pagination .page-link {
        color: #29335C;
    }
    
    .pagination .page-link:hover {
        color: #1f294a;
    }
    /* New filter layout styles */
    .filter-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 20px;
        width: 100%;
    }
    .left-filter-group {
        display: flex;
        align-items: center;
    }
    .right-filter-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: auto;
    }
    .entries-dropdown {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .entries-dropdown select {
        width: 60px;
        padding: 6px;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }
    #filterStatus, #searchInput {
        width: 360px;
        padding: 6px;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }
    @media (max-width: 768px) {
        .filter-wrapper {
            flex-direction: column;
            gap: 10px;
        }
        .left-filter-group,
        .right-filter-group {
            width: 100%;
        }
        .right-filter-group {
            margin-left: 0;
            flex-direction: column;
            gap: 10px;
        }
        #filterStatus, #searchInput {
            width: 100%;
        }
        .entries-dropdown {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="filter-wrapper">
            <div class="left-filter-group">
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
            </div>
            
            <div class="right-filter-group">
                <select id="filterStatus" name="filterStatus" class="form-control">
                    <option value="">Filter</option>
                    <option value="diajukan">Diajukan</option>
                    <option value="selesai">Selesai</option>
                    <option value="ditolak">Ditolak</option>
                </select>
                
                <input type="text" id="searchInput" name="searchInput" class="form-control" placeholder="Cari mahasiswa">
            </div>
        </div>

        <table id="tableSurat" class="table-custom">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Mahasiswa</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Prodi</th>
                    <th class="text-center">Tanggal Pengajuan</th>
                    <th class="text-center">Lampiran</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">File Surat</th>
                    <th class="text-center">Validasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr data-status="{{ strtolower($item->status) }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $item->mahasiswa->nim }}</td>
                        <td>{{ $item->mahasiswa->prodi }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.surat_pernyataan.lampiran', $item->id) }}" class="btn btn-sm btn-primary-custom">
                                Cek Lampiran
                            </a>
                        </td>
                        <td>
                            @if ($item->status === 'selesai')
                                <span class="status-badge badge-selesai">Selesai</span>
                            @elseif ($item->status === 'ditolak')
                                <span class="status-badge badge-ditolak">Ditolak</span>
                            @else
                                <span class="status-badge badge-diajukan">Diajukan</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->file_surat)
                                <a href="{{ asset('storage/' . $item->file_surat) }}" class="btn btn-sm btn-info-custom" target="_blank">Lihat</a>
                            @else
                                <span class="text-muted">Belum tersedia</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->status === 'selesai' || $item->status === 'ditolak')
                                <button type="button" class="btn btn-secondary btn-sm" disabled title="Surat telah divalidasi">
                                    <i class="fas fa-check-circle"></i> Sudah divalidasi
                                </button>
                            @else
                                <button type="button" class="btn btn-success-custom btn-sm btn-validasi" 
                                    data-id="{{ $item->id }}" 
                                    data-nama="{{ $item->mahasiswa->nama_mahasiswa }}">
                                    <i class="fas fa-check"></i> Validasi
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- Modal Validasi -->
<div class="modal fade" id="modalValidasi" tabindex="-1" role="dialog" aria-labelledby="modalValidasiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formValidasi" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="id" id="validasiId">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalValidasiLabel">Validasi Pengajuan Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Validasi pengajuan atas nama <strong id="namaMahasiswaValidasi"></strong></p>
                <div class="form-group">
                    <label>Status Validasi</label>
                    <select class="form-control" name="status_validasi" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="disetujui">Disetujui</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Catatan (jika ditolak)</label>
                    <textarea class="form-control" name="catatan_validasi" rows="3" placeholder="Opsional, jika ditolak."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary-custom">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </form>
  </div>
</div>

@push('js')
    {{-- DataTables & jQuery --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // Inisialisasi DataTable dengan konfigurasi minimal
            var table = $('#tableSurat').DataTable({
                "dom": '<"top"i>rt<"bottom"lp>',
                "paging": true,
                "lengthChange": false, 
                "searching": false,    
                "ordering": false,     
                "info": false,         
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    }
                }
            });

            // Set nilai awal filter status dari URL
            var urlParams = new URLSearchParams(window.location.search);
            var statusParam = urlParams.get('status');
            if (statusParam) {
                $('#filterStatus').val(statusParam);
                filterTable();
            }

            // Filter jumlah entri
            $('#entriesSelect').on('change', function () {
                table.page.len(parseInt($(this).val())).draw();
                filterTable();
            });

            // Filter status
            $('#filterStatus').on('change', function () {
                var status = $(this).val();
                
                // Update URL dengan parameter status
                var url = new URL(window.location.href);
                if (status) {
                    url.searchParams.set('status', status);
                } else {
                    url.searchParams.delete('status');
                }
                window.history.pushState({}, '', url);
                
                filterTable();
            });

            // Input pencarian
            $('#searchInput').on('keyup', function () {
                filterTable();
            });

            // Fungsi untuk filter manual
            function filterTable() {
                var status = $('#filterStatus').val().toLowerCase();
                var searchText = $('#searchInput').val().toLowerCase();
                
                table.rows().every(function() {
                    var row = this.node();
                    var rowStatus = $(row).data('status');
                    var rowText = $(row).text().toLowerCase();
                    
                    var statusMatch = !status || rowStatus === status;
                    var searchMatch = !searchText || rowText.includes(searchText);
                    
                    $(row).toggle(statusMatch && searchMatch);
                });
                
                // Perbarui nomor urut setelah filter
                updateRowNumbers();
            }

            // Fungsi untuk update nomor urut
            function updateRowNumbers() {
                var visibleRows = table.rows({ search: 'applied' }).nodes().to$().filter(':visible');
                visibleRows.each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            // Set nilai awal entri select
            $('#entriesSelect').val(table.page.len());

            // Tombol validasi klik
            $(document).on('click', '.btn-validasi', function () {
                var id = $(this).data('id');
                var nama = $(this).data('nama');

                $('#validasiId').val(id);
                $('#namaMahasiswaValidasi').text(nama);

                var routeTemplate = "{{ route('admin.surat_pernyataan.validasi', ['id' => '__id__']) }}";
                var routeAction = routeTemplate.replace('__id__', id);
                $('#formValidasi').attr('action', routeAction);

                $('#modalValidasi').modal('show');
            });

            // Validasi form sebelum submit
            $('#formValidasi').on('submit', function (e) {
                e.preventDefault();

                const status = $('select[name="status_validasi"]').val().trim();
                const catatan = $('textarea[name="catatan_validasi"]').val().trim();

                if (status === 'ditolak' && catatan === '') {
                    alert('Silakan isi catatan alasan penolakan.');
                    return;
                }

                this.submit();
            });
        });
    </script>
@endpush
@endsection