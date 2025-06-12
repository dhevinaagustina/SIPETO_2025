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
    
    .pesan-container {
        width: 97%;
        margin: 10px auto;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        animation: fadeIn 0.4s ease-out;
    }
    
    .pesan-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 25px 30px;
        margin-bottom: 0;
    }
    
    .pesan-header h4 {
        margin: 0;
        font-weight: 600;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
    }
    
    .pesan-header i {
        margin-right: 12px;
        font-size: 1.3rem;
    }
    
    .pesan-list {
        border-radius: 0 0 12px 12px;
        overflow: hidden;
    }
    
    .pesan-item {
        padding: 20px 25px;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        transition: all 0.2s ease;
        display: block;
        text-decoration: none;
        color: var(--dark-color);
        background-color: white;
    }
    
    .pesan-item:hover {
        background-color: var(--gray-light);
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .pesan-unread {
        background-color: rgba(41, 51, 92, 0.03);
    }
    
    .pesan-judul {
        font-weight: 500;
        color: var(--dark-color);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 70%;
        font-size: 1.05rem;
    }
    
    .pesan-tanggal {
        color: #6c757d;
        white-space: nowrap;
        font-size: 0.9rem;
    }
    
    .pesan-footer {
        padding: 20px;
        background-color: white;
        color: #6c757d;
        text-align: center;
        font-size: 0.9rem;
    }
    
    .pesan-empty {
        padding: 40px 20px;
        text-align: center;
        color: #6c757d;
        background-color: white;
    }
    
    .pesan-empty i {
        color: var(--primary-color);
        margin-bottom: 15px;
        font-size: 2.5rem;
    }
    
    .pesan-icon {
        color: var(--primary-color);
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    .badge-buka {
        background-color: var(--primary-color) !important;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .pesan-container {
            margin: 10px;
            border-radius: 10px;
        }
        
        .pesan-header {
            padding: 20px;
        }
        
        .pesan-header h4 {
            font-size: 1.3rem;
        }
        
        .pesan-item {
            padding: 15px 20px;
        }
        
        .pesan-judul {
            max-width: 60%;
            font-size: 1rem;
        }
    }
</style>

<div class="pesan-container">
    <div class="pesan-header">
        <h4><i class="fas fa-envelope"></i> {{ __('mahasiswa.pesan.judul') }}</h4>
    </div>

     <div class="pesan-list">
        @foreach($pesan as $item)
            <a href="{{ route('pesan.show', $item->id) }}" class="pesan-item {{ $item->is_read ? '' : 'pesan-unread' }}">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center" style="width: 75%;">
                        <i class="fas {{ $item->is_read ? 'fa-envelope-open' : 'fa-envelope' }} pesan-icon"></i>
                        <span class="pesan-judul">{{ $item->judul }}</span>
                    </div>
                    <span class="pesan-tanggal">{{ $item->created_at->format('d M Y') }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <small>
                        <i class="fas fa-clock pesan-icon"></i>
                        {{ $item->created_at->diffForHumans() }}
                    </small>
                    @if(!$item->is_read)
                        <span class="badge-buka">{{ __('mahasiswa.pesan.buka') }}</span>
                    @endif
                </div>
            </a>
        @endforeach

       @if($pesan->isEmpty())
            <div class="pesan-empty">
                <i class="fas fa-inbox"></i>
                <p>{{ __('mahasiswa.pesan.tidak_ada') }}</p>
                <small>{{ __('mahasiswa.pesan.keterangan') }}</small>
            </div>
        @endif
    </div>
    
    <div class="pesan-footer">
        {{ __('mahasiswa.pesan.menampilkan') }} <strong>{{ $pesan->count() }}</strong> {{ __('mahasiswa.pesan.pesan') }}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Enhanced hover effect for message items
        $('.pesan-item').on('mouseenter', function() {
            $(this).css({
                'transform': 'translateX(5px)',
                'box-shadow': '0 5px 15px rgba(0,0,0,0.08)'
            });
        }).on('mouseleave', function() {
            $(this).css({
                'transform': 'translateX(0)',
                'box-shadow': 'none'
            });
        });
    });
</script>
@endsection