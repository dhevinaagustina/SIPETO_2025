<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pengiriman Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body>
<div class="container mt-4">
    <h4>Form Pengiriman Informasi</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form id="formInformasi" method="POST" action="{{ route('admin.informasi.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Penerima Informasi</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ditujukan_ke" id="semua" value="semua" checked>
                <label class="form-check-label" for="semua">Semua Mahasiswa</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ditujukan_ke" id="tertentu" value="tertentu">
                <label class="form-check-label" for="tertentu">Mahasiswa Tertentu</label>
            </div>
        </div>

        <div class="form-group" id="pilihMahasiswa" style="display: none;">
            <label>Pilih Mahasiswa</label>
            <select name="mahasiswa_tertentu[]" class="form-control" multiple>
                @foreach($mahasiswa as $mhs)
                    <option value="{{ $mhs->id_mahasiswa }}">{{ $mhs->nama_mahasiswa }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Judul Informasi</label>
            <input type="text" class="form-control" name="judul" required>
        </div>

        <div class="form-group">
            <label>Isi Informasi</label>
            <textarea name="isi" id="editor" class="form-control" rows="6" required></textarea>
        </div>

        <div class="form-group">
            <label>Lampiran</label>
            <input type="file" name="lampiran" class="form-control-file">
            <small class="text-muted">Maksimal 5MB. Format: PDF, DOC, JPG, PNG.</small>
        </div>

        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="button" class="btn btn-primary" id="btnSubmit">Kirim</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Tampilkan select mahasiswa jika "tertentu" dipilih
    $('input[name="ditujukan_ke"]').on('change', function () {
        if ($(this).val() === 'tertentu') {
            $('#pilihMahasiswa').show();
        } else {
            $('#pilihMahasiswa').hide();
        }
    });

    // Konfirmasi kirim informasi
    $('#btnSubmit').on('click', function () {
        let penerima = $('input[name="ditujukan_ke"]:checked').val();
        let confirmMsg = penerima === 'semua'
            ? "Apakah Anda yakin ingin mengirim informasi ke SEMUA mahasiswa?"
            : "Apakah Anda yakin ingin mengirim informasi ke mahasiswa tertentu?";

        Swal.fire({
            title: 'Konfirmasi',
            text: confirmMsg,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, kirim',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formInformasi').submit();
            }
        });
    });

    // Inisialisasi CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
</body>
</html>
