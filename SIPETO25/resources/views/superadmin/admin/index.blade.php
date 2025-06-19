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
    /* Search and Add Button Container */
    .search-add-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .search-form {
        display: flex;
        gap: 10px;
    }
    .search-input {
        width: 300px;
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
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    {{-- Search and Add Button --}}
    <div class="search-add-container"> 
    <form action="{{ route('admin.kelola_admin') }}" method="GET" class="search-form">
        <input type="text" name="search" class="form-control search-input" 
               placeholder="{{ __('superadmin/admin.cari_placeholder') }}" 
               value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">{{ __('superadmin/admin.tombol_cari') }}</button>
        @if(request('search'))
            <a href="{{ route('admin.kelola_admin') }}" class="btn btn-secondary">
                {{ __('superadmin/admin.tombol_reset') }}
            </a>
        @endif
    </form>
    
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAdmin">
        {{ __('superadmin/admin.tombol_tambah') }}
    </button>
</div>

{{-- Tabel Admin --}}
<table class="table-custom">
    <thead>
        <tr>
            <th>{{ __('superadmin/admin.username') }}</th>
            <th>{{ __('superadmin/admin.nama_admin') }}</th>
            <th>{{ __('superadmin/admin.nip') }}</th>
            <th>{{ __('superadmin/admin.email') }}</th>
            <th width="150px">{{ __('superadmin/admin.aksi') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($admins as $admin)
            <tr>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->nama_admin }}</td>
                <td>{{ $admin->nip }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    {{-- Tombol Edit --}}
                    <button type="button" 
                        class="btn btn-sm btn-warning" 
                        data-toggle="modal" 
                        data-target="#modalEditAdmin"
                        onclick="setEditModalData('{{ $admin->id_admin }}', '{{ $admin->username }}', '{{ $admin->nama_admin }}', '{{ $admin->nip }}', '{{ $admin->email }}')">
                        {{ __('superadmin/admin.tombol_edit') }}
                    </button>

                    {{-- Tombol Hapus --}}
                    <button type="button"
                        class="btn btn-sm btn-danger"
                        data-toggle="modal"
                        data-target="#modalHapusAdmin"
                        onclick="setFormAction('{{ route('admin.kelola_admin.destroy', $admin->id_admin) }}')">
                        {{ __('superadmin/admin.tombol_hapus') }}
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">{{ __('superadmin/admin.tidak_ada_data') }}</td>
            </tr>
        @endforelse
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
          <h5 class="modal-title">{{ __('superadmin/admin.modal_tambah') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('superadmin/admin.tombol_batal') }}">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_username') }}</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_nama') }}</label>
            <input type="text" name="nama_admin" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_nip') }}</label>
            <input type="text" name="nip" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_email') }}</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_password') }}</label>
            <input type="password" name="password" class="form-control" required minlength="6">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('superadmin/admin.tombol_batal') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('superadmin/admin.tombol_simpan') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>

{{-- Modal Edit Admin --}}
<div class="modal fade" id="modalEditAdmin" tabindex="-1" role="dialog" aria-labelledby="modalEditAdminLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="formEditAdmin">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('superadmin/admin.modal_edit') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('superadmin/admin.tombol_batal') }}">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_username') }}</label>
            <input type="text" name="username" id="edit_username" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_nama') }}</label>
            <input type="text" name="nama_admin" id="edit_nama_admin" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_nip') }}</label>
            <input type="text" name="nip" id="edit_nip" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_email') }}</label>
            <input type="email" name="email" id="edit_email" class="form-control" required>
          </div>
          <div class="mb-2">
            <label>{{ __('superadmin/admin.label_password_edit') }}</label>
            <input type="password" name="password" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('superadmin/admin.tombol_batal') }}</button>
          <button type="submit" class="btn btn-primary">{{ __('superadmin/admin.tombol_simpan') }}</button>
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
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('superadmin/admin.modal_hapus') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('superadmin/admin.tombol_batal') }}">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ __('superadmin/admin.konfirmasi_hapus') }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('superadmin/admin.tombol_batal') }}</button>
          <button type="submit" class="btn btn-danger">{{ __('superadmin/admin.tombol_hapus') }}</button>
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
    
    function setEditModalData(id, username, nama_admin, nip, email) {
        // Set form action URL
        const form = document.getElementById('formEditAdmin');
        form.setAttribute('action', `/admin/kelola-admin/${id}`);
        
        // Fill form fields
        document.getElementById('edit_username').value = username;
        document.getElementById('edit_nama_admin').value = nama_admin;
        document.getElementById('edit_nip').value = nip;
        document.getElementById('edit_email').value = email;
    }
</script>
@endpush