@extends('admin.layouts.app')

@section('title', 'Daftar Mahasiswa')
@section('page-title', 'Manajemen Mahasiswa')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Daftar Mahasiswa</h3>
                <form action="{{ route('mahasiswa.cari') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari NIM/Nama...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $key => $mhs)
                        <tr>
                            <td>{{ $mahasiswa->firstItem() + $key }}</td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->nama_mahasiswa }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->created_at->format('d/m/Y') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info btn-detail" data-id="{{ $mhs->id_mahasiswa }}">
                                    <i class="fas fa-eye"></i>
                                </button>
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
<!-- Modal Detail Mahasiswa -->
<div class="modal fade" id="mahasiswaModal" tabindex="-1" aria-labelledby="mahasiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="mahasiswaModalLabel">Detail Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
        <p><strong>NIM:</strong> <span id="detail-nim"></span></p>
        <p><strong>Nama:</strong> <span id="detail-nama"></span></p>
        <p><strong>Email:</strong> <span id="detail-email"></span></p>
        <p><strong>Status:</strong> <span id="detail-status"></span></p>
        <p><strong>Tanggal Daftar:</strong> <span id="detail-created-at"></span></p>
        </div>
    </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('.btn-detail').on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: '/admin/mahasiswa/' + id,
                type: 'GET',
                success: function (response) {
                    if (response.status === 'success') {
                        $('#detail-nim').text(response.data.nim);
                        $('#detail-nama').text(response.data.nama_mahasiswa);
                        $('#detail-email').text(response.data.email);
                        $('#detail-status').text(response.data.status ?? '-');
                        $('#detail-created-at').text(response.data.created_at);
                        $('#mahasiswaModal').modal('show');
                    } else {
                        alert('Data tidak ditemukan.');
                    }
                },
                error: function () {
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        });
    });
</script>
@endpush
@endsection