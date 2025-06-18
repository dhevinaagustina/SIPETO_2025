@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@php
    $breadcrumb = (object) [
        'title' => __('admin/dashboard.title'),
        'list' => __('admin/dashboard.breadcrumb')
    ];

@endphp

@section('content')
<div class="container-fluid">
     <!-- Statistik Pendaftaran -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <i class="fas fa-chart-pie mr-2"></i>{{ __('admin/dashboard.statistik_pendaftaran') }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Total Pendaftaran -->
                        <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-primary">
                                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('admin/dashboard.total_mahasiswa') }}</span>
                                    <span class="info-box-number">{{ $stats['total_pendaftar'] }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{ __('admin/dashboard.seluruh_periode') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Sudah Mendaftar -->
                        <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('admin/dashboard.sudah_mendaftar') }}</span>
                                    <span class="info-box-number">{{ $stats['mahasiswa_baru'] }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $persentaseSudah }}%"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{ Str::replace(':persen', $persentaseSudah, __('admin/dashboard.persentase_dari_total')) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Belum Mendaftar -->
                        <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-times-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('admin/dashboard.belum_mendaftar') }}</span>
                                    <span class="info-box-number">{{ $stats['belum_mendaftar'] }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ $persentaseBelum }}%"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{ Str::replace(':persen', $persentaseBelum, __('admin/dashboard.persentase_dari_total')) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik Pendaftaran -->
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h3 class="card-title">{{ __('admin/dashboard.trend_pendaftaran') }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="pendaftaranChart" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h3 class="card-title">{{ __('admin/dashboard.distribusi_jurusan') }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="prodiChart" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>


                    <!-- Manajemen Mahasiswa -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                                        <h3 class="card-title mb-2 mb-md-0">
                                            <i class="fas fa-users mr-2 text-primary"></i>{{ __('admin/dashboard.cek_data_mahasiswa') }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="h-100 position-relative">
                                                <div class="small-box bg-gradient-info">
                                                    <!-- Pure decorative elements -->
                                                    <div class="floating-shapes">
                                                        <div class="shape-circle"></div>
                                                        <div class="shape-triangle"></div>
                                                    </div>
                                                    <div class="inner">
                                                        <h3>{{ __('admin/dashboard.data_mahasiswa') }}</h3>
                                                        <p>{{ __('admin/dashboard.cek_data') }}</p>

                                                        <!-- Visual decoration only -->
                                                        <div class="visual-ornament">
                                                            <div class="line-pattern"></div>
                                                            <div class="icon-grid">
                                                                <i class="fas fa-user"></i>
                                                                <i class="fas fa-book"></i>
                                                                <i class="fas fa-university"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="icon">
                                                        <i class="fas fa-user-graduate"></i>
                                                    </div>
                                                        <a href="{{ route('admin.cekdata.index') }}" class="small-box-footer">
                                                        {{ __('admin/dashboard.cek_data') }}  <i class="fas fa-arrow-right"></i>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        {{-- Kalo bisa jangan diubah ya (Note: Dhevina) --}}
                                        <h5><i class="fas fa-clock mr-2"></i>{{ __('admin/dashboard.pendaftaran_terbaru') }}</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th>{{ __('admin/dashboard.nama') }}</th>
                                                    <th>{{ __('admin/dashboard.nim') }}</th>
                                                    <th>{{ __('admin/dashboard.tanggal') }}</th>
                                                    <th>{{ __('admin/dashboard.status') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        @forelse ($pendaftaranTerbaru as $item)
                                            @if ($item->id_mahasiswa && $item->mahasiswa)
                                                <tr>
                                                    <td>{{ $item->mahasiswa->nama_mahasiswa ?? '-' }}</td>
                                                    <td>{{ $item->mahasiswa->nim ?? '-' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_daftar)->translatedFormat('d F Y') }}</td>
                                                    <td>
                                                        @if ($item->tipe_ujian === 'gratis')
                                                            <span class="badge bg-success">{{ __('admin/dashboard.gratis') }}</span>
                                                        @elseif ($item->tipe_ujian === 'mandiri')
                                                            <span class="badge bg-primary">{{ __('admin/dashboard.mandiri') }}</span>
                                                        @else
                                                            <span class="badge bg-secondary">{{ ucfirst($item->tipe_ujian) }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted"> {{ __('admin/dashboard.tidak_ada_data') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Laporan & Export Data -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title"><i class="fas fa-file-export mr-2"></i>{{ __('admin/dashboard.laporan_export') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-gradient-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('admin/dashboard.laporan_pendaftaran') }}</h3>
                                </div>
                                <div class="card-body">
                                    <p>{{ __('admin/dashboard.deskripsi_laporan') }}</p>
                                    <a href="{{ route('admin.laporan.pendaftaran') }}" class="btn btn-outline-light">
                                    <i class="fas fa-file-alt mr-1"></i> {{ __('admin/dashboard.buat_laporan') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-gradient-success">
                                <div class="card-header">
                                <h3 class="card-title">{{ __('admin/dashboard.export_excel') }}</h3>
                                </div>
                                <div class="card-body">
                                    <p>{{ __('admin/dashboard.deskripsi_excel') }}</p>
                                    <a href="{{ route('admin.laporan.export') }}?format=excel" class="btn btn-outline-light">
                                        <i class="fas fa-file-excel mr-1"></i> {{ __('admin/dashboard.export_excel_btn') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-gradient-info">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('admin/dashboard.export_pdf') }}</h3>
                                </div>
                                <div class="card-body">
                                    <p>{{ __('admin/dashboard.deskripsi_pdf') }}</p>
                                    <a href="{{ route('admin.laporan.export') }}?format=pdf" class="btn btn-outline-light">
                                    <i class="fas fa-file-pdf mr-1"></i> {{ __('admin/dashboard.export_pdf_btn') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Ambil data dari controller Laravel
    const bulan = @json($bulan);
    const jumlahPendaftar = @json($jumlahPerBulan);

    const ctx1 = document.getElementById('pendaftaranChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: bulan,
            datasets: [{
                label: "{{ __('admin/dashboard.jumlah_pendaftar') }}",
                data: jumlahPendaftar,
                borderColor: '#3c8dbc',
                backgroundColor: 'rgba(60, 141, 188, 0.1)',
                tension: 0.3,
                fill: true,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Jurusan Chart
    const ctx2 = document.getElementById('prodiChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: [
            "{{ __('admin/dashboard.ti') }}",
            "{{ __('admin/dashboard.mesin') }}",
            "{{ __('admin/dashboard.sipil') }}",
            "{{ __('admin/dashboard.kimia') }}",
            "{{ __('admin/dashboard.niaga') }}",
            "{{ __('admin/dashboard.elektro') }}",
            "{{ __('admin/dashboard.akuntansi') }}"
        ],

            datasets: [{
                data: [55, 2, 21, 3, 5, 19, 2],
                backgroundColor: [
                '#FFDF00', // TI - Kuning
                '#00bfff', // Mesin - Biru 
                '#8B4513', // Sipil - Coklat
                '#28AE38', // Kimia - Hijau 
                '#9b59b6', // Administrasi Niaga - Ungu
                '#e67e22', // Elektro - Oranye
                '#DB2B39'  // Akuntansi - Merah 
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            },
            cutout: '70%'
        }
    });
</script>
@endpush

<style>
    .info-box {
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        border-radius: .25rem;
        background-color: #fff;
        display: flex;
        margin-bottom: 1rem;
        min-height: 80px;
        padding: .5rem;
        position: relative;
    }
    
    .info-box .info-box-icon {
        border-radius: .25rem;
        -ms-flex-align: center;
        align-items: center;
        display: flex;
        font-size: 1.875rem;
        justify-content: center;
        text-align: center;
        width: 70px;
    }
    
    .info-box .info-box-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        line-height: 1.8;
        flex: 1;
        padding: 0 10px;
    }
    
    .info-box .info-box-text {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .info-box .info-box-number {
        display: block;
        font-weight: 700;
    }

     .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }
    
    .shape-circle {
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 2px dashed rgba(255,255,255,0.3);
        top: 20%;
        left: 10%;
        animation: float 6s ease-in-out infinite;
    }
    
    .visual-ornament {
        margin-top: 20px;
    }
    
    .line-pattern {
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
        margin: 15px 0;
    }
    
    .icon-grid {
        display: flex;
        justify-content: space-around;
        color: rgba(255,255,255,0.7);
        font-size: 18px;
    }
    
    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        25% { transform: translate(5px, 5px) rotate(2deg); }
        50% { transform: translate(0, 10px) rotate(0deg); }
        75% { transform: translate(-5px, 5px) rotate(-2deg); }
    }
    
    .small-box {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        min-height: 200px; /* Tinggi minimum */
        height: 100%; /* Jika parent punya height tertentu */
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }

    .small-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .small-box > .inner {
        flex: 1; /* Mengisi ruang tersisa */
        padding: 20px;
        position: relative;
        z-index: 1;
    }

    .small-box h3 {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 5px;
        padding: 0;
        color: white;
    }

    .small-box p {
        font-size: 20px;
        margin: 0;
        color: rgba(255,255,255,0.9);
    }

    .small-box .icon {
        color: rgba(255,255,255,0.2);
        z-index: 0;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 80px;
        transition: all 0.3s ease;
    }

    .small-box:hover .icon {
        font-size: 85px;
        color: rgba(255,255,255,0.25);
    }

    .small-box-footer {
        background-color: rgba(0,0,0,0.1);
        color: white;
        display: block;
        padding: 10px 0;
        position: relative;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
        z-index: 1;
        font-weight: 500;
    }

    .small-box-footer:hover {
        background-color: rgba(0,0,0,0.2);
        color: white;
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #17a2b8 0%, #1abc9c 100%);
    }
</style>
@endsection