@extends('layouts-admin.template')

@section('title', 'Detail Pendaftaran TOEIC')

@section('content')
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
        <strong>Tipe Ujian:</strong> {{ ucfirst($pendaftaran->tipe_ujian) }}<br>
        <strong>NIK:</strong> {{ $pendaftaran->nik }}<br>
        <strong>No. WhatsApp:</strong> {{ $pendaftaran->no_wa }}<br>
        <strong>Alamat Asal:</strong> {{ $pendaftaran->alamat_asal }}<br>
        <strong>Alamat Sekarang:</strong> {{ $pendaftaran->alamat_sekarang }}<br>
        <strong>Tanggal Daftar:</strong> {{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}
    </div>

    <div class="mb-3">
        <strong>Scan KTM:</strong><br>
        @if($pendaftaran->scan_ktm)
            <img src="{{ asset('storage/' . $pendaftaran->scan_ktm) }}" alt="KTM" width="200" class="img-thumbnail mb-2"><br>
        @else
            <span class="text-danger">Belum diunggah</span><br>
        @endif

        <strong>Scan KTP:</strong><br>
        @if($pendaftaran->scan_ktp)
            <img src="{{ asset('storage/' . $pendaftaran->scan_ktp) }}" alt="KTP" width="200" class="img-thumbnail mb-2"><br>
        @else
            <span class="text-danger">Belum diunggah</span><br>
        @endif

        <strong>Pas Foto:</strong><br>
        @if($pendaftaran->pas_foto)
            <img src="{{ asset('storage/' . $pendaftaran->pas_foto) }}" alt="Pas Foto" width="200" class="img-thumbnail mb-2"><br>
        @else
            <span class="text-danger">Belum diunggah</span><br>
        @endif
    </div>

    <a href="{{ route('cekdata.index') }}" class="btn btn-secondary">← Kembali</a>
</div>
@endsection
