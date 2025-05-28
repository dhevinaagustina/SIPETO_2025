@extends('layouts-mahasiswa.template')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h4>Daftar Pesan</h4>
        <ul class="list-group">
            @foreach($pesan as $item)
                <a href="{{ route('pesan.show', $item->id) }}" class="list-group-item list-group-item-action">
                    <strong>{{ $item->judul }}</strong><br>
                    <small>{{ $item->created_at->format('d M Y') }}</small>
                </a>
            @endforeach
        </ul>
    </div>
</div>
@endsection
