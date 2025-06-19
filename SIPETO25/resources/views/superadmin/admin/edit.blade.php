@extends('layouts-admin.template')

@section('content') 
<div class="container">
    <h4>{{ __('superadmin/admin.judul_edit') }}</h4>

    <form action="{{ route('admin.kelola_admin.update', $admin->id_admin) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>{{ __('superadmin/admin.username') }}</label>
            <input type="text" name="username" class="form-control" value="{{ $admin->username }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('superadmin/admin.nama_admin') }}</label>
            <input type="text" name="nama_admin" class="form-control" value="{{ $admin->nama_admin }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('superadmin/admin.nip') }}</label>
            <input type="text" name="nip" class="form-control" value="{{ $admin->nip }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('superadmin/admin.email') }}</label>
            <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
        </div>

        <div class="form-group">
            <label>{{ __('superadmin/admin.password') }}</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('superadmin/admin.simpan_perubahan') }}</button>
    </form>
</div>
@endsection