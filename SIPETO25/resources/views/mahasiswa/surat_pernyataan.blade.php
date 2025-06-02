@extends('layouts-mahasiswa.template')

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
        background-color: #f44336;
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
        color: #fff 
    }
    .btn-primary-custom:hover {
        background-color: #1f294a;
        border-color: #1f294a;
        color: #fff 
    }
    .btn-info-custom {
        background-color: #2196F3;
        border-color: #2196F3;
        color: #fff 
    }
    .btn-info-custom:hover {
        background-color: #0b7dda;
        border-color: #0a78d1;
        color: #fff 
    }
    .filter-container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 20px;
        gap: 10px;
    }

    .entries-filter-group {
        display: flex;
        align-items: center;
        gap: 28px;
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

    #filterStatus {
        width: 300px;
        padding: 6px;
        margin-left: 0;
    }

    .action-buttons {
        margin-left: auto;
    }

    @media (max-width: 768px) {
        .filter-container {
            flex-direction: row;
            gap: 8px;
        }
        
        .entries-filter-group {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }
        
        .entries-dropdown, 
        #filterStatus {
            width: 100%;
        }
        
        .action-buttons {
            width: 100%;
            margin-left: 0;
            margin-top: 8px;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="filter-container">
            <div class="entries-filter-group">
                <div class="entries-dropdown">
                    <span>Tampilkan</span>
                    <select id="entriesSelect" name="entriesSelect" class="form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="-1">Semua</option>
                    </select>
                    <span>entri</span>
                </div>

                <select id="filterStatus" class="form-control">
                    <option value="">Filter</option>
                    <option value="selesai">Selesai</option>
                    <option value="proses">Proses</option>
                </select>
            </div>

            <div class="action-buttons">
                <button id="btnCekAjukan" class="btn btn-primary-custom">Ajukan</button>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table-custom" id="pengajuanTable">
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($daftarSurat) && count($daftarSurat) > 0)
                    @foreach ($daftarSurat as $i => $surat)
                        <tr data-status="{{ $surat->status }}">
                            <td>{{ $i + 1 }}</td>
                            <td>{{ auth('mahasiswa')->user()->nim }}</td>
                            <td>{{ auth('mahasiswa')->user()->nama_mahasiswa }}</td>
                            <td>{{ \Carbon\Carbon::parse($surat->tanggal_pengajuan)->translatedFormat('d F Y') }}</td>
                            <td>
                                <span class="status-badge badge-{{ $surat->status === 'selesai' ? 'selesai' : 'proses' }}">
                                    {{ $surat->status === 'selesai' ? 'Selesai' : 'Proses' }}
                                </span>
                            </td>
                            <td>
                                @if ($surat->file_surat)
                                    <a href="{{ Storage::url($surat->file_surat) }}" class="btn btn-sm btn-info-custom" target="_blank">Lihat</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="no-data">
                            Belum ada pengajuan surat
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to filter the table
    function filterTable() {
        const status = $('#filterStatus').val().toLowerCase();
        const rowsPerPage = parseInt($('#entriesSelect').val());
        let visibleRows = 0;
        
        $('#pengajuanTable tbody tr').each(function() {
            const rowStatus = $(this).data('status');
            const statusMatch = status === '' || rowStatus === status;
            
            if (statusMatch && !$(this).hasClass('no-data-row')) {
                $(this).show();
                visibleRows++;
                // Hide rows beyond the current page limit
                if (rowsPerPage > 0 && visibleRows > rowsPerPage) {
                    $(this).hide();
                }
            } else {
                $(this).hide();
            }
        });
        
        // Show no data message if no rows visible
        if (visibleRows === 0) {
            // Remove existing no-data message if any
            $('#pengajuanTable tbody .no-data-row').remove();
            
            $('#pengajuanTable tbody').append(
                '<tr class="no-data-row"><td colspan="6" class="no-data">' +
                'Tidak ada data yang sesuai dengan filter' +
                '</td></tr>'
            );
        } else {
            $('#pengajuanTable tbody .no-data-row').remove();
        }
    }
    
    // Event listeners
    $('#filterStatus').on('change', function() {
        filterTable();
    });
    
    $('#entriesSelect').on('change', function() {
        filterTable();
    });
    
    // Initial filter
    filterTable();

    // Original button functionality
    const btnCekAjukan = document.getElementById('btnCekAjukan');

    btnCekAjukan.addEventListener('click', function () {
        fetch("{{ route('mahasiswa.surat_pernyataan.cek') }}", {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                Swal.fire({
                    title: 'Konfirmasi Pengajuan',
                    html: 'Pastikan Anda adalah <strong>mahasiswa tingkat akhir</strong> atau <strong>mahasiswa yang benar-benar membutuhkan surat pernyataan ini</strong>.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Saya Mengerti',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom mx-2',
                        cancelButton: 'btn btn-secondary mx-2'
                    },
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        ajukanSurat();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: data.message,
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom'
                    },
                    buttonsStyling: false
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Silakan coba lagi nanti.',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary-custom'
                },
                buttonsStyling: false
            });
        });
    });

    function ajukanSurat() {
        fetch("{{ route('mahasiswa.surat_pernyataan.ajukan') }}", {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message,
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom'
                    },
                    buttonsStyling: false
                }).then(() => location.reload());
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: data.message,
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom'
                    },
                    buttonsStyling: false
                });
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Silakan coba lagi nanti.',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary-custom'
                },
                buttonsStyling: false
            });
        });
    }
});
</script>
@endpush

@endsection