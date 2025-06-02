@extends('layouts-mahasiswa.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ $pesan->judul }}</h5>
    </div>
    <div class="card-body">
        <p>{!! nl2br(e($pesan->isi)) !!}</p>

        @if($pesan->tipe_lampiran === 'link')
            <p><a href="{{ $pesan->lampiran }}" target="_blank" class="btn btn-info">🔗 Kunjungi Link</a></p>
        @elseif(in_array($pesan->tipe_lampiran, ['dokumen', 'gambar']))
            <p><a href="{{ asset('storage/' . $pesan->lampiran) }}" target="_blank" class="btn btn-primary">📎 Unduh Lampiran</a></p>
            @if($pesan->tipe_lampiran === 'gambar')
                <img src="{{ asset('storage/' . $pesan->lampiran) }}" class="img-fluid mt-3" alt="Lampiran Gambar">
            @endif
        @endif
    </div>
</div>
@endsection