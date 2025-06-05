@extends('layouts-admin.template')

@section('content')
<div class="container">
    <h4 class="mb-3">Manajemen Admin</h4>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah Admin --}}
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahAdmin">
        Tambah Admin
    </button>

    {{-- Tabel Admin --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th width="130px">Aksi</th>
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
          <button type="submit" class="btn btn-success">Simpan</button>
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



