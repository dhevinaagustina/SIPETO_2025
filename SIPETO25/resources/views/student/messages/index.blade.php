@extends('layouts.student')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pesan Notifikasi</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @if($messages->isEmpty())
                        <div class="alert alert-info">
                            Anda belum memiliki pesan.
                        </div>
                    @else
                        @foreach($messages as $message)
                        <div class="message-item {{ $message->status === 'success' ? 'bg-success-light' : 'bg-danger-light' }} p-3 mb-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h5>
                                    @if($message->status === 'success')
                                        <i class="fas fa-check-circle text-success"></i> Hasil Berhasil
                                    @else
                                        <i class="fas fa-times-circle text-danger"></i> Hasil Gagal
                                    @endif
                                </h5>
                                <small class="text-muted">{{ $message->created_at->format('d M Y H:i') }}</small>
                            </div>
                            <p class="mt-2">{{ $message->message }}</p>
                            <small class="text-muted">Dikirim oleh: {{ $message->admin->name }}</small>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
    .bg-success-light {
        background-color: rgba(40, 167, 69, 0.1);
        border-left: 4px solid #28a745;
    }
    .bg-danger-light {
        background-color: rgba(220, 53, 69, 0.1);
        border-left: 4px solid #dc3545;
    }
    .message-item {
        transition: all 0.3s ease;
    }
    .message-item:hover {
        transform: translateX(5px);
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Mark messages as read when viewed
        @foreach($messages as $message)
            @if(!$message->is_read)
                $.post("{{ route('student.messages.markAsRead', $message->id) }}", {
                    _token: "{{ csrf_token() }}"
                });
            @endif
        @endforeach
    });
</script>
@endsection