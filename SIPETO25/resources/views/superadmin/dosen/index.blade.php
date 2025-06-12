@extends('layouts-admin.template')

@section('content')
<style>
    .table-custom {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #fff;
        border-collapse: collapse;
        text-align: center;
        border: 1px solid #29335C;
    }
    .table-custom th, 
    .table-custom td {
        border: 1px solid #29335C;
        padding: 12px;
    }
    .table-custom thead th {
        background-color: #29335C;
        color: #fff;
    }
    .table-custom tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    .btn-primary {
        background-color: #29335C;
        border-color: #29335C;
    }
    .btn-primary:hover {
        background-color: #1a2341;
        border-color: #1a2341;
    }
    .btn-warning {
        color: #fff;
    }
    /* Pagination Styles */
    .pagination .page-item.active .page-link {
        background-color: #29335C;
        border-color: #29335C;
    }
    .pagination .page-link {
        color: #29335C;
    }
    .pagination .page-item.active .page-link {
        color: white;
    }
    .pagination .page-link:hover {
        color: #1a2341;
    }
    .search-container {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }
    .search-input {
        flex: 1;
        max-width: 300px;
    }
</style>

<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search and Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('admin.dosen.index') }}" method="GET" class="search-container">
            <input type="text" name="search" class="form-control search-input" placeholder="Cari nama dosen..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if(request('search'))
                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </form>
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
            Tambah Dosen
        </button>
    </div>

    <table class="table-custom">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dosen as $d)
                <tr>
                    <td>{{ $d->nip }}</td>
                    <td>{{ $d->nama_dosen }}</td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->email }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $d->id_dosen }}">Edit</button>

                        <!-- Tombol Hapus -->
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $d->id_dosen }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit{{ $d->id_dosen }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('admin.dosen.update', $d->id_dosen) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-2">
                                <label>NIP</label>
                                <input type="text" name="nip" value="{{ $d->nip }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Nama Dosen</label>
                                <input type="text" name="nama_dosen" value="{{ $d->nama_dosen }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Username</label>
                                <input type="text" name="username" value="{{ $d->username }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $d->email }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Password <small>(kosongkan jika tidak ingin diubah)</small></label>
                                <input type="password" name="password" class="form-control" placeholder="Isi jika ingin ganti password">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>

                <!-- Modal Hapus -->
                <div class="modal fade" id="modalHapus{{ $d->id_dosen }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('admin.dosen.destroy', $d->id_dosen) }}" method="POST">
                        @csrf @method('DELETE')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>

            @empty
                <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        {{ $dosen->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('admin.dosen.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Dosen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="mb-2">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Nama Dosen</label>
                <input type="text" name="nama_dosen" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection