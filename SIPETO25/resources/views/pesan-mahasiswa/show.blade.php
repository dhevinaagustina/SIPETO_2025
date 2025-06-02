@extends('layouts-mahasiswa.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ $pesan->judul }}</h5>
    </div>
    <div class="card-body">
        {{-- Isi pesan --}}
        <p>{!! nl2br(e($pesan->isi)) !!}</p>

        {{-- Tampilkan Lampiran --}}
        @if($pesan->lampiran)
            <div class="mt-3">
                <strong>Lampiran:</strong><br>

                @php
                    $ext = strtolower(pathinfo($pesan->lampiran, PATHINFO_EXTENSION));
                    $filePath = 'storage/' . $pesan->lampiran;
                @endphp

                {{-- Jika tipe link --}}
                @if($pesan->tipe_lampiran === 'link')
                    <a href="{{ $pesan->lampiran }}" target="_blank" class="btn btn-info">
                        🔗 Kunjungi Link
                    </a>

                {{-- Jika file lokal --}}
                @else
                    {{-- Tombol unduh --}}
                    <a href="{{ route('pesan.download', $pesan->id) }}" class="btn btn-primary">
                        📎 Unduh Lampiran
                    </a>

                    {{-- Preview Gambar --}}
                    @if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                        <div class="mt-3">
                            <img src="{{ asset($filePath) }}" class="img-fluid rounded shadow-sm" alt="Lampiran Gambar">
                        </div>
                    @endif

                    {{-- Preview PDF --}}
                    @if($ext === 'pdf')
                        <div class="mt-3">
                            <iframe src="{{ asset($filePath) }}" width="100%" height="500px"></iframe>
                        </div>
                    @endif
                @endif
            </div>
        @endif
    </div>
</div>
@endsection
