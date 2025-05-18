@extends('layouts.template') {{-- sesuaikan dengan nama layout kamu --}}

@section('content')
<style>
    /* Header tabel warna biru */
    thead.custom-blue {
        background-color: #29335C;
        color: white;
    }

    /* Hover efek untuk baris */
    tbody tr:hover {
        background-color: #f0f4ff;
        cursor: pointer;
    }

    /* Styling badge */
    .badge-success {
        background-color: #4CAF50;
        font-weight: 600;
    }

    .badge-danger {
        background-color: #E53935;
        font-weight: 600;
    }

    /* Table border radius dan shadow */
    table {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(41, 51, 92, 0.2);
    }
</style>

<div class="container">
    <h3 class="mb-4" style="color: #29335C; font-weight: 700;">Rekapan Nilai</h3>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
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
