@extends('layouts-admin.template')

@section('title', 'Lampiran Surat Pernyataan')

@section('content')
<style>
    .container {
        width: 100%;
        max-width: 1100px;
        margin: 20px auto;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.1);
        padding: 30px;
    }

    .section-title {
        font-size: 1.6rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 25px;
        border-left: 5px solid #3498db;
        padding-left: 15px;
    }

    .document-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
    }

    .document-card {
        background: #f4f6f8;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        transition: all 0.2s ease-in-out;
    }

    .document-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .document-card h4 {
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 15px;
    }

    .doc-preview {
        flex: 1;
        min-height: 300px;
        max-height: 400px;
        background: #fff;
        border: 2px dashed #ccc;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        overflow: hidden;
    }

    .doc-preview img,
    .doc-preview embed {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .doc-preview span {
        color: #777;
        font-style: italic;
        font-size: 14px;
    }

    .doc-actions {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn {
        padding: 8px 14px;
        font-size: 14px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-primary {
        background-color: #29335C;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #1f2848;
    }

    .btn-secondary {
        background-color: #e3e6e9;
        color: #2c3e50;
    }

    .btn-secondary:hover {
        background-color: #d4d7da;
    }
    
    .btn-back {
        margin-top: 10px;
        text-align: left;
    }

    .btn-back a.btn {
        display: inline-block;
        width: auto;
        padding: 6px 16px;
        font-size: 14px;
        border-radius: 6px;
    }


</style>

<div class="container">
    <h3 class="section-title">Lampiran Surat Pernyataan</h3>

    <div class="document-cards">
        @foreach (['lampiran_1' => 'Lampiran 1', 'lampiran_2' => 'Lampiran 2'] as $key => $label)
            @php
                $filePath = $surat->$key;
                $ext = $filePath ? strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) : null;
                $isImage = in_array($ext, ['jpg', 'jpeg', 'png']);
                $isPDF = $ext === 'pdf';
            @endphp

            <div class="document-card">
                <h4>{{ $label }}</h4>

                <div class="doc-preview">
                    @if ($filePath)
                        @if ($isImage)
                            <img src="{{ asset('storage/' . $filePath) }}" alt="{{ $label }}">
                        @elseif ($isPDF)
                            <embed src="{{ asset('storage/' . $filePath) }}" type="application/pdf">
                        @else
                            <span>Format lampiran tidak dapat ditampilkan langsung</span>
                        @endif
                    @else
                        <span>Lampiran belum tersedia</span>
                    @endif
                </div>

                @if ($filePath)
                    <div class="doc-actions">
                        <a href="{{ asset('storage/' . $filePath) }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="{{ asset('storage/' . $filePath) }}" download class="btn btn-secondary">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div class="btn-back">
        <a href="{{ route('admin.surat_pernyataan.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

</div>
@endsection
