@extends('layouts-mahasiswa.template')

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

    @media (max-width: 768px) {
        .custom-table-wrapper {
            padding: 0 10px;
        }

        th, td {
            padding: 10px 12px !important;
        }

        .status-badge {
            padding: 4px 8px;
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
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Status Pendaftaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayat as $row)
                    <tr>
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
                        <td colspan="4" class="text-muted py-4">
                            <i class="fas fa-info-circle mr-2"></i>Belum ada data riwayat ujian
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
