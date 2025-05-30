<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengajuan Surat Pernyataan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h3 class="mb-4">Daftar Pengajuan Surat Pernyataan</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="tableSurat" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>File Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                            <td>{{ $item->mahasiswa->nim }}</td>
                            <td>{{ $item->mahasiswa->prodi }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}</td>
                            <td>
                                @if ($item->status === 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-warning text-dark">Diajukan</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->file_surat)
                                    <a href="{{ asset('storage/' . $item->file_surat) }}" class="btn btn-sm btn-outline-success" target="_blank">Lihat</a>
                                @else
                                    <span class="text-muted">Belum tersedia</span>
                                @endif
                            </td>
                            <td>
                                @if (!$item->file_surat)
                                    <a href="{{ route('admin.surat_pernyataan.generate', $item->id) }}" class="btn btn-sm btn-primary">
                                    Generate Surat
                                </a>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Sudah dibuat</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tableSurat').DataTable();
    });
</script>
</body>
</html>
