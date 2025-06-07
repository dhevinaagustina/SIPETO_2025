@extends('layouts-mahasiswa.template')

@section('content')
<style>
    :root {
        --primary-color: #29335C;
        --secondary-color: #3f37c9;
        --success-color: #28AE38;
        --danger-color: #DB2B39;
        --warning-color: #f8961e;
        --light-color: #f8f9fa;
        --dark-color: #212529;
    }
    
    .mandiri-container {
        width: 97%;
        margin: 5px auto;
        animation: fadeIn 0.5s ease-in-out;
    }
    
    .mandiri-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-bottom: 20px;
    }
    
    .mandiri-header {
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .mandiri-header h4 {
        margin: 0;
        font-weight: 600;
        display: flex;
        align-items: center;
        font-size: 1.25rem;
    }
    
    .mandiri-header i {
        margin-right: 10px;
    }
    
    .registration-details {
        margin-top: 20px;
    }
    
    .detail-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-bottom: 20px;
    }
    
    .detail-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #ddd;
    }
    
    .detail-label {
        font-weight: 600;
        color: #555;
    }
    
    .detail-value {
        text-align: right;
    }
    
    .badge-success {
        background-color: var(--success-color);
        color: white;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.8rem;
    }
    
    .success-notice {
        background-color: #fff9e6;
        border-left: 4px solid var(--warning-color);
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
        display: flex;
        gap: 15px;
        align-items: center;
    }
    
    .notice-content h4 {
        color: var(--warning-color);
        margin-bottom: 10px;
        font-size: 1.1rem;
    }
    
    .notice-content p {
        margin-bottom: 10px;
        color: #5a4d00;
        font-size: 0.95rem;
    }
    
    .notice-icon svg {
        width: 30px;
        height: 30px;
    }
    
    .btn-register {
        background-color: var(--primary-color);
        color: white;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        transition: all 0.3s;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 0.95rem;
    }
    
    .btn-register:hover {
        background-color: var(--light-color);
        color: var(--primary-color);
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .mandiri-container {
            padding: 0;
        }
        
        .mandiri-card, .detail-card {
            padding: 15px;
        }
        
        .success-notice {
            flex-direction: column;
        }
    }

    .form-container {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }
    
    .form-column {
        flex: 1;
        padding: 0 15px;
        min-width: 300px;
    }
    
    .form-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: normal;
    }
    
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    .file-upload-group {
        margin-bottom: 20px;
    }
    
    .file-upload-wrapper {
        position: relative;
        margin-top: 5px;
    }
    
    .file-upload-preview {
        border: 1px dashed #ccc;
        padding: 15px;
        text-align: center;
        min-height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        border-radius: 4px;
        margin-bottom: 10px;
    }
    
    .file-upload-placeholder {
        color: #6c757d;
    }
    
    .file-upload-input {
        display: none;
    }
    
    .file-upload-button {
        display: inline-block;
        padding: 4px 12px;
        background-color: #29335C;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
        color: whitesmoke;
    }
    
    .file-upload-button:hover {
        background-color: #e0e0e0;
        color: #29335C;
    }
    
    .file-upload-info {
        display: inline-block;
        color: #6c757d;
    }
    
    .file-upload-hint {
        display: block;
        margin-top: 5px;
        color: #6c757d;
        font-size: 0.8em;
    }
    
    .file-upload-preview img {
        max-width: 100%;
        max-height: 200px;
    }
    
    .form-submit {
        text-align: center;
        margin-top: 20px;
    }
    
    .btn-primary {
        background-color: #29335C;
        border-color: #29335C;
        padding: 4px 20px;
        font-size: 1.1em;
    }
    
    @media (max-width: 768px) {
        .form-column {
            flex: 100%;
        }
    }
</style>

<div class="mandiri-container animate__animated animate__fadeIn">
    @if($sudahDaftarGratis)
        <div class="row">
            <div class="col-md-12">
                <div class="mandiri-card">
                    <div class="mandiri-header animate__animated animate__fadeInDown">
                        <h4><i class="fas fa-check-circle me-2"></i> Pendaftaran TOEIC Gratis Anda Telah Tercatat</h4>
                    </div>

                    <div class="registration-details">
                        <div class="detail-card">
                            <h4>Informasi Pendaftaran</h4>
                            <div class="detail-item">
                                <span class="detail-label">Status Pendaftaran:</span>
                                <span class="detail-value badge badge-success">Terverifikasi</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Tanggal Pendaftaran:</span>
                                <span class="detail-value">{{ \Carbon\Carbon::parse($pendaftaran->tanggal_daftar)->translatedFormat('j F Y') }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Jenis Ujian:</span>
                                <span class="detail-value">TOEIC Gratis</span>
                            </div>
                        </div>

                        <div class="success-notice">
                            <div class="notice-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFC107" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </div>
                            <div class="notice-content">
                                <h4>Perhatian Penting</h4>
                                <p>Setiap mahasiswa hanya berhak mengikuti <strong>satu kali ujian TOEIC gratis</strong> selama masa studi.</p>
                                <p>Untuk ujian berikutnya, silakan daftar melalui:</p>
                                <a href="{{ route('pendaftaran-toeic/mandiri.create') }}" class="btn btn-register">
                                    <i class="fas fa-pencil-alt"></i> Ujian TOEIC Mandiri
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data" class="form-container" id="form-data">
            @csrf
            <div class="form-row">
                <!-- Left Column -->
                <div class="form-column">
                    <div class="form-group">
                        <label for="nama"><strong>Nama</strong></label>
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nim"><strong>NIM</strong></label>
                        <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required placeholder="Masukkan NIM">
                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="prodi"><strong>Program Studi</strong></label>
                        <input id="prodi" type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}" required placeholder="Masukkan Prodi (Contoh: D4 Sistem Informasi Bisnis)">
                        @error('prodi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jurusan"><strong>Jurusan</strong></label>
                        <input id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan') }}" required placeholder="Masukkan Jurusan">
                        @error('jurusan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kampus"><strong>Kampus</strong></label>
                        <select id="kampus" class="form-control @error('kampus') is-invalid @enderror" name="kampus" required>
                            <option value="" disabled selected>Pilih kampus</option>
                            @foreach($kampusList as $kampus)
                                <option value="{{ $kampus }}" {{ old('kampus') == $kampus ? 'selected' : '' }}>{{ $kampus }}</option>
                            @endforeach
                        </select>
                        @error('kampus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="form-column">
                    <div class="form-group">
                        <label for="no_wa"><strong>No. WA</strong></label>
                        <input id="no_wa" type="text" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ old('no_wa') }}" required placeholder="Masukkan No. WA (Contoh: +62123456789)">
                        @error('no_wa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nik"><strong>NIK</strong></label>
                        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required placeholder="Masukkan NIK">
                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat_asal"><strong>Alamat Asal</strong></label>
                        <input id="alamat_asal" type="text" class="form-control @error('alamat_asal') is-invalid @enderror" name="alamat_asal" value="{{ old('alamat_asal') }}" required placeholder="Masukkan Alamat Asal">
                        @error('alamat_asal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_sekarang"><strong>Alamat Sekarang</strong></label>
                        <input id="alamat_sekarang" type="text" class="form-control @error('alamat_sekarang') is-invalid @enderror" name="alamat_sekarang" value="{{ old('alamat_sekarang') }}" required placeholder="Masukkan Alamat Sekarang">
                        @error('alamat_sekarang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- File Upload Section -->
            <div class="form-section">
                <div class="file-upload-group">
                    <label><strong>File Scan KTP</strong></label>
                    <div class="file-upload-wrapper">
                        <div class="file-upload-preview" id="ktp-preview">
                            <span class="file-upload-placeholder">Gambar Tidak Tersedia</span>
                        </div>
                        <input type="file" id="scan_ktp" name="scan_ktp" class="file-upload-input @error('scan_ktp') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf" required>
                        <label for="scan_ktp" class="file-upload-button">Pilih File</label>
                        <div class="file-upload-info">Tidak ada file yang dipilih</div>
                        <small class="file-upload-hint">[Ukuran (Max: 100 Mb)] [Ekstensi (.jpg/.png/.pdf)]</small>
                        @error('scan_ktp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="file-upload-group">
                    <label><strong>File Scan KTM</strong></label>
                    <div class="file-upload-wrapper">
                        <div class="file-upload-preview" id="ktm-preview">
                            <span class="file-upload-placeholder">Gambar Tidak Tersedia</span>
                        </div>
                        <input type="file" id="scan_ktm" name="scan_ktm" class="file-upload-input @error('scan_ktm') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf" required>
                        <label for="scan_ktm" class="file-upload-button">Pilih File</label>
                        <div class="file-upload-info">Tidak ada file yang dipilih</div>
                        <small class="file-upload-hint">[Ukuran (Max: 100 Mb)] [Ekstensi (.jpg/.png/.pdf)]</small>
                        @error('scan_ktm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="file-upload-group">
                    <label><strong>File Pas Foto Terbaru</strong></label>
                    <div class="file-upload-wrapper">
                        <div class="file-upload-preview" id="foto-preview">
                            <span class="file-upload-placeholder">Gambar Tidak Tersedia</span>
                        </div>
                        <input type="file" id="pas_foto" name="pas_foto" class="file-upload-input @error('pas_foto') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf" required>
                        <label for="pas_foto" class="file-upload-button">Pilih File</label>
                        <div class="file-upload-info">Tidak ada file yang dipilih</div>
                        <small class="file-upload-hint">[Ukuran (Max: 100 Mb)] [Ekstensi (.jpg/.png/.pdf)]</small>
                        @error('pas_foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-submit">
                <button type="button" onclick="submitForm()" class="btn btn-primary">
                    Daftar
                </button>
            </div>
        </form>
    @endif
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Flash Success Message (dari session flash Laravel) ---
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary-custom'
                },
                buttonsStyling: false
            });
        @endif

        // --- File Preview Functions ---
        function handleFilePreview(input, preview, info) {
            preview.innerHTML = '';
            info.textContent = 'Tidak ada file yang dipilih';
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                info.textContent = file.name;
                
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.innerHTML = '<span class="file-upload-placeholder">File PDF</span>';
                }
            }
        }

        function setupFileUpload(inputId, previewId, infoSelector) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const info = document.querySelector(infoSelector);
            
            if (input && preview && info) {
                input.addEventListener('change', () => handleFilePreview(input, preview, info));
            }
        }

        submitForm = () => {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Pastikan data dan dokumen yang Anda inputkan sudah benar.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Daftar!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary-custom mx-2',
                    cancelButton: 'btn btn-secondary mx-2'
                },
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-data').submit();

                    submitButton.disabled = true;
                    submitButton.innerHTML = 'Memproses...';

                    fetch('{{ route("pendaftaran.cek") }}', {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error(response.statusText);
                        return response.json();
                    })
                    .then(data => {
                        if (data.sudah_mendaftar) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Pendaftaran Gagal',
                                text: 'Anda sudah pernah mendaftar TOEIC gratis.',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-primary-custom'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            form.removeEventListener('submit', handleFormSubmission);
                            form.submit();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Silakan coba lagi beberapa saat lagi.',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn btn-primary-custom'
                            },
                            buttonsStyling: false
                        });
                    })
                    .finally(() => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Daftar';
                    });
                }
            });
        }

        // --- Form Submission with Pre-check using AJAX ---
        function handleFormSubmission(e) {
            e.preventDefault();
            const form = e.target;

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: 'Pastikan data dan dokumen yang Anda inputkan sudah benar.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Daftar!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary-custom mx-2',
                    cancelButton: 'btn btn-secondary mx-2'
                },
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const submitButton = form.querySelector('button[type="submit"]');
                    if (!submitButton) return;

                    submitButton.disabled = true;
                    submitButton.innerHTML = 'Memproses...';

                    fetch('{{ route("pendaftaran.cek") }}', {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error(response.statusText);
                        return response.json();
                    })
                    .then(data => {
                        if (data.sudah_mendaftar) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Pendaftaran Gagal',
                                text: 'Anda sudah pernah mendaftar TOEIC gratis.',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-primary-custom'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            form.removeEventListener('submit', handleFormSubmission);
                            form.submit();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Silakan coba lagi beberapa saat lagi.',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn btn-primary-custom'
                            },
                            buttonsStyling: false
                        });
                    })
                    .finally(() => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Daftar';
                    });
                }
            });
        }

        // --- Init file upload preview ---
        [
            ['scan_ktp', 'ktp-preview', '.file-upload-group:nth-child(1) .file-upload-info'],
            ['scan_ktm', 'ktm-preview', '.file-upload-group:nth-child(2) .file-upload-info'],
            ['pas_foto', 'foto-preview', '.file-upload-group:nth-child(3) .file-upload-info']
        ].forEach(([id, preview, info]) => setupFileUpload(id, preview, info));

        // --- Attach custom submission handler ---
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', handleFormSubmission);
        }
    });
</script>
@endpush
@endsection