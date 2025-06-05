@extends('layouts-mahasiswa.template')

@section('content')
<div class="container-fluid mandiri-container px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mandiri-card mb-4">
                <div class="card-body">
                    <div class="info-content">
                        <div class="icon-text mb-3">
                            <i class="fas fa-info-circle text-primary mr-2"></i>
                            <h4 class="d-inline-block">Informasi Ujian Mandiri</h4>
                        </div>
                        <ul class="feature-list mb-4">
                            <li>
                                <i class="fas fa-check-circle text-success mr-2"></i>
                                Untuk mahasiswa yang sudah mengikuti ujian gratis tetapi belum mencapai skor minimal
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success mr-2"></i>
                                Biaya pendaftaran: <span class="price">Rp450.000</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success mr-2"></i>
                                Pendaftaran melalui website resmi ITC
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success mr-2"></i>
                                Sistem ujian terstandar internasional
                            </li>
                        </ul>
                        <div class="text-center">
                            <!-- Ubah tombol submit jadi button biasa -->
                            <button type="button" class="btn btn-register" data-toggle="modal" data-target="#confirmModal">
                                Kunjungi Website <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            <p class="mt-2 small text-muted">Anda akan diarahkan ke situs resmi ITC</p>

                            <!-- Form tetap disimpan, tapi tanpa tombol submit -->
                            <form id="mandiriForm" action="{{ route('pendaftaran-toeic/mandiri.store') }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </div>

                        <!-- Modal Konfirmasi -->
                        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pendaftaran Mandiri</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda benar-benar ingin melakukan pendaftaran mandiri?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <button type="button" id="confirmBtn" class="btn btn-primary">Ya</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-question-circle text-primary mr-2"></i> Pertanyaan Umum</h5>
                    <div class="faq-item">
                        <br><br>
                        <h6>Bagaimana cara pembayaran ujian mandiri?</h6>
                        <p>Pembayaran dilakukan melalui website ITC setelah mengisi formulir pendaftaran.</p>
                    </div>
                    <div class="faq-item">
                        <h6>Apakah ada perbedaan materi ujian gratis dan mandiri?</h6>
                        <p>Tidak ada, kedua ujian menggunakan standar dan materi TOEIC yang sama.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .mandiri-container {
        margin-top: 10px;
        padding: 0 15px;
    }

    .mandiri-card, .additional-info .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        width: 100%;
    }

    .info-content h4 {
        color: #29335C;
        font-weight: 600;
    }

    .feature-list {
        list-style: none;
        padding-left: 0;
    }

    .feature-list li {
        padding: 8px 0;
        border-bottom: 1px dashed #eee;
    }

    .feature-list li:last-child {
        border-bottom: none;
    }

    .price {
        font-weight: bold;
        color: #d32f2f;
    }

    .btn-register {
        background-color: #29335C;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s;
        display: inline-block;
    }

    .btn-register:hover {
        background-color: #1a2238;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: white;
    }

    .faq-item {
        margin-bottom: 15px;
    }

    .faq-item h6 {
        color: #29335C;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .btn-register {
            width: 100%;
            padding: 12px 20px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('confirmBtn').addEventListener('click', function() {
            // Ganti URL ini ke website resmi ITC yang sebenarnya
            const urlITC = 'https://itc-indonesia.com/contact-us-2/';

            // Buka di tab baru
            window.open(urlITC, '_blank');

            // Tutup modal setelah klik
            $('#confirmModal').modal('hide');
        });
    });
</script>
@endsection