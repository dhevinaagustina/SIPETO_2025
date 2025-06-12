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
</style>

<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah Mahasiswa -->
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">
            Tambah Mahasiswa
        </button>
    </div>

    <!-- Filter and Sort Controls -->
<div class="row mb-3">
  <div class="col-md-12">
      <form method="GET" action="{{ route('admin.mahasiswa.index') }}" class="form-inline">
          <!-- Sort Dropdown -->
          <div class="form-group mr-3">
              <label for="sort" class="mr-2">Sort By:</label>
              <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                  <option value="">-- Pilih --</option>
                  <option value="nim" {{ request('sort') == 'nim' ? 'selected' : '' }}>NIM</option>
                  <option value="nama_mahasiswa" {{ request('sort') == 'nama_mahasiswa' ? 'selected' : '' }}>Nama</option>
              </select>
              <input type="hidden" name="direction" value="{{ request('direction') == 'asc' ? 'desc' : 'asc' }}" id="direction">
          </div>
          
          <!-- Filter Dropdowns -->
          <div class="form-group mr-3">
              <label for="jurusan" class="mr-2">Jurusan:</label>
              <select name="jurusan" id="jurusan" class="form-control" onchange="this.form.submit()">
                  <option value="">-- Semua Jurusan --</option>
                  @foreach($jurusanList as $jurusan)
                      <option value="{{ $jurusan }}" {{ request('jurusan') == $jurusan ? 'selected' : '' }}>
                          {{ $jurusan }}
                      </option>
                  @endforeach
              </select>
          </div>
          
          <div class="form-group mr-3">
              <label for="prodi" class="mr-2">Prodi:</label>
              <select name="prodi" id="prodi" class="form-control" onchange="this.form.submit()">
                  <option value="">-- Semua Prodi --</option>
                  @foreach($prodiList as $prodi)
                      <option value="{{ $prodi }}" {{ request('prodi') == $prodi ? 'selected' : '' }}>
                          {{ $prodi }}
                      </option>
                  @endforeach
              </select>
          </div>
          
          <div class="form-group mr-3">
              <label for="kampus" class="mr-2">Kampus:</label>
              <select name="kampus" id="kampus" class="form-control" onchange="this.form.submit()">
                  <option value="">-- Semua Kampus --</option>
                  @foreach($kampusList as $kampus)
                      <option value="{{ $kampus }}" {{ request('kampus') == $kampus ? 'selected' : '' }}>
                          {{ $kampus }}
                      </option>
                  @endforeach
              </select>
          </div>
          
          <!-- Reset Button -->
          <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Reset</a>
      </form>
  </div>
</div>

    <table class="table-custom">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Kampus</th>
                <th width="150px">Aksi</th>
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
                <div class="modal fade" id="modalEdit{{ $m->id_mahasiswa }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('admin.mahasiswa.update', $m->id_mahasiswa) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-2">
                                <label>NIM</label>
                                <input type="text" name="nim" value="{{ $m->nim }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Nama</label>
                                <input type="text" name="nama_mahasiswa" value="{{ $m->nama_mahasiswa }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Username</label>
                                <input type="text" name="username" value="{{ $m->username }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $m->email }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" value="{{ $m->jurusan }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Prodi</label>
                                <input type="text" name="prodi" value="{{ $m->prodi }}" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Kampus</label>
                                <input type="text" name="kampus" value="{{ $m->kampus }}" class="form-control" required>
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
                <div class="modal fade" id="modalHapus{{ $m->id_mahasiswa }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('admin.mahasiswa.destroy', $m->id_mahasiswa) }}" method="POST">
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
                <tr><td colspan="8" class="text-center">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        {{ $mahasiswa->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('admin.mahasiswa.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="mb-2">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Nama</label>
                <input type="text" name="nama_mahasiswa" class="form-control" required>
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
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Prodi</label>
                <input type="text" name="prodi" class="form-control" required>
            </div>
            <div class="mb-2">
                <label>Kampus</label>
                <input type="text" name="kampus" class="form-control" required>
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

<script>
  // Toggle sort direction when sort field is changed
  document.getElementById('sort').addEventListener('change', function() {
      const directionInput = document.getElementById('direction');
      directionInput.value = directionInput.value === 'asc' ? 'desc' : 'asc';
  });
  
  // Show current sort direction in the UI (optional)
  @if(request('sort'))
      document.querySelector(`option[value="{{ request('sort') }}"]`).text += 
          " ({{ request('direction') == 'asc' ? 'A-Z' : 'Z-A' }})";
  @endif
</script>

@endsection