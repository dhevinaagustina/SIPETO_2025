<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran TOEIC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h4>Detail Pendaftaran TOEIC</h4>
        <hr>
        
        <div class="mb-3">
            <strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa }}<br>
            <strong>NIM:</strong> {{ $mahasiswa->nim }}<br>
            <strong>Jurusan:</strong> {{ $mahasiswa->jurusan }}<br>
            <strong>Prodi:</strong> {{ $mahasiswa->prodi }}
        </div>

        <div class="mb-3">
            <strong>Tipe Ujian:</strong> {{ $pendaftaran->tipe_ujian }}<br>
            <strong>NIK:</strong> {{ $pendaftaran->nik }}<br>
            <strong>No. WhatsApp:</strong> {{ $pendaftaran->no_wa }}<br>
            <strong>Alamat Asal:</strong> {{ $pendaftaran->alamat_asal }}<br>
            <strong>Alamat Sekarang:</strong> {{ $pendaftaran->alamat_sekarang }}<br>
            <strong>Tanggal Daftar:</strong> {{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}
        </div>

        <div class="mb-3">
            <strong>Scan KTM:</strong><br>
            <img src="{{ asset($pendaftaran->scan_ktm) }}" alt="KTM" width="200" class="img-thumbnail mb-2"><br>

            <strong>Scan KTP:</strong><br>
            <img src="{{ asset($pendaftaran->scan_ktp) }}" alt="KTP" width="200" class="img-thumbnail mb-2"><br>

            <strong>Pas Foto:</strong><br>
            <img src="{{ asset($pendaftaran->pas_foto) }}" alt="Pas Foto" width="200" class="img-thumbnail mb-2"><br>
        </div>

        <a href="{{ route('cekdata.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
