<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pengiriman Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <style>
        .student-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .student-card.success {
            border-left: 4px solid #28a745;
        }
        .student-card.failure {
            border-left: 4px solid #dc3545;
        }
        .remove-student {
            color: #dc3545;
            cursor: pointer;
        }
        #selectedStudentsContainer {
            margin-top: 15px;
        }
    </style>
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

        <!-- Penerima -->
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

        <!-- Mahasiswa Tertentu -->
        <div class="form-group" id="pilihMahasiswa" style="display: none;">
            <div class="row">
                <div class="col-md-10">
                    <label>Pilih Mahasiswa</label>
                    <select id="mahasiswaSelect" class="form-control select2" style="width: 100%;">
                        <option value=""></option>
                        @foreach($mahasiswa as $mhs)
                            <option value="{{ $mhs->id_mahasiswa }}" data-nama="{{ $mhs->nama_mahasiswa }}">
                                {{ $mhs->nama_mahasiswa }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2" style="padding-top: 30px;">
                    <button type="button" id="addStudentBtn" class="btn btn-primary">+ Tambah</button>
                </div>
            </div>

            <div id="selectedStudentsContainer"></div>
        </div>

        <!-- Judul -->
        <div class="form-group">
            <label>Judul Informasi</label>
            <input type="text" class="form-control" name="judul" required>
        </div>

        <!-- Status Global (jika semua mahasiswa) -->
        <div class="form-group" id="statusGlobal">
            <label>Status Hasil</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusSuccess" value="success" checked>
                <label class="form-check-label" for="statusSuccess">Berhasil</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusFailure" value="failure">
                <label class="form-check-label" for="statusFailure">Gagal</label>
            </div>
        </div>

        <!-- Isi Informasi -->
        <div class="form-group">
            <label>Isi Informasi</label>
            <textarea name="isi" id="editor" class="form-control" rows="6" required></textarea>
        </div>

        <!-- Lampiran -->
        <div class="form-group">
            <label>Lampiran</label>
            <input type="file" name="lampiran" class="form-control-file">
            <small class="text-muted">Maksimal 5MB. Format: PDF, DOC, JPG, PNG.</small>
        </div>

        <!-- Tombol -->
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="button" class="btn btn-primary" id="btnSubmit">Kirim</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({ placeholder: "Cari mahasiswa...", allowClear: true });

        // Toggle penerima
        $('input[name="ditujukan_ke"]').on('change', function () {
            let value = $(this).val();
            if (value === 'tertentu') {
                $('#pilihMahasiswa').slideDown();
                $('#statusGlobal').hide();
            } else {
                $('#pilihMahasiswa').slideUp();
                $('#statusGlobal').show();
                $('#selectedStudentsContainer').empty();
            }
        });

        // Tambah mahasiswa
        $('#addStudentBtn').on('click', function () {
            const selected = $('#mahasiswaSelect').find(":selected");
            const id = selected.val();
            const nama = selected.data('nama');

            if (!id) {
                return Swal.fire('Peringatan', 'Silakan pilih mahasiswa terlebih dahulu.', 'warning');
            }
            if ($(`#studentCard_${id}`).length) {
                return Swal.fire('Peringatan', 'Mahasiswa sudah ditambahkan.', 'warning');
            }

            const card = `
                <div class="student-card" id="studentCard_${id}">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>${nama}</strong>
                            <input type="hidden" name="mahasiswa_tertentu[]" value="${id}">
                        </div>
                        <div class="col-md-4">
                            <select name="status_mahasiswa[${id}]" class="form-control form-control-sm">
                                <option value="success">Berhasil</option>
                                <option value="failure">Gagal</option>
                            </select>
                        </div>
                        <div class="col-md-2 text-right">
                            <span class="remove-student" data-id="${id}">&times; Hapus</span>
                        </div>
                    </div>
                </div>
            `;
            $('#selectedStudentsContainer').append(card);
            $('#mahasiswaSelect').val(null).trigger('change');
        });

        // Hapus mahasiswa
        $(document).on('click', '.remove-student', function () {
            let id = $(this).data('id');
            $(`#studentCard_${id}`).remove();
        });

        // Ubah warna kartu berdasarkan status
        $(document).on('change', 'select[name^="status_mahasiswa"]', function () {
            const status = $(this).val();
            const card = $(this).closest('.student-card');
            card.removeClass('success failure').addClass(status);
        });

        // Submit dengan konfirmasi
        $('#btnSubmit').on('click', function () {
            const tujuan = $('input[name="ditujukan_ke"]:checked').val();

            if (tujuan === 'tertentu' && $('input[name="mahasiswa_tertentu[]"]').length === 0) {
                return Swal.fire('Peringatan', 'Silakan pilih minimal satu mahasiswa.', 'warning');
            }

            const msg = tujuan === 'semua'
                ? 'Apakah Anda yakin ingin mengirim informasi ke SEMUA mahasiswa?'
                : 'Apakah Anda yakin ingin mengirim informasi ke mahasiswa terpilih?';

            Swal.fire({
                title: 'Konfirmasi',
                text: msg,
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

        // CKEditor init
        ClassicEditor.create(document.querySelector('#editor')).catch(console.error);
    });
</script>
</body>
</html>
