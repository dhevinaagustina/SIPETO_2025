@extends('admin.layouts.app')

@section('title', 'Status Pendaftaran')
@section('page-title', 'Status Pendaftaran Mahasiswa')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Status Pendaftaran TOEIC</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal Daftar TOEIC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $key => $mhs)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_mahasiswa }}</td>
                            <td>
                                @if($mhs->pendaftaranToeic)
                                    <span class="badge bg-success">Terdaftar</span>
                                @else
                                    <span class="badge bg-warning">Belum Daftar</span>
                                @endif
                            </td>
                            <td>
                                {{ $mhs->pendaftaranToeic ? $mhs->pendaftaranToeic->created_at->format('d/m/Y') : '-' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $mahasiswa->links() }}
            </div>
        </div>
    </div>
</div>
@endsection