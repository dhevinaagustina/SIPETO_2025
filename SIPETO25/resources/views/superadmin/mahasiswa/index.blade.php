@extends('layouts-admin.template')

@section('content')
<div class="container mt-4">
    <h4>Manajemen Mahasiswa</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah Mahasiswa -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">+ Tambah Mahasiswa</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Kampus</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa as $m)
                <tr>
                    <td>{{ $m->nim }}</td>
                    <td>{{ $m->nama_mahasiswa }}</td>
                    <td>{{ $m->username }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->jurusan }}</td>
                    <td>{{ $m->prodi }}</td>
                    <td>{{ $m->kampus }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{ $m->id_mahasiswa }}">Edit</button>

                        <!-- Tombol Hapus -->
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $m->id_mahasiswa }}">Hapus</button>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit{{ $m->id_mahasiswa }}" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <form action="{{ route('admin.mahasiswa.update', $m->id_mahasiswa) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" name="nim" value="{{ $m->nim }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_mahasiswa" value="{{ $m->nama_mahasiswa }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="{{ $m->username }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $m->email }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" value="{{ $m->jurusan }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Prodi</label>
                                <input type="text" name="prodi" value="{{ $m->prodi }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kampus</label>
                                <input type="text" name="kampus" value="{{ $m->kampus }}" class="form-control" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>

                <!-- Modal Hapus -->
                <div class="modal fade" id="modalHapus{{ $m->id_mahasiswa }}" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <form action="{{ route('admin.mahasiswa.destroy', $m->id_mahasiswa) }}" method="POST">
                        @csrf @method('DELETE')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini?
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>

            @empty
                <tr><td colspan="8" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $mahasiswa->links() }}
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_mahasiswa" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <input type="text" name="prodi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Kampus</label>
                <input type="text" name="kampus" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection
