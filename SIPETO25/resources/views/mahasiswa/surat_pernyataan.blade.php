@extends('layouts-mahasiswa.template')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Pengajuan Surat Pernyataan</h4>
        <button id="btnCekAjukan" class="btn btn-primary">Ajukan</button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped m-0">
                <thead style="background-color: #29335C; color: white; text-align: center;">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if ($sudahMengajukan && isset($daftarSurat))
                        @foreach ($daftarSurat as $i => $surat)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ auth('mahasiswa')->user()->nim }}</td>
                                <td>{{ auth('mahasiswa')->user()->nama_mahasiswa }}</td>
                                <td>{{ \Carbon\Carbon::parse($surat->tanggal_pengajuan)->format('d-m-Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ $surat->status === 'selesai' ? 'success' : 'danger' }}">
                                        {{ $surat->status === 'selesai' ? 'Selesai' : 'Proses' }}
                                    </span>
                                </td>
                                <td>
                                    @if ($surat->file_surat)
                                        <a href="{{ Storage::url($surat->file_surat) }}" class="btn btn-sm btn-info" target="_blank">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-muted">Belum ada pengajuan surat.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
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
                    title: 'Konfirmasi Pengajuan',
                    html: 'Pastikan Anda adalah <strong>mahasiswa tingkat akhir</strong> atau <strong>mahasiswa yang benar-benar membutuhkan surat pernyataan ini</strong>.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Saya Mengerti',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-primary me-2',
                        cancelButton: 'btn btn-secondary'
                    },
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        ajukanSurat();
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: data.message
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Silakan coba lagi nanti.'
            });
        });
    });

    function ajukanSurat() {
        fetch("{{ route('mahasiswa.surat_pernyataan.ajukan') }}", {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message
                }).then(() => location.reload());
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: data.message
                });
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Silakan coba lagi nanti.'
            });
        });
    }
});
</script>
@endpush
