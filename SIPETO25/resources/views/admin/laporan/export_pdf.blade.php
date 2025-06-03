<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Laporan Data Pendaftaran TOEIC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid black;
            padding: 6px 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;

    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            padding: 4px 3px;
        }
        th {
            text-align: left;
        }
        .d-block {
            display: block;
        }
        img.image {
            width: auto;
            height: 80px;
            max-width: 150px;
            max-height: 150px;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .p-1 {
            padding: 5px 1px;
        }
        .font-10 {
            font-size: 10pt;
        }
        .font-11 {
            font-size: 11pt;
        }
        .font-12 {
            font-size: 12pt;
        }
        .font-13 {
            font-size: 13pt;
        }
        .border-bottom-header {
            border-bottom: 1px solid;
        }
        .border-all,
        .border-all th,
        .border-all td {
            border: 1px solid;

        }
    </style>
</head>
<body>


    <h2>Laporan Data Pendaftaran TOEIC</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Status TOEIC</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($data as $mahasiswa)
                @foreach ($mahasiswa->pendaftaranToeic as $pendaftaran)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($pendaftaran->created_at)->format('d/m/Y') }}</td>
                        <td>Terdaftar</td>
                    </tr>
                @endforeach

    <table class="border-bottom-header">
        <tr>
            <td width="15%" class="text-center">
                <img src="{{ asset('polinema-bw.png') }}" class="image">
            </td>
            <td width="85%">
                <span class="text-center d-block font-11 font-bold mb-1">
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI
                </span>
                <span class="text-center d-block font-13 font-bold mb-1">
                    POLITEKNIK NEGERI MALANG
                </span>
                <span class="text-center d-block font-10">
                    Jl. Soekarno-Hatta No. 9 Malang 65141
                </span>
                <span class="text-center d-block font-10">
                    Telepon (0341) 404424 Pes. 101-105, 0341-404420, Fax. (0341) 404420
                </span>
                <span class="text-center d-block font-10">
                    Laman: www.polinema.ac.id
                </span>
            </td>
        </tr>
    </table>

    <h3 class="text-center">LAPORAN DATA MAHASISWA TOEIC</h3>

    <table class="border-all">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="15%">NIM</th>
                <th width="25%">Nama</th>
                <th width="25%">Email</th>
                <th width="15%">Tanggal Daftar</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $m)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $m['nim'] }}</td>
                <td>{{ $m['nama'] }}</td>
                <td>{{ $m['email'] }}</td>
                <td>{{ \Carbon\Carbon::parse($m['tanggal_daftar'])->format('d/m/Y') }}</td>
                <td>{{ $m['status'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
</html>

