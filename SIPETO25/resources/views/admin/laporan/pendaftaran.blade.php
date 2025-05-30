@extends('admin.layouts.app')

@section('title', 'Laporan Pendaftaran')
@section('page-title', 'Laporan Pendaftaran')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Filter Laporan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.laporan.generate') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control" 
                                   value="{{ request('start_date') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="end_date" class="form-control" 
                                   value="{{ request('end_date') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Format</label>
                            <select name="format" class="form-control">
                                <option value="excel">Excel</option>
                                <option value="pdf">PDF</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-download mr-1"></i> Generate Laporan
                </button>
            </form>
        </div>
    </div>

    @if(isset($mahasiswa) && $mahasiswa->count() > 0)
    <div class="card mt-4">
        <div class="card-header bg-white">
            <h3 class="card-title">Data Pendaftaran</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th>Status TOEIC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $key => $mhs)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_mahasiswa }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if($mhs->pendaftaranToeic)
                                    <span class="badge bg-success">Terdaftar</span>
                                @else
                                    <span class="badge bg-warning">Belum Daftar</span>
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