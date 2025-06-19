@extends('layouts-admin.template')

@section('content')
<div class="container">
    <h4 class="mb-3">{{ __('superadmin/admin.judul') }}</h4>

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
            <label>{{ __('superadmin/admin.username') }}</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>{{ __('superadmin/admin.nama_admin') }}</label>
            <input type="text" name="nama_admin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nip">{{ __('superadmin/admin.nip') }}</label>
            <input type="text" name="nip" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>{{ __('superadmin/admin.email') }}</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>{{ __('superadmin/admin.password') }}</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">{{ __('superadmin/admin.simpan') }}</button>
        <a href="{{ route('admin.kelola_admin') }}" class="btn btn-secondary">{{ __('superadmin/admin.kembali') }}</a>
    </form>
</div>
@endsection
