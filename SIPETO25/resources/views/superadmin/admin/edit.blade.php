@extends('layouts-admin.template')

@section('content')
<div class="container">
    <h4>Edit Admin</h4>

    <form action="{{ route('admin.kelola_admin.update', $admin->id_admin) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $admin->username }}" required>
        </div>

        <div class="form-group">
            <label>Nama Admin</label>
            <input type="text" name="nama_admin" class="form-control" value="{{ $admin->nama_admin }}" required>
        </div>

        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $admin->nip }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
        </div>

        <div class="form-group">
            <label>Password (kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
