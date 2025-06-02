@extends('layouts-mahasiswa.template')

@section('content')
<style>
    .pesan-container {
        width: 100%; /* Ubah nilai ini sesuai kebutuhan */
        margin: 0 auto;
        padding: 20px;
    }
    .pesan-card {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .pesan-header {
        background-color: #f8f9fa;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
    }
    .pesan-list {
        border: none;
    }
    .pesan-item {
        padding: 15px 20px;
        border-bottom: 1px solid #eee !important;
        transition: all 0.2s;
    }
    .pesan-item:hover {
        background-color: #f8f9fa;
    }
    .pesan-judul {
        font-weight: 500;
        color: #333;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 70%;
    }
    .pesan-tanggal {
        color: #6c757d;
        white-space: nowrap;
    }
    .pesan-footer {
        background-color: #f8f9fa;
        padding: 10px 20px;
        color: #6c757d;
        font-size: 0.9rem;
    }
    .pesan-empty {
        padding: 40px 20px;
        text-align: center;
        color: #6c757d;
    }
    .pesan-icon {
        color: #29335C;
        margin-right: 8px;
    }
    .badge-buka {
        background-color: #29335C !important;
        color: white;
    }
</style>

<div class="pesan-container">
    <div class="pesan-card">
        <div class="pesan-header">
            <h4><i class="fas fa-envelope pesan-icon"></i>Daftar Pesan</h4>
        </div>

        <div class="pesan-list">
            @foreach($pesan as $item)
                <a href="{{ route('pesan.show', $item->id) }}" class="pesan-item d-block text-decoration-none">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="d-flex align-items-center" style="width: 75%;">
                            <i class="fas fa-envelope-open-text pesan-icon"></i>
                            <span class="pesan-judul">{{ $item->judul }}</span>
                        </div>
                        <span class="pesan-tanggal">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <small class="text-muted">
                            <i class="fas fa-clock pesan-icon"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </small>
                        <span class="badge badge-buka rounded-pill px-2">
                            Buka
                        </span>
                    </div>
                </a>
            @endforeach
            
            @if($pesan->isEmpty())
                <div class="pesan-empty">
                    <i class="fas fa-inbox fa-3x mb-3"></i>
                    <p>Tidak ada pesan yang tersedia</p>
                </div>
            @endif
        </div>
        
        <div class="pesan-footer">
            Menampilkan <strong>{{ $pesan->count() }}</strong> pesan
        </div>
    </div>
</div>
@endsection