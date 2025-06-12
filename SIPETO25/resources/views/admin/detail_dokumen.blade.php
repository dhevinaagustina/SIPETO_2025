@extends('layouts-admin.template')

@section('title', 'Detail Dokumen Mahasiswa')

@section('content')
<style>
    .container {
        width: 100%;
        margin: 20px auto;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
        padding: 0;
    }
    
    .header {
        background: #29335C;
        color: white;
        padding: 12px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .back-btn {
        color: white;
        text-decoration: none;
        font-weight: bold;
    }
    
    .student-profile {
        padding: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .student-info h2 {
        margin: 0 0 5px 0;
        font-size: 1.5rem;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 4px;
        margin-top: 8px;
    }
    
    .info-item {
        margin-bottom: 8px;
    }
    
    .info-label {
        font-weight: bold;
        color: #7f8c8d;
    }
    
    .documents-section {
        padding: 20px;
    }
    
    .section-title {
        color: #2c3e50;
        border-bottom: 2px solid #3498db;
        padding-bottom: 5px;
        display: inline-block;
        margin-bottom: 20px;
        font-size: 1.25rem;
    }
    
    .document-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .document-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        transition: transform 0.2s;
    }
    
    .document-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .doc-preview {
        height: 200px;
        background: #f9f9f9;
        border: 1px dashed #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        cursor: pointer;
        overflow: hidden;
    }
    
    .doc-preview img {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .doc-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-top: 10px;
    }
    
    .btn {
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        font-size: 14px;
    }
    
    .btn-primary {
        background: #29335C;
        color: white;
    }

    .btn-secondary {
        background: #ecf0f1;
        color: #333;
    }
    
    .registration-info {
        padding: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .info-row {
        display: grid;
        grid-template-columns: 150px 1fr;
        margin-bottom: 10px;
    }
    
    .info-label {
        font-weight: bold;
        color: #7f8c8d;
    }
    
    .text-muted {
        color: #6c757d;
    }
    
    .document-card h4 {
        font-size: 1rem;
        margin-bottom: 15px;
        text-align: center;
    }
    
    .footer-actions {
        padding: 20px;
        text-align: left;
        border-top: 1px solid #eee;
    }
</style>

<div class="container">
    <div class="header">
        <h3>Detail Dokumen Mahasiswa</h3>
    </div>
    
    <div class="student-profile">
        <div class="student-info">
            <h2>{{ $mahasiswa->nama_mahasiswa }}</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">NIM:</span>
                    <span>{{ $mahasiswa->nim }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Jurusan:</span>
                    <span>{{ $mahasiswa->jurusan }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Prodi:</span>
                    <span>{{ $mahasiswa->prodi }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="registration-info">
        <h3 class="section-title">Informasi Pendaftaran</h3>
        <div class="info-row">
            <span class="info-label">Tipe Ujian :</span>
            <span>{{ ucfirst($pendaftaran->tipe_ujian) }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">NIK :</span>
            <span>{{ $pendaftaran->nik ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">No. WhatsApp :</span>
            <span>{{ $pendaftaran->no_wa ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Alamat Asal :</span>
            <span>{{ $pendaftaran->alamat_asal ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Alamat Sekarang :</span>
            <span>{{ $pendaftaran->alamat_sekarang ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Tanggal Daftar :</span>
            <span>{{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->format('d-m-Y') }}</span>
        </div>
    </div>
    
    <div class="documents-section">
        <h3 class="section-title">Dokumen Pendaftaran</h3>
        
        <div class="document-cards">
            @php
                $dokumen = [
                    ['label' => 'Kartu Tanda Penduduk (KTP)', 'field' => 'scan_ktp'],
                    ['label' => 'Kartu Tanda Mahasiswa (KTM)', 'field' => 'scan_ktm'],
                    ['label' => 'Pas Foto', 'field' => 'pas_foto'],
                ];
            @endphp

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

                    $relativePath = $file ? str_replace('storage/', '', $file) : null;
                    $exists = $file && file_exists(storage_path('app/public/' . $relativePath));
                @endphp

                <div class="document-card">
                    <h4>{{ $item['label'] }}</h4>
                    <div class="doc-preview">
                        @if ($exists)
                           <img src="{{ asset('storage/' . $relativePath) }}" alt="{{ $item['label'] }}" style="width: auto; height: auto; max-width: 100%; max-height: 100%;">
                        @else
                            <span class="text-muted">Belum upload {{ $item['label'] }}</span>
                        @endif
                    </div>
                    @if ($exists)
                        <div class="doc-actions">
                            <a href="{{ asset('storage/' . $relativePath) }}" download class="btn btn-secondary">Download</a>
                            <a href="{{ asset('storage/' . $relativePath) }}" target="_blank" class="btn btn-primary">Lihat Full</a>
                        </div>
                    @endif
                </div>

            @endforeach
        </div>
    </div>
    
    <div class="footer-actions">
        <a href="{{ route('admin.cekdata.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
    </div>
</div>
@endsection