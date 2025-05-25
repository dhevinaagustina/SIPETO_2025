@extends('layouts-mahasiswa.template')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="mb-2">
                <p class="mb-4" style="font-size: 1.1rem; line-height: 1.6;">🎓 Ujian mandiri diperuntukkan bagi mahasiswa yang telah mengikuti ujian gratis namun belum mencapai skor minimal, dapat diikuti melalui website resmi ITC dengan biaya pendaftaran sebesar Rp450.000.</p>
                <a href="{{ $urlItc }}" class="btn btn-primary" target="_blank" style="padding: 8px 16px; font-size: 0.9rem;">
                    Kunjungi Website <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .btn-primary {
        background-color: #29335C;
        border-color: #29335C;
        font-weight: bold;
    }
    .btn-primary:hover {
        background-color: #e0e0e0;
        color: #29335C
    }
</style>
@endsection