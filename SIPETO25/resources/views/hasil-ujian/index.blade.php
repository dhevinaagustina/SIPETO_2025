@extends('layouts.template') {{-- sesuaikan dengan nama layout kamu --}}

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

    .badge-success {
        background-color: #4CAF50;
        font-weight: 600;
    }

    .badge-danger {
        background-color: #E53935;
        font-weight: 600;
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

    h3 {
        color: #29335C;
        font-weight: 700;
    }
</style>

<div class="custom-table-wrapper">
    <h3 class="mb-4">Rekapan Nilai</h3>
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
                <tr>
                    <td>12050725</td>
                    <td>7 Mei 2025</td>
                    <td>240</td>
                    <td>220</td>
                    <td>460</td>
                    <td><span class="badge badge-danger">Gagal</span></td>
                </tr>
                <tr>
                    <td>12051225</td>
                    <td>12 Mei 2025</td>
                    <td>480</td>
                    <td>375</td>
                    <td><strong>855</strong></td>
                    <td><span class="badge badge-success">Berhasil</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
