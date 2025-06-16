<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ __('admin/pesan.title') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --warning-color: #f8961e;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .container {
            max-width: 900px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-section {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .form-section:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        
        .form-section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }
        
        .form-section-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .student-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .student-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .student-card.success {
            border-left: 4px solid var(--success-color);
            background-color: rgba(76, 201, 240, 0.05);
        }
        
        .student-card.failure {
            border-left: 4px solid var(--danger-color);
            background-color: rgba(247, 37, 133, 0.05);
        }
        
        .remove-student {
            color: var(--danger-color);
            cursor: pointer;
            transition: all 0.2s ease;
            background-color: rgba(247, 37, 133, 0.1);
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
        }
        
        .remove-student:hover {
            transform: scale(1.05);
            background-color: rgba(247, 37, 133, 0.2);
        }
        
        #selectedStudentsContainer {
            margin-top: 20px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }
        
        .btn-secondary {
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background-color: #d91a6d;
            border-color: #d91a6d;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(247, 37, 133, 0.3);
        }
        
        .alert {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            padding-right: 40px;
            animation: fadeInDown 0.5s;
        }
        
        .alert .close {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }
        
        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        
        .file-input-button {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .file-input-button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }
        
        .file-input-button i {
            margin-right: 8px;
        }
        
        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-name {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .radio-group {
            display: flex;
            gap: 20px;
        }
        
        .radio-option {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .radio-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .radio-option input {
            margin-right: 10px;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }
        
        .status-success {
            background-color: rgba(76, 201, 240, 0.2);
            color: #0a6c74;
        }
        
        .status-failure {
            background-color: rgba(247, 37, 133, 0.2);
            color: #a3124a;
        }
        
        .floating-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .floating-button:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.5);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        /* Custom Select2 styling */
        .select2-container--default .select2-selection--single {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px;
        }
        
        /* Custom modal styling */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
        }
        
        .modal-title {
            font-weight: 600;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin-top: 15px;
            }
            
            .header {
                padding: 15px;
            }
            
            .form-section {
                padding: 15px;
            }
            
            .radio-group {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container animate__animated animate__fadeIn">
    <div class="header animate__animated animate__fadeInDown">
        <div class="d-flex justify-content-between align-items-center">
            <div>
            <h3 class="mb-0"><i class="fas fa-paper-plane me-2"></i> {{ __('admin/pesan.title') }}</h3>
            <p class="mb-0 opacity-75">{{ __('admin/pesan.subtitle') }}</p>
            </div>
            <button type="button" class="btn btn-light btn-back" id="btnBack">
                <i class="fas fa-arrow-left me-1"></i>  {{ __('admin/pesan.back') }}
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible animate__animated animate__fadeInDown">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible animate__animated animate__fadeInDown">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form id="formInformasi" method="POST" action="{{ route('admin.informasi.store') }}" enctype="multipart/form-data">
        @csrf

    <!-- Penerima Section -->
    <div class="form-section animate__animated animate__fadeIn">
        <h5 class="form-section-title"><i class="fas fa-users"></i>  {{ __('admin/pesan.penerima') }}</h5>

        <div class="radio-group">
            <label class="radio-option">
            <input class="form-check-input" type="radio" name="ditujukan_ke" value="semua_mahasiswa" checked>
            <span class="ms-2">{{ __('admin/pesan.semua_mahasiswa') }}</span>
        </label>
        <label class="radio-option">
            <input class="form-check-input" type="radio" name="ditujukan_ke" value="mahasiswa_tertentu">
            <span class="ms-2">{{ __('admin/pesan.mahasiswa_tertentu') }}</span>
        </label>
        <label class="radio-option">
            <input class="form-check-input" type="radio" name="ditujukan_ke" value="semua_dosen">
            <span class="ms-2">{{ __('admin/pesan.semua_dosen') }}</span>
        </label>
        <label class="radio-option">
            <input class="form-check-input" type="radio" name="ditujukan_ke" value="dosen_tertentu">
            <span class="ms-2">{{ __('admin/pesan.dosen_tertentu') }}</span>
        </label>
        </div>

        <!-- Mahasiswa Tertentu -->
    <div class="mt-4" id="pilihMahasiswa" style="display: none;">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">{{ __('admin/pesan.kategori_mahasiswa') }}</label>
                <select id="kategoriMahasiswa" class="form-control">
                    <option value="aktif">{{ __('admin/pesan.mahasiswa_aktif') }}</option>
                    <option value="alumni">{{ __('admin/pesan.mahasiswa_alumni') }}</option>
                </select>
            </div>
        </div>

            <div class="row">
                <div class="col-md-9">
                    <label class="form-label">{{ __('admin/pesan.pilih_mahasiswa') }}</label>
                    <select id="mahasiswaSelect" class="form-control select2" style="width: 100%;" data-placeholder="{{ __('admin/pesan.placeholder_mahasiswa') }}">
                        <!-- Akan diisi melalui AJAX -->
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="button" id="addStudentBtn" class="btn btn-primary w-100">
                        <i class="fas fa-plus me-1"></i> {{ __('admin/pesan.tambah_mahasiswa') }}
                    </button>
                </div>
            </div>

            <div id="selectedStudentsContainer" class="mt-3"></div>
        </div>

        <!-- Dosen Tertentu -->
        <div class="mt-4" id="pilihDosen" style="display: none;">
            <div class="row">
                <div class="col-md-9">
                    <label class="form-label">{{ __('admin/pesan.pilih_dosen') }}</label>
                    <select id="dosenSelect" class="form-control select2" style="width: 100%;">
                        <option value=""></option>
                        @foreach($dosen as $dsn)
                            <option value="{{ $dsn->id_dosen }}" data-nama="{{ $dsn->nama_dosen }}">
                                {{ $dsn->nama_dosen }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="button" id="addDosenBtn" class="btn btn-success w-100">
                        <i class="fas fa-plus me-1"></i>  {{ __('admin/pesan.tambah_dosen') }}
                    </button>
                </div>
            </div>
            <div id="selectedDosenContainer" class="mt-3"></div>
        </div>
    </div>

        <!-- Detail Informasi Section -->
        <div class="form-section animate__animated animate__fadeIn">
            <h5 class="form-section-title"><i class="fas fa-info-circle"></i>{{ __('admin/pesan.detail_informasi') }}</h5>
            <div class="mb-4">
                <label class="form-label">{{ __('admin/pesan.judul') }}</label>
                <input type="text" class="form-control" name="judul" placeholder="{{ __('admin/pesan.placeholder_judul') }}" required>
            </div>

            <div class="mb-4" id="statusGlobal">
                <label class="form-label">{{ __('admin/pesan.status_hasil') }}</label>
                <div class="btn-group w-100" role="group">
                    <input type="radio" class="btn-check" name="status" id="statusSuccess" value="success" autocomplete="off" checked>
                    <label class="btn btn-outline-success" for="statusSuccess">
                        <i class="fas fa-check-circle me-1"></i>  {{ __('admin/pesan.berhasil') }}
                    </label>

                    <input type="radio" class="btn-check" name="status" id="statusFailure" value="failure" autocomplete="off">
                    <label class="btn btn-outline-danger" for="statusFailure">
                        <i class="fas fa-times-circle me-1"></i> {{ __('admin/pesan.gagal') }}
                    </label>
                </div>
            </div>

            <div>
                <label class="form-label">{{ __('admin/pesan.isi_informasi') }}</label>
                <textarea name="isi" id="editor" class="form-control" rows="6" required></textarea>
            </div>
        </div>

        <!-- Lampiran Section -->
        <div class="form-section animate__animated animate__fadeIn">
            <h5 class="form-section-title"><i class="fas fa-paperclip"></i>{{ __('admin/pesan.lampiran') }}</h5>
            <div class="file-input-container">
                <div class="file-input-button">
                    <i class="fas fa-cloud-upload-alt"></i>{{ __('admin/pesan.pilih_lampiran') }}
                    <input type="file" name="lampiran" class="file-input" id="fileInput">
                </div>
                <div id="fileName" class="file-name">{{ __('admin/pesan.belum_ada_file') }}</div>
            </div>
            <small class="text-muted">{{ __('admin/pesan.catatan_lampiran') }}</small>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-end mt-4 animate__animated animate__fadeIn">
            <button type="reset" class="btn btn-secondary me-3">
                <i class="fas fa-undo me-1"></i> {{ __('admin/pesan.reset') }}
            </button>
            <button type="button" class="btn btn-primary pulse-animation" id="btnSubmit">
                <i class="fas fa-paper-plane me-1"></i> {{ __('admin/pesan.kirim') }}
            </button>
        </div>
    </form>
</div>

<!-- Floating Help Button -->
<div class="floating-button animate__animated animate__fadeInUp" id="helpButton">
    <i class="fas fa-question"></i>
</div>

<!-- Modal Konfirmasi Kembali -->
<div class="modal fade" id="confirmBackModal" tabindex="-1" aria-labelledby="confirmBackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmBackModalLabel"><i class="fas fa-exclamation-triangle me-2"></i> {{ __('admin/pesan.modal_konfirmasi') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('admin/pesan.modal_kembali_pertanyaan') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> {{ __('admin/pesan.batal') }}
                </button>
                <button type="button" class="btn btn-primary" id="confirmBack">
                    <i class="fas fa-check me-1"></i> {{ __('admin/pesan.ya_kembali') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Pesan -->
<div class="modal fade" id="deleteMessageModal" tabindex="-1" aria-labelledby="deleteMessageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="deleteMessageModalLabel"><i class="fas fa-trash-alt me-2"></i> {{ __('admin/pesan.hapus_pesan') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('admin/pesan.hapus_pesan_konfirmasi') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>  {{ __('admin/pesan.hapus_pesan') }}
                </button>
                <button type="button" class="btn btn-danger" id="confirmDelete">
                    <i class="fas fa-trash-alt me-1"></i> {{ __('admin/pesan.ya_hapus') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Help Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="helpModalLabel"><i class="fas fa-question-circle me-2"></i> {{ __('admin/pesan.bantuan') }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6><i class="fas fa-info-circle text-primary me-2"></i> {{ __('admin/pesan.cara_penggunaan') }}</h6>
                <ol>
                    <li>{{ __('admin/pesan.langkah1') }}</li>
                    <li>{{ __('admin/pesan.langkah2') }}</li>
                    <li>{{ __('admin/pesan.langkah3') }}</li>
                    <li>{{ __('admin/pesan.langkah4') }}</li>
                    <li>{{ __('admin/pesan.langkah5') }}</li>
                </ol>
                <hr>
                <h6><i class="fas fa-lightbulb text-warning me-2"></i>  {{ __('admin/pesan.tips') }}</h6>
                <ul>
                    <li>{{ __('admin/pesan.tip1') }}</li>
                    <li>{{ __('admin/pesan.tip2') }}</li>
                    <li>{{ __('admin/pesan.tip3') }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="fas fa-check me-1"></i>  {{ __('admin/pesan.mengerti') }}
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    $(document).ready(function () {
        // Select2 Initialization
        $('.select2').select2({
            placeholder: "{{ __('admin/pesan.placeholder_penerima') }}",
            allowClear: true,
            width: '100%'
        });

        // CKEditor Init
        ClassicEditor.create(document.querySelector('#editor'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', '|',
                    'bulletedList', 'numberedList', '|',
                    'alignment', '|',
                    'link', 'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            },
            language: 'id'
        }).catch(error => {
            console.error('CKEditor error:', error);
        });

        // Fungsi untuk load data mahasiswa via AJAX
        function loadMahasiswa(kategori) {
            $.ajax({
                url: `/get-mahasiswa?kategori=${kategori}`,
                type: 'GET',
                success: function (data) {
                    const mahasiswaSelect = $('#mahasiswaSelect');
                    mahasiswaSelect.empty().append('<option></option>'); // Kosongkan dan beri placeholder
                    data.forEach(function (mhs) {
                        mahasiswaSelect.append(
                            `<option value="${mhs.id}" data-nama="${mhs.nama}">${mhs.nama}</option>`
                        );
                    });
                    mahasiswaSelect.trigger('change.select2'); // Refresh Select2
                },
                error: function () {
                    console.error('Gagal mengambil data mahasiswa');
                }
            });
        }

        // Saat kategori mahasiswa diubah
        $('#kategoriMahasiswa').on('change', function () {
            const kategori = $(this).val();
            loadMahasiswa(kategori);
        });

        // Toggle target sections
        $('input[name="ditujukan_ke"]').on('change', function () {
            const value = $(this).val();

            $('#pilihMahasiswa').slideUp();
            $('#pilihDosen').slideUp();
            $('#selectedStudentsContainer').empty();
            $('#selectedDosenContainer').empty();

            if (value === 'mahasiswa_tertentu') {
                $('#pilihMahasiswa').slideDown();
                $('#kategoriMahasiswa').trigger('change'); // ✅ load data mahasiswa sesuai kategori
            } else if (value === 'dosen_tertentu') {
                $('#pilihDosen').slideDown();
            }
        });

        // Add Mahasiswa
        $('#addStudentBtn').on('click', function () {
            const selected = $('#mahasiswaSelect').find(":selected");
            const id = selected.val();
            const nama = selected.data('nama');

            if (!id) return warningAlert('Silakan pilih mahasiswa terlebih dahulu.');
            if ($(`#studentCard_${id}`).length)
                return warningAlert('Mahasiswa sudah ditambahkan.');

            const card = `
                <div class="student-card animate__animated animate__fadeIn" id="studentCard_${id}">
                    <div class="d-flex align-items-center w-100">
                        <div class="flex-grow-1">
                            <strong>${nama}</strong>
                            <input type="hidden" name="mahasiswa_tertentu[]" value="${id}">
                        </div>
                        <div class="mx-3">
                            <select name="status_mahasiswa[${id}]" class="form-select form-select-sm status-select">
                                <option value="success">Berhasil</option>
                                <option value="failure">Gagal</option>
                            </select>
                        </div>
                        <div>
                            <span class="remove-student" data-id="${id}" title="Hapus mahasiswa">
                                <i class="fas fa-times me-1"></i> Hapus
                            </span>
                        </div>
                    </div>
                </div>`;
            $('#selectedStudentsContainer').append(card);
            $('#mahasiswaSelect').val(null).trigger('change');
            $(`#studentCard_${id}`)[0].scrollIntoView({ behavior: 'smooth' });
        });

        // Add Dosen
        $('#addDosenBtn').on('click', function () {
            const selected = $('#dosenSelect').find(":selected");
            const id = selected.val();
            const nama = selected.data('nama');

            if (!id) return warningAlert('Silakan pilih dosen terlebih dahulu.');
            if ($(`#dosenCard_${id}`).length)
                return warningAlert('Dosen sudah ditambahkan.');

            const card = `
                <div class="student-card animate__animated animate__fadeIn" id="dosenCard_${id}">
                    <div class="d-flex align-items-center w-100">
                        <div class="flex-grow-1">
                            <strong>${nama}</strong>
                            <input type="hidden" name="dosen_tertentu[]" value="${id}">
                        </div>
                        <div class="mx-3">
                            <select name="status_dosen[${id}]" class="form-select form-select-sm status-select">
                                <option value="success">Berhasil</option>
                                <option value="failure">Gagal</option>
                            </select>
                        </div>
                        <div>
                            <span class="remove-dosen" data-id="${id}" title="Hapus dosen">
                                <i class="fas fa-times me-1"></i> Hapus
                            </span>
                        </div>
                    </div>
                </div>`;
            $('#selectedDosenContainer').append(card);
            $('#dosenSelect').val(null).trigger('change');
            $(`#dosenCard_${id}`)[0].scrollIntoView({ behavior: 'smooth' });
        });

        // Remove Mahasiswa
        $(document).on('click', '.remove-student', function () {
            const id = $(this).data('id');
            const card = $(`#studentCard_${id}`);
            card.addClass('animate__fadeOut');
            card.on('animationend', () => card.remove());
        });

        // Remove Dosen
        $(document).on('click', '.remove-dosen', function () {
            const id = $(this).data('id');
            const card = $(`#dosenCard_${id}`);
            card.addClass('animate__fadeOut');
            card.on('animationend', () => card.remove());
        });

        // Status visual update
        $(document).on('change', '.status-select', function () {
            const status = $(this).val();
            const card = $(this).closest('.student-card');
            card.removeClass('success failure');
            $(this).removeClass('border-success border-danger');

            if (status === 'success') {
                card.addClass('success');
                $(this).addClass('border-success');
            } else {
                card.addClass('failure');
                $(this).addClass('border-danger');
            }
        });

        // File input label
        $('#fileInput').on('change', function () {
            const fileName = $(this).val().split('\\').pop();
            $('#fileName').html(fileName ? `<i class="fas fa-file me-1"></i> ${fileName}` : 'Belum ada file dipilih');
        });

        // Konfirmasi kembali
        $('#btnBack').on('click', () => new bootstrap.Modal('#confirmBackModal').show());
        $('#confirmBack').on('click', () => window.location.href = "{{ route('admin.dashboard') }}");

        // Bantuan
        $('#helpButton').on('click', () => new bootstrap.Modal('#helpModal').show());

        // Submit
        $('#btnSubmit').on('click', function () {
            const tujuan = $('input[name="ditujukan_ke"]:checked').val();
            let warningMsg = '';
            if (tujuan === 'mahasiswa_tertentu' && $('input[name="mahasiswa_tertentu[]"]').length === 0) {
                warningMsg = 'Silakan pilih minimal satu mahasiswa.';
            } else if (tujuan === 'dosen_tertentu' && $('input[name="dosen_tertentu[]"]').length === 0) {
                warningMsg = 'Silakan pilih minimal satu dosen.';
            }

            if (warningMsg) {
                return Swal.fire({
                    title: 'Peringatan',
                    text: warningMsg,
                    icon: 'warning',
                    confirmButtonColor: '#4361ee'
                });
            }

            let msg = 'Apakah Anda yakin ingin mengirim informasi ini?';
            if (tujuan === 'semua_mahasiswa') msg = 'Apakah Anda yakin ingin mengirim informasi ke SEMUA mahasiswa?';
            if (tujuan === 'semua_dosen') msg = 'Apakah Anda yakin ingin mengirim informasi ke SEMUA dosen?';
            if (tujuan === 'mahasiswa_tertentu') msg = 'Apakah Anda yakin ingin mengirim informasi ke mahasiswa terpilih?';
            if (tujuan === 'dosen_tertentu') msg = 'Apakah Anda yakin ingin mengirim informasi ke dosen terpilih?';

            Swal.fire({
                title: 'Konfirmasi Pengiriman',
                text: msg,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-paper-plane me-1"></i> Ya, Kirim',
                cancelButtonText: '<i class="fas fa-times me-1"></i> Batal',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                reverseButtons: true,
                backdrop: `rgba(0,0,123,0.4) url("/images/nyan-cat.gif") left top no-repeat`
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Mengirim Informasi',
                        html: 'Sedang memproses dan mengirim informasi...',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });
                    $('#formInformasi').submit();
                }
            });
        });

        // Auto fade alerts
        $('.alert').delay(5000).fadeOut(300, function () {
            $(this).alert('close');
        });

        // Hover animation
        $('.form-section').hover(
            function () { $(this).css('transform', 'translateY(-5px)'); },
            function () { $(this).css('transform', 'translateY(0)'); }
        );

        // Alert helper
        function warningAlert(msg) {
            return Swal.fire({
                title: 'Peringatan',
                text: msg,
                icon: 'warning',
                confirmButtonColor: '#4361ee'
            });
        }
    });
</script>
</body>
</html>