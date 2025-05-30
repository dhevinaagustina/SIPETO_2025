@extends('admin.layouts.app')

@section('title', 'Mahasiswa Baru')
@section('page-title', 'Mahasiswa Baru (30 Hari Terakhir)')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Daftar Mahasiswa Baru</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $key => $mhs)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_mahasiswa }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->created_at->format('d/m/Y H:i') }}</td>
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