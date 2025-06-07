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
</style>

<div class="container-fluid">
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah Admin --}}
    <div class="d-flex justify-content-end">
      <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahAdmin">
          Tambah Admin
      </button>
    </div>
    {{-- Tabel Admin --}}
    <table class="table-custom">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->nama_admin }}</td>
                    <td>{{ $admin->nip }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('admin.kelola_admin.edit', $admin->id_admin) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        {{-- Tombol Hapus: trigger modal --}}
                        <button type="button" 
                            class="btn btn-sm btn-danger" 
                            data-toggle="modal" 
                            data-target="#modalHapusAdmin"
                            onclick="setFormAction('{{ route('admin.kelola_admin.destroy', $admin->id_admin) }}')">
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Tambah Admin --}}
<div class="modal fade" id="modalTambahAdmin" tabindex="-1" role="dialog" aria-labelledby="modalTambahAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('admin.kelola_admin.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>Nama Admin</label>
            <input type="text" name="nama_admin" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>NIP</label>
            <input type="text" name="nip" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required minlength="6">
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

{{-- Modal Konfirmasi Hapus --}}
<div class="modal fade" id="modalHapusAdmin" tabindex="-1" role="dialog" aria-labelledby="modalHapusAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formHapusAdmin">
        @csrf
        @method('DELETE') {{-- Ini WAJIB --}}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus admin ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('js')
<script>
    function setFormAction(actionUrl) {
        document.getElementById('formHapusAdmin').setAttribute('action', actionUrl);
        console.log("Setting form action to:", actionUrl);
    }
</script>
@endpush
