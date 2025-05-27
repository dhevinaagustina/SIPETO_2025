@extends('layouts-mahasiswa.template') {{-- sesuaikan dengan nama layout kamu --}}

@section('content')
<style>
    thead.custom-blue {
        background-color: #29335C;
        color: white;
    }

    tbody tr:hover {
        background-color: #f0f4ff;
        cursor: pointer;
    }

    /* Melebarkan tabel */
    .custom-table-wrapper {
        width: 100%;
        padding: 0 30px;
    }

    table {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(41, 51, 92, 0.2);
    }

    th, td {
        padding: 14px 20px !important;
        vertical-align: middle !important;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 15px;
        font-weight: 500;
        color: white;
        text-align: center;
        min-width: 80px;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .bg-success {
        background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%);
    }

    .bg-failed {
        background: linear-gradient(135deg, #F44336 0%, #C62828 100%);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .custom-table-wrapper {
            padding: 0 10px;
        }
        
        th, td {
            padding: 10px 12px !important;
            font-size: 14px;
        }
        
        .status-badge {
            padding: 4px 12px;
            min-width: 70px;
            font-size: 12px;
        }
    }
</style>

<div class="custom-table-wrapper">
    <div class="table-responsive">
        <table class="table table-bordered text-center w-100">
            <thead class="custom-blue">
                <tr>
                    <th>ID Ujian</th>
                    <th>Tanggal Ujian</th>
                    <th>Nilai Listening</th>
                    <th>Nilai Reading</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hasilUjian as $hasil)
                    <tr>
                        <td>{{ $hasil->id_ujian }}</td>
                        <td>{{ \Carbon\Carbon::parse($hasil->tanggal_ujian)->format('d M Y') }}</td>
                        <td>{{ $hasil->nilai_listening }}</td>
                        <td>{{ $hasil->nilai_reading }}</td>
                        <td>{{ $hasil->nilai_listening + $hasil->nilai_reading }}</td>
                        <td>
                            @if(($hasil->nilai_listening + $hasil->nilai_reading) >= $hasil->passing_grade)
                                <span class="status-badge bg-success">Lulus</span>
                            @else
                                <span class="status-badge bg-failed">Gagal</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-muted py-4">
                            <i class="fas fa-info-circle mr-2"></i>Belum ada data hasil ujian
                        </td>
                    </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
