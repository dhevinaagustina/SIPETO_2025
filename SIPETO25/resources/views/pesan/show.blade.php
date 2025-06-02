@extends('layouts.mahasiswa')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pesan->judul }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.beranda') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pesan.index') }}">Pesan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <strong>Dari:</strong> {{ $pesan->admin->name ?? 'Admin' }}<br>
                        <strong>Tanggal:</strong> {{ $pesan->created_at->format('d M Y H:i') }}
                    </div>

                    @if($pesan->status_type === 'success_fail' && $pesan->mahasiswa->isNotEmpty())
                        @php
                            $status = $pesan->mahasiswa->first()->pivot->status;
                            $message = $pesan->mahasiswa->first()->pivot->custom_message ?? $pesan->isi;
                        @endphp
                        <div class="alert alert-{{ $status === 'success' ? 'success' : 'danger' }}">
                            <h5><i class="icon fas fa-{{ $status === 'success' ? 'check' : 'times' }}"></i> 
                                Anda dinyatakan <strong>{{ $status === 'success' ? 'BERHASIL' : 'GAGAL' }}</strong>
                            </h5>
                            <p>{!! nl2br(e($message)) !!}</p>
                        </div>
                    @else
                        <div class="p-3">
                            {!! nl2br(e($pesan->isi)) !!}
                        </div>
                    @endif

                    @if($pesan->lampiran)
                    <div class="mt-4">
                        <strong>Lampiran:</strong>
                        <a href="{{ asset('storage/'.$pesan->lampiran) }}" target="_blank" class="btn btn-sm btn-primary ml-2">
                            <i class="fas fa-download"></i> Unduh
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection