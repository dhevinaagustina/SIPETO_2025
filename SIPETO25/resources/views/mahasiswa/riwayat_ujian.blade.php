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
    .badge-gratis {
        background-color: #4CAF50;
    }
    .badge-mandiri {
        background-color: #2196F3;
    }
    .no-data {
        color: #6c757d;
        padding: 20px;
        text-align: center;
    }
    .filter-container {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .entries-dropdown {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 180px; 
        flex: 1; 
    }
    .entries-dropdown select {
        width: 6%; 
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }
    #filterStatus {
        min-width: 200px; 
        flex: 0.3; 
        padding: 8px;
    }
    @media (max-width: 768px) {
        .filter-container {
            flex-direction: column;
            gap: 8px;
        }
        .entries-dropdown, 
        #filterStatus {
            width: 100%;
            min-width: unset;
            flex: none;
        }
        .status-badge {
            padding: 4px 8px;
            min-width: 70px;
            font-size: 12px;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="filter-container">
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

            <select id="filterStatus" class="form-control">
                <option value="">Filter</option>
                <option value="gratis">Gratis</option>
                <option value="mandiri">Mandiri</option>
            </select>
        </div>

        <table class="table-custom" id="riwayatTable">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Status Pendaftaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayat as $row)
                    <tr data-status="{{ $row->tipe_ujian }}">
                        <td>{{ $row->nim }}</td>
                        <td>{{ $row->nama_mahasiswa }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->tanggal_pendaftaran)->translatedFormat('d F Y') }}</td>
                        <td>
                            @if($row->tipe_ujian === 'gratis')
                                <span class="status-badge badge-gratis">Gratis</span>
                            @elseif($row->tipe_ujian === 'mandiri')
                                <span class="status-badge badge-mandiri">Mandiri</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="no-data">
                            <i class="fas fa-info-circle mr-2"></i>Belum ada data riwayat ujian
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@push('js')
<script>
$(document).ready(function() {
    // Function to filter the table
    function filterTable() {
        const status = $('#filterStatus').val().toLowerCase();
        const rowsPerPage = parseInt($('#entriesSelect').val());
        let visibleRows = 0;
        
        $('#riwayatTable tbody tr').each(function() {
            const rowStatus = $(this).data('status');
            const statusMatch = status === '' || rowStatus === status;
            
            if (statusMatch) {
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
            $('#riwayatTable tbody').append(
                '<tr><td colspan="4" class="no-data">' +
                '<i class="fas fa-info-circle mr-2"></i>Tidak ada data yang sesuai dengan filter' +
                '</td></tr>'
            );
        } else {
            $('#riwayatTable tbody .no-data').remove();
        }
    }
    
    // Function for pagination
    function updatePagination() {
        const rowsPerPage = parseInt($('#entriesSelect').val());
        if (rowsPerPage > 0) {
            let visibleCount = 0;
            $('#riwayatTable tbody tr').each(function() {
                if ($(this).is(':visible')) {
                    visibleCount++;
                    if (visibleCount > rowsPerPage) {
                        $(this).hide();
                    }
                }
            });
        } else {
            // Show all rows if "All" is selected
            $('#riwayatTable tbody tr').show();
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
});
</script>
@endpush

@endsection