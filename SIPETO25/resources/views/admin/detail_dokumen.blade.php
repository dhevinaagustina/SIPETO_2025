@extends('layouts-admin.template')

@section('title', 'Detail Pendaftaran TOEIC')

@section('content')
<div class="container py-4">
    <h4>Detail Pendaftaran TOEIC</h4>
    <hr>

    {{-- Informasi Mahasiswa --}}
    <div class="mb-3">
        <strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa }}<br>
        <strong>NIM:</strong> {{ $mahasiswa->nim }}<br>
        <strong>Jurusan:</strong> {{ $mahasiswa->jurusan }}<br>
        <strong>Prodi:</strong> {{ $mahasiswa->prodi }}
    </div>

    {{-- Informasi Pendaftaran --}}
    <div class="mb-3">
        <strong>Tipe Ujian:</strong> {{ ucfirst($pendaftaran->tipe_ujian) }}<br>
        <strong>NIK:</strong> {{ $pendaftaran->nik ?? '-' }}<br>
        <strong>No. WhatsApp:</strong> {{ $pendaftaran->no_wa ?? '-' }}<br>
        <strong>Alamat Asal:</strong> {{ $pendaftaran->alamat_asal ?? '-' }}<br>
        <strong>Alamat Sekarang:</strong> {{ $pendaftaran->alamat_sekarang ?? '-' }}<br>
        <strong>Tanggal Daftar:</strong> {{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}
    </div>

    {{-- Dokumen Gambar --}}
    <h5 class="mt-4">Dokumen Pendaftaran</h5>
    <div class="row">
        @php
            $dokumen = [
        ['label' => 'Kartu Tanda Penduduk (KTP)', 'field' => 'scan_ktp'],
        ['label' => 'Kartu Tanda Mahasiswa (KTM)', 'field' => 'scan_ktm'],
        ['label' => 'Pas Foto (3x4)', 'field' => 'pas_foto'],
    ];
@endphp

<div class="row">
@foreach ($dokumen as $item)
    @php
        switch ($item['field']) {
            case 'scan_ktp':
                $file = $pendaftaran->scan_ktp_path;
                break;
            case 'scan_ktm':
                $file = $pendaftaran->scan_ktm_path;
                break;
            case 'pas_foto':
                $file = $pendaftaran->pas_foto_path;
                break;
            default:
                $file = null;
                break;
        }

        $exists = $file && file_exists(storage_path('app/public/' . $file));
    @endphp

    <div class="col-md-4 text-center">
        <p><strong>{{ $item['label'] }}</strong></p>

        @if ($exists)
            <img src="{{ asset('storage/' . $file) }}" alt="{{ $item['label'] }}" class="img-fluid rounded shadow-sm mb-2 d-block mx-auto" style="max-height: 200px;">
            <div>
                <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-sm btn-primary">Lihat Full</a>
                <a href="{{ asset('storage/' . $file) }}" download class="btn btn-sm btn-secondary">Download</a>
            </div>
        @else
            <span class="text-muted">Belum upload {{ explode('(', $item['label'])[0] }}</span>
        @endif
    </div>
    @endforeach
    </div>

    <a href="{{ route('cekdata.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
</div>
@endsection
