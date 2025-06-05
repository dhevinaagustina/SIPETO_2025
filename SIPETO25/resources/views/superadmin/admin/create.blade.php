@extends('layouts-admin.template')

@section('content')
<div class="container">
    <h4 class="mb-3">Tambah Admin</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kelola_admin.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Nama Admin</label>
            <input type="text" name="nama_admin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.kelola_admin') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
