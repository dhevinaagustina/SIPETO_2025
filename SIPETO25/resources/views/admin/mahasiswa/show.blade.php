{{-- resources/views/admin/mahasiswa/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<div class="container mt-4">
    <h3>Detail Mahasiswa</h3>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>ID Mahasiswa:</strong> {{ $mahasiswa->id_mahasiswa }}</p>
            <p><strong>Username:</strong> {{ $mahasiswa->username }}</p>
            <p><strong>Status:</strong> {{ $mahasiswa->status ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
