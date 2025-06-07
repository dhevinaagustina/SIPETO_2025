@extends('layouts-mahasiswa.template')

@section('content')
<style>
    :root {
        --primary-color: #29335C;
        --secondary-color: #3f37c9;
        --success-color: #4cc9f0;
        --danger-color: #f72585;
        --warning-color: #f8961e;
        --light-color: #f8f9fa;
        --dark-color: #212529;
        --gray-light: #f1f3f5;
    }
    
    .pesan-detail-container {
        width: 97%;
        margin: 10px auto;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        animation: fadeIn 0.4s ease-out;
    }
    
    .pesan-detail-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 25px 30px;
        margin-bottom: 0;
    }
    
    .pesan-detail-header h4 {
        margin: 0;
        font-weight: 600;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
    }
    
    .pesan-detail-header i {
        margin-right: 12px;
        font-size: 1.3rem;
    }
    
    .pesan-detail-body {
        padding: 30px;
    }
    
    .pesan-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
        color: #6c757d;
        font-size: 0.95rem;
        padding: 0;
    }
    
    .pesan-content {
        line-height: 1.8;
        font-size: 1.1rem;
        color: var(--dark-color);
        padding: 25px;
        background-color: var(--gray-light);
        border-radius: 8px;
        white-space: pre-wrap;
        margin-bottom: 30px;
    }
    
    .lampiran-section {
        margin-top: 35px;
        padding: 25px;
        background-color: white;
        border-radius: 8px;
        border: 1px solid rgba(0,0,0,0.08);
    }
    
    .lampiran-section h5 {
        font-size: 1.2rem;
        margin-bottom: 20px;
        color: var(--primary-color);
        display: flex;
        align-items: center;
    }
    
    .btn-lampiran {
        border-radius: 6px;
        padding: 10px 20px;
        margin-right: 12px;
        margin-bottom: 12px;
        background-color: var(--primary-color);
        color: white;
        font-size: 0.95rem;
        border: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .btn-lampiran:hover {
        background-color: var(--light-color);
        color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .btn-lampiran i {
        margin-right: 8px;
    }
    
    .img-lampiran {
        max-width: 100%;
        max-height: 500px;
        height: auto;
        border-radius: 6px;
        margin-bottom: 20px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        display: block;
        object-fit: contain;
    }
    
    .pesan-icon {
        margin-right: 10px;
        color: var(--primary-color);
        width: 20px;
        text-align: center;
    }
    
    .lampiran-preview {
        margin-top: 20px;
        margin-bottom: 25px;
    }
    
    .pdf-container {
        width: 100%;
        height: 600px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        overflow: hidden;
        margin-bottom: 20px;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .pesan-detail-container {
            margin: 10px;
            border-radius: 10px;
        }
        
        .pesan-detail-header {
            padding: 20px;
        }
        
        .pesan-detail-header h4 {
            font-size: 1.3rem;
        }
        
        .pesan-detail-body {
            padding: 20px;
        }
        
        .pesan-meta {
            flex-direction: column;
            gap: 15px;
        }
        
        .pesan-content {
            padding: 20px;
            font-size: 1rem;
        }
        
        .lampiran-section {
            padding: 20px;
        }
    }
</style>

<div class="pesan-detail-container">
    <div class="pesan-detail-header">
        <h4><i class="fas fa-envelope-open"></i> {{ $pesan->judul }}</h4>
    </div>

    <div class="pesan-detail-body">
        <div class="pesan-meta">
            <div>
                <i class="fas fa-calendar-alt pesan-icon"></i>
                <span>{{ $pesan->created_at->format('d F Y, H:i') }}</span>
            </div>
            <div>
                <i class="fas fa-clock pesan-icon"></i>
                <span>{{ $pesan->created_at->diffForHumans() }}</span>
            </div>
        </div>
        
        <div class="pesan-content">
            {!! nl2br(e($pesan->isi)) !!}
        </div>
        
        @if($pesan->lampiran)
            <div class="lampiran-section">
                <h5><i class="fas fa-paperclip"></i> Lampiran</h5>
                
                @php
                    $ext = strtolower(pathinfo($pesan->lampiran, PATHINFO_EXTENSION));
                    $filePath = 'storage/lampiran_informasi/' . $pesan->lampiran;
                @endphp

                @if($pesan->tipe_lampiran === 'link')
                    <a href="{{ $pesan->lampiran }}" target="_blank" class="btn-lampiran">
                        <i class="fas fa-external-link-alt"></i> Kunjungi Link
                    </a>
                @else
                    @if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                        <div class="lampiran-preview">
                            <img src="{{ asset($filePath) }}" class="img-lampiran" alt="Lampiran Gambar">
                        </div>
                    @endif

                    @if($ext === 'pdf')
                        <div class="pdf-container">
                            <iframe src="{{ asset($filePath) }}" width="100%" height="100%" style="border: none;"></iframe>
                        </div>
                    @endif

                    <a href="{{ route('pesan.download', $pesan->id) }}" class="btn-lampiran">
                        <i class="fas fa-download"></i> Unduh Lampiran
                    </a>
                @endif
            </div>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Smooth hover effect for buttons
        $('.btn-lampiran').on('mouseenter', function() {
            $(this).css({
                'transform': 'translateY(-3px)',
                'box-shadow': '0 4px 12px rgba(0,0,0,0.15)'
            });
        }).on('mouseleave', function() {
            $(this).css({
                'transform': 'translateY(0)',
                'box-shadow': '0 2px 5px rgba(0,0,0,0.1)'
            });
        });
    });
</script>
@endsection