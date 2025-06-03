<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pendaftaran TOEIC</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        h3 {
            text-align: center;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td, th {
            border: 1px solid black;
            padding: 6px 10px;
        }

        .text-center {
            text-align: center;
        }

        .d-block {
            display: block;
        }

        .image {
            width: auto;
            height: 80px;
            max-width: 150px;
        }

        .font-10 { font-size: 10pt; }
        .font-11 { font-size: 11pt; }
        .font-13 { font-size: 13pt; }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

    <h3 class="text-center">LAPORAN DATA PENDAFTARAN TOEIC</h3>

    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="15%">NIM</th>
                <th width="25%">Nama</th>
                <th width="25%">Email</th>
                <th width="15%">Tanggal Daftar</th>
                <th width="15%">Status TOEIC</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($mahasiswa as $mhs)
        <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>{{ $mhs['nim'] }}</td>
            <td>{{ $mhs['nama'] }}</td>
            <td>{{ $mhs['email'] }}</td>
            <td>{{ \Carbon\Carbon::parse($mhs['tanggal_daftar'])->format('d/m/Y') }}</td>
            <td>{{ $mhs['status'] }}</td>
        </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
