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
    
    .feature-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 20px;
    }
    
    .feature-list li {
        padding: 12px 15px;
        margin-bottom: 8px;
        background-color: rgba(248, 249, 250, 0.5);
        border-radius: 8px;
        transition: all 0.3s ease;
        line-height: 1.5;
        font-size: 0.95rem;
    }
    
    .feature-list li:hover {
        background-color: rgba(67, 97, 238, 0.05);
        transform: translateX(5px);
    }
    
    .feature-list i {
        color: var(--success-color);
        margin-right: 8px;
        font-size: 1rem;
    }
    
    .price {
        font-weight: bold;
        color: var(--danger-color);
        font-size: 1rem;
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
    
    .faq-card {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 25px;
    }
    
    .faq-header {
        color: var(--primary-color);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    
    .faq-header i {
        margin-right: 10px;
    }
    
    .faq-header h5 {
        font-size: 1.2rem;
        margin: 0;
    }
    
    .faq-item {
        padding: 12px 15px;
        background-color: rgba(248, 249, 250, 0.5);
        border-radius: 8px;
        margin-bottom: 10px;
    }
    
    .faq-item h6 {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 1rem;
    }
    
    .faq-item p {
        margin-bottom: 0;
        font-size: 0.9rem;
        line-height: 1.5;
    }
    
    .modal-content {
        border-radius: 15px;
        overflow: hidden;
    }
    
    .modal-header {
        background-color: var(--primary-color);
        color: white;
    }
    
    .modal-footer .btn {
        border-radius: 30px;
        padding: 8px 20px;
    }
    
    .text-muted {
        font-size: 0.85rem;
        margin-top: 10px !important;
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
        
        .mandiri-card, .faq-card {
            padding: 15px;
        }
        
        .feature-list li {
            padding: 10px 12px;
            font-size: 0.9rem;
        }
        
        .btn-register {
            width: 100%;
            padding: 12px;
        }
    }
</style>

<div class="mandiri-container animate__animated animate__fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="mandiri-card">
                <div class="mandiri-header animate__animated animate__fadeInDown">
                    <h4><i class="fas fa-info-circle me-2"></i> {{ __('mahasiswa/daftar_ujian.mandiri.title') }}</h4>
                </div>

                <div class="info-content">
                    <ul class="feature-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            {{ __('mahasiswa/daftar_ujian.mandiri.info.sudah_ujian_gratis') }}
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            {{ __('mahasiswa/daftar_ujian.mandiri.info.untuk_alumni_dosen') }}
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            {!! __('mahasiswa/daftar_ujian.mandiri.info.biaya') !!}
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            {{ __('mahasiswa/daftar_ujian.mandiri.info.pendaftaran') }}
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            {{ __('mahasiswa/daftar_ujian.mandiri.info.standar') }}
                        </li>
                    </ul>

                    <div class="text-center">
                        <button type="button" class="btn btn-register" data-toggle="modal" data-target="#confirmModal">
                            {{ __('mahasiswa/daftar_ujian.mandiri.kunjungi') }} <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                        <p class="text-muted">{{ __('mahasiswa/daftar_ujian.mandiri.redirect_note') }}</p>

                        <form id="mandiriForm" action="{{ route('pendaftaran-toeic/mandiri.store') }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="faq-card">
                <div class="faq-header">
                    <i class="fas fa-question-circle"></i>
                    <h5>{{ __('mahasiswa/daftar_ujian.mandiri.faq_title') }}</h5>
                </div>

                <div class="faq-content">
                    <div class="faq-item">
                        <h6>{{ __('mahasiswa/daftar_ujian.mandiri.faq.q1') }}</h6>
                        <p>{{ __('mahasiswa/daftar_ujian.mandiri.faq.a1') }}</p>
                    </div>
                    <div class="faq-item">
                        <h6>{{ __('mahasiswa/daftar_ujian.mandiri.faq.q2') }}</h6>
                        <p>{{ __('mahasiswa/daftar_ujian.mandiri.faq.a2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">{{ __('mahasiswa/daftar_ujian.mandiri.modal.title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('mahasiswa/daftar_ujian.mandiri.modal.no') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('mahasiswa/daftar_ujian.mandiri.modal.body') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('mahasiswa/daftar_ujian.mandiri.modal.no') }}</button>
                <button type="button" id="confirmBtn" class="btn btn-primary">{{ __('mahasiswa/daftar_ujian.mandiri.modal.yes') }}</button>
            </div>

            <!-- FORM INI YANG DIGUNAKAN -->
            <form id="mandiriForm" action="{{ route('pendaftaran-toeic/mandiri.store') }}" method="POST" style="display:none;">
                @csrf
                <input type="hidden" name="tipe_ujian" value="mandiri">
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('confirmBtn').addEventListener('click', function() {
            document.getElementById('mandiriForm').submit(); // kirim form ke Laravel
        });


        // Add hover effect to feature items
        $('.feature-list li').hover(
            function() {
                $(this).css('transform', 'translateX(5px)');
            },
            function() {
                $(this).css('transform', 'translateX(0)');
            }
        );
    });
</script>
@endsection