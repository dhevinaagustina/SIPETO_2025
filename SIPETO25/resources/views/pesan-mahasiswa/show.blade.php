@extends('layouts-mahasiswa.template')

@section('content')
<style>
    .pesan-detail-container {
        width: 100%;
        margin: 0 auto;
        padding: 10px;
    }
    .pesan-detail-card {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .pesan-detail-header {
        background-color: #fff;
        color: 29335C;
        padding: 20px;
        border-bottom: 1px solid #eee;
    }
    .pesan-detail-body {
        padding: 25px;
        background-color: white;
    }
    .pesan-content {
        line-height: 1.8;
        font-size: 1.05rem;
        color: #333;
    }
    .pesan-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        color: #6c757d;
        font-size: 0.9rem;
    }
    .lampiran-section {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px dashed #eee;
    }
    .btn-lampiran {
        border-radius: 20px;
        padding: 8px 20px;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .img-lampiran {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-top: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .pesan-icon {
        margin-right: 8px;
        color: #29335C;
    }
</style>

<div class="pesan-detail-container">
    <div class="pesan-detail-card">
        <div class="pesan-detail-header">
            <h4><i class="fas fa-envelope-open pesan-icon"></i> {{ $pesan->judul }}</h4>
        </div>
        
        <div class="pesan-detail-body">
            <div class="pesan-meta">
                <div>
                    <i class="fas fa-calendar-alt pesan-icon"></i>
                    {{ $pesan->created_at->format('d F Y, H:i') }}
                </div>
                <div>
                    <i class="fas fa-clock pesan-icon"></i>
                    {{ $pesan->created_at->diffForHumans() }}
                </div>
            </div>
            
            <div class="pesan-content">
                {!! nl2br(e($pesan->isi)) !!}
            </div>
            
            @if($pesan->lampiran)
                <div class="lampiran-section">
                    <h5><i class="fas fa-paperclip pesan-icon"></i> Lampiran</h5>
                    
                    @if($pesan->tipe_lampiran === 'link')
                        <a href="{{ $pesan->lampiran }}" target="_blank" class="btn btn-info btn-lampiran">
                            <i class="fas fa-external-link-alt"></i> Kunjungi Link
                        </a>
                    @elseif(in_array($pesan->tipe_lampiran, ['dokumen', 'gambar']))
                        <a href="{{ asset('storage/' . $pesan->lampiran) }}" target="_blank" class="btn btn-primary btn-lampiran">
                            <i class="fas fa-download"></i> Unduh Lampiran
                        </a>
                        @if($pesan->tipe_lampiran === 'gambar')
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $pesan->lampiran) }}" class="img-lampiran" alt="Lampiran Gambar">
                            </div>
                        @endif
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection