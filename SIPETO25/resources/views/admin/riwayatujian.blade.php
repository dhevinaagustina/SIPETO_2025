<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Ujian TOEIC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container mt-4">
    <h3 class="mb-4">Riwayat Ujian TOEIC</h3>

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" id="searchNama" class="form-control" placeholder="Cari nama mahasiswa">
        </div>
        <div class="col-md-4">
            <select id="filterStatus" class="form-control">
                <option value="">Semua Status</option>
                <option value="gratis">Gratis</option>
                <option value="mandiri">Mandiri</option>
            </select>
        </div>
    </div>

    <table class="table table-bordered" id="riwayatTable">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Status Pendaftaran</th>
            </tr>
        </thead>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function() {
    var table = $('#riwayatTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("admin.riwayat.ajax") }}',
            data: function (d) {
                d.nama = $('#searchNama').val();
                d.status = $('#filterStatus').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nim', name: 'mahasiswa.nim' },
            { data: 'nama', name: 'mahasiswa.nama_mahasiswa' },
            { data: 'status_pendaftaran', name: 'pt.tipe_ujian' }
        ]
    });

    $('#searchNama, #filterStatus').on('keyup change', function() {
        table.draw();
    });
});
</script>
</body>
</html>
