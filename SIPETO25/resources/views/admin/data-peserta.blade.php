@extends('admin.layouts.app')

@section('title', 'Data Peserta TOEIC')
@section('page-title', 'Manajemen Data Peserta')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Peserta TOEIC</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Peserta
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peserta as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['nim'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['program_studi'] }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection