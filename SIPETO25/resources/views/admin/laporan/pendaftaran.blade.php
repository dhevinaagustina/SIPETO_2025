@extends('admin.layouts.app')

@section('title', 'Laporan Pendaftaran')
@section('page-title', 'Laporan Pendaftaran')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
    <h3 class="card-title">{{ __('admin/laporan.judul_filter') }}</h3>
</div>
<div class="card-body">
    <form method="GET" action="{{ route('admin.laporan.generate') }}">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="format">{{ __('admin/laporan.format') }}</label>
                    <select name="format" id="format" class="form-control" required>
                        <option value="excel">{{ __('admin/laporan.excel') }}</option>
                        <option value="pdf">{{ __('admin/laporan.pdf') }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-download mr-1"></i> {{ __('admin/laporan.tombol_generate') }}
            </button>
        </div>
    </form>
</div>

@if(isset($mahasiswa) && $mahasiswa->count() > 0)
<div class="card mt-4">
    <div class="card-header bg-white">
        <h3 class="card-title">{{ __('admin/laporan.judul_data') }}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('admin/laporan.no') }}</th>
                        <th class="text-center">{{ __('admin/laporan.nim') }}</th>
                        <th class="text-center">{{ __('admin/laporan.nama') }}</th>
                        <th class="text-center">{{ __('admin/laporan.email') }}</th>
                        <th class="text-center">{{ __('admin/laporan.tanggal_daftar') }}</th>
                        <th class="text-center">{{ __('admin/laporan.status_toeic') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $key => $mhs)
                        <tr class="text-center">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_mahasiswa }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if($mhs->pendaftaranToeic)
                                    <span class="badge bg-success">{{ __('admin/laporan.terdaftar') }}</span>
                                @else
                                    <span class="badge bg-warning">{{ __('admin/laporan.belum_daftar') }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection