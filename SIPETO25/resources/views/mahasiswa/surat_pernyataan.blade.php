@extends('layouts-mahasiswa.template')

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
    .table-custom tbody tr:hover {
        background-color: #f0f4ff;
        cursor: pointer;
    }
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 16px;
        font-size: 14px;
        font-weight: 500;
        color: white;
        text-align: center;
        min-width: 80px;
    }
    .badge-selesai {
        background-color: #4CAF50;
    }
    .badge-proses {
        background-color: #ffbc02;
    }
    .no-data {
        color: #6c757d;
        padding: 20px;
        text-align: center;
        font-style: italic;
    }
    .btn-primary-custom {
        background-color: #29335C;
        border-color: #29335C;
        color: #fff 
    }
    .btn-primary-custom:hover {
        background-color: #1f294a;
        border-color: #1f294a;
        color: #fff 
    }
    .btn-info-custom {
        background-color: #2196F3;
        border-color: #2196F3;
        color: #fff 
    }
    .btn-info-custom:hover {
        background-color: #0b7dda;
        border-color: #0a78d1;
        color: #fff 
    }
    .filter-container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 20px;
        gap: 10px;
    }

    .entries-filter-group {
        display: flex;
        align-items: center;
        gap: 28px;
    }

    .entries-dropdown {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .entries-dropdown select {
        width: 60px;
        padding: 6px;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }

    #filterStatus {
        width: 300px;
        padding: 6px;
        margin-left: 0;
    }

    .action-buttons {
        margin-left: auto;
    }

    @media (max-width: 768px) {
        .filter-container {
            flex-direction: row;
            gap: 8px;
        }
        
        .entries-filter-group {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }
        
        .entries-dropdown, 
        #filterStatus {
            width: 100%;
        }
        
        .action-buttons {
            width: 100%;
            margin-left: 0;
            margin-top: 8px;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="filter-container">
            <div class="entries-filter-group">
                <div class="entries-dropdown">
                    <span>{{ __('mahasiswa/surat.tampilkan') }}</span>
                    <select id="entriesSelect" name="entriesSelect" class="form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="-1">{{ __('mahasiswa/surat.entri') }}</option>
                    </select>
                    <span>{{ __('mahasiswa/surat.entri') }}</span>
                </div>

                <select id="filterStatus" class="form-control">
                    <option value="">{{ __('mahasiswa/surat.filter') }}</option>
                    <option value="selesai">{{ __('mahasiswa/surat.selesai') }}</option>
                    <option value="proses">{{ __('mahasiswa/surat.proses') }}</option>
                </select>
            </div>

            <div class="action-buttons">
                <button id="btnCekAjukan" class="btn btn-primary-custom">{{ __('mahasiswa/surat.ajukan') }}</button>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table-custom" id="pengajuanTable">
            <thead>
                <tr>
                    <th style="width: 50px;">{{ __('mahasiswa/surat.no') }}</th>
                    <th>{{ __('mahasiswa/surat.nim') }}</th>
                    <th>{{ __('mahasiswa/surat.nama') }}</th>
                    <th>{{ __('mahasiswa/surat.tanggal') }}</th>
                    <th>{{ __('mahasiswa/surat.status') }}</th>
                    <th>{{ __('mahasiswa/surat.catatan') }}</th>
                    <th>{{ __('mahasiswa/surat.file_surat') }}</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($daftarSurat) && count($daftarSurat) > 0)
                    @foreach ($daftarSurat as $i => $surat)
                        <tr data-status="{{ $surat->status }}">
                            <td>{{ $i + 1 }}</td>
                            <td>{{ auth('mahasiswa')->user()->nim }}</td>
                            <td>{{ auth('mahasiswa')->user()->nama_mahasiswa }}</td>
                            <td>{{ \Carbon\Carbon::parse($surat->tanggal_pengajuan)->translatedFormat('d F Y') }}</td>
                            <td>
                                @if ($surat->status_validasi === 'ditolak')
                                    <span class="status-badge badge-proses" style="background-color: #f44336;">{{ __('mahasiswa/surat.ditolak') }}</span>
                                @elseif ($surat->status === 'selesai')
                                    <span class="status-badge badge-selesai">{{ __('mahasiswa/surat.selesai') }}</span>
                                @else
                                    <span class="status-badge badge-proses">{{ __('mahasiswa/surat.proses') }}</span>
                                @endif
                            </td>

                            <td>
                                @if ($surat->status_validasi === 'ditolak')
                                    <span class="text-danger">{{ $surat->catatan_validasi ?? '-' }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

                            <td>
                                @if ($surat->file_surat)
                                    <a href="{{ Storage::url($surat->file_surat) }}" class="btn btn-sm btn-info-custom" target="_blank">{{ __('mahasiswa/surat.lihat') }}</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="no-data">
                            {{ __('mahasiswa/surat.belum_ada_pengajuan') }}
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>

<!-- Modal Upload Lampiran --> 
<div class="modal fade" id="modalUploadLampiran" tabindex="-1" role="dialog" aria-labelledby="modalUploadLampiranLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formUploadLampiran" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalUploadLampiranLabel">{{ __('mahasiswa/surat.upload_lampiran_judul') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="lampiran_1">{{ __('mahasiswa/surat.lampiran_1') }}</label>
            <input type="file" class="form-control-file" id="lampiran_1" name="lampiran_1"
                   accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx" required>
            <div id="preview_1" class="mt-2"></div>
          </div>
          <div class="form-group">
            <label for="lampiran_2">{{ __('mahasiswa/surat.lampiran_2') }}</label>
            <input type="file" class="form-control-file" id="lampiran_2" name="lampiran_2"
                   accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx" required>
            <div id="preview_2" class="mt-2"></div>
          </div>
          <small class="form-text text-muted">
            {{ __('mahasiswa/surat.format_info') }}
          </small>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary-custom">{{ __('mahasiswa/surat.kirim') }}</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('mahasiswa/surat.batal') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>


@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fungsi preview file
    function previewFile(inputElem, previewElemId) {
        const previewEl = document.getElementById(previewElemId);
        previewEl.innerHTML = '';
        const file = inputElem.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => {
            const url = e.target.result;
            const type = file.type;

            if (type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = url;
                img.style.maxWidth = '100%';
                img.style.maxHeight = '200px';
                img.classList.add('img-thumbnail');
                previewEl.appendChild(img);
            } else if (type === 'application/pdf') {
                const embed = document.createElement('embed');
                embed.src = url;
                embed.type = 'application/pdf';
                embed.width = '100%';
                embed.height = '200px';
                previewEl.appendChild(embed);
            } else {
                const icon = document.createElement('p');
                icon.textContent = `File: ${file.name}`;
                previewEl.appendChild(icon);
            }
        };

        if (file.type.startsWith('image/') || file.type === 'application/pdf') {
            reader.readAsDataURL(file);
        } else {
            const p = document.createElement('p');
            p.textContent = `File: ${file.name}`;
            previewEl.appendChild(p);
        }
    }

    // Event listener untuk preview lampiran
    const inputLampiran1 = document.getElementById('lampiran_1');
    const inputLampiran2 = document.getElementById('lampiran_2');
    if (inputLampiran1) {
        inputLampiran1.addEventListener('change', function () {
            previewFile(this, 'preview_1');
        });
    }
    if (inputLampiran2) {
        inputLampiran2.addEventListener('change', function () {
            previewFile(this, 'preview_2');
        });
    }

    // Filter tabel pengajuan
    function filterTable() {
        const status = $('#filterStatus').val().toLowerCase();
        const rowsPerPage = parseInt($('#entriesSelect').val());
        let visibleRows = 0;

        $('#pengajuanTable tbody tr').each(function () {
            const rowStatus = $(this).data('status');
            const statusMatch = status === '' || rowStatus === status;

            if (statusMatch && !$(this).hasClass('no-data-row')) {
                $(this).show();
                visibleRows++;
                if (rowsPerPage > 0 && visibleRows > rowsPerPage) {
                    $(this).hide();
                }
            } else {
                $(this).hide();
            }
        });

        if (visibleRows === 0) {
            $('#pengajuanTable tbody .no-data-row').remove();
            $('#pengajuanTable tbody').append(
                '<tr class="no-data-row"><td colspan="6" class="no-data">Tidak ada data yang sesuai dengan filter</td></tr>'
            );
        } else {
            $('#pengajuanTable tbody .no-data-row').remove();
        }
    }

    $('#filterStatus, #entriesSelect').on('change', filterTable);
    filterTable();

    // Cek kelayakan sebelum ajukan surat
    const btnCekAjukan = document.getElementById('btnCekAjukan');
    btnCekAjukan.addEventListener('click', function () {
        fetch("{{ route('mahasiswa.surat_pernyataan.cek') }}", {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
        if (data.status) {
            Swal.fire({
                title: '@lang("mahasiswa/surat.konfirmasi_judul")',
                html: '@lang("mahasiswa/surat.konfirmasi_html")',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '@lang("mahasiswa/surat.konfirmasi_ok")',
                cancelButtonText: '@lang("mahasiswa/surat.konfirmasi_batal")',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom mx-2',
                        cancelButton: 'btn btn-secondary mx-2'
                    },
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalUploadLampiran').modal('show');
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: '@lang("mahasiswa/surat.peringatan_judul")',
                    text: data.message,
                    confirmButtonText: '@lang("mahasiswa/surat.peringatan_tombol")',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom'
                    },
                    buttonsStyling: false
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: '@lang("mahasiswa/surat.alert.upload_error")',
                text: '@lang("mahasiswa/surat.alert.upload_retry")',
                confirmButtonText: '@lang("mahasiswa/surat.alert.ok_button")',
                customClass: {
                    confirmButton: 'btn btn-primary-custom'
                },
                buttonsStyling: false
            });
        });
    });

    // Proses submit form lampiran
    const formUpload = document.getElementById('formUploadLampiran');
    formUpload.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(formUpload);
        const maxSize = 2 * 1024 * 1024;
        const lampiran1 = formData.get('lampiran_1');
        const lampiran2 = formData.get('lampiran_2');

        if ((lampiran1 && lampiran1.size > maxSize) || (lampiran2 && lampiran2.size > maxSize)) {
            Swal.fire({
                icon: 'warning',
                title: '@lang("mahasiswa/surat.alert.file_too_large_title")',
                text: '@lang("mahasiswa/surat.alert.file_too_large_text")',
                confirmButtonText: '@lang("mahasiswa/surat.alert.ok_button")',
                customClass: {
                    confirmButton: 'btn btn-primary-custom'
                },
                buttonsStyling: false
            });
            return;
        }

        fetch("{{ route('mahasiswa.surat_pernyataan.ajukan') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            $('#modalUploadLampiran').modal('hide');
            if (data.status) {
                Swal.fire({
                    icon: 'success',
                    title: '@lang("mahasiswa/surat.alert.upload_success_title")',
                    text: data.message,
                    confirmButtonText: '@lang("mahasiswa/surat.alert.ok_button")',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom'
                    },
                    buttonsStyling: false
                }).then(() => location.reload());
            } else {
                Swal.fire({
                    icon: 'error',
                    title: '@lang("mahasiswa/surat.alert.upload_failed_title")',
                    text: data.message,
                    confirmButtonText: '@lang("mahasiswa/surat.alert.ok_button")',
                    customClass: {
                        confirmButton: 'btn btn-primary-custom'
                    },
                    buttonsStyling: false
                });
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: '@lang("mahasiswa/surat.alert.upload_error")',
                text: '@lang("mahasiswa/surat.alert.upload_retry")',
                confirmButtonText: '@lang("mahasiswa/surat.alert.ok_button")',
                customClass: {
                    confirmButton: 'btn btn-primary-custom'
                },
                buttonsStyling: false
            });
        });
    });
});
</script>
@endpush

@endsection