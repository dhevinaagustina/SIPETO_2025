@extends('layouts-admin') {{-- Ganti dengan layout yang kamu pakai --}}
@section('title', 'Daftar Informasi')

@section('content')
<div class="container">
    <h4 class="mb-4">Daftar Informasi</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Lampiran</th>
                <th>Ditujukan Kepada</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($informasi as $info)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $info->judul }}</td>
                    <td>{{ Str::limit(strip_tags($info->isi), 50) }}</td>
                    <td>{{ $info->lampiran ?? '-' }}</td>
                    <td>
                        @php
                            $statuses = explode(',', $info->status_mahasiswa ?? '');
                            $statuses = array_filter(array_unique($statuses));
                        @endphp

                        @if (in_array($info->ditujukan_ke, ['mahasiswa_tertentu', 'alumni_tertentu']))
                            Mahasiswa Tertentu (
                            @if (count($statuses) > 1)
                                Campuran
                            @elseif (in_array('alumni', $statuses))
                                Alumni
                            @else
                                Aktif
                            @endif
                            )
                        @else
                            {{ ucwords(str_replace('_', ' ', $info->ditujukan_ke)) }}
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-{{ $info->status == 'berhasil' ? 'success' : 'danger' }}">
                            {{ ucfirst($info->status) }}
                        </span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($info->created_at)->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada informasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection