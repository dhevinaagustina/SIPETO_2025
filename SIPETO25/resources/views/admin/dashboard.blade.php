@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@php
    $breadcrumb = (object) [
        'title' => 'Dashboard Admin',
        'list' => ['Home', 'Dashboard']
    ];
    
    $stats = [
        'total_pendaftar' => 1240,
        'pendaftar_bulan_ini' => 156,
        'mahasiswa_baru' => 84,
        'belum_mendaftar' => 72
    ];
    
    $pendaftaranTerbaru = [
        (object) [
            'nama' => 'Dini Elminingtyas Rahayu Wilujeng',
            'nim' => '2341760078',
            'tanggal' => '25 Mei 2025',
            'status' => 'Gratis'
        ],
        (object) [
            'nama' => 'Dini Elminingtyas Rahayu Wilujeng',
            'nim' => '2341760078',
            'tanggal' => '25 Mei 2025',
            'status' => 'Mandiri'
        ],
        (object) [
            'nama' => 'Danica Naswya Putrinlar',
            'nim' => '2341760076',
            'tanggal' => '23 Mei 2025',
            'status' => 'Mandiri'
        ],
        (object) [
            'nama' => 'Danica Naswya Putrinlar',
            'nim' => '2341760076',
            'tanggal' => '22 Mei 2025',
            'status' => 'Gratis'
        ]
    ];
@endphp

@section('content')
<div class="container-fluid">
    <!-- Statistik Pendaftaran -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title"><i class="fas fa-chart-pie mr-2"></i>Statistik Pendaftaran</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Total Pendaftaran -->
                        <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-primary">
                                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pendaftaran</span>
                                    <span class="info-box-number">{{ $stats['total_pendaftar'] }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        Seluruh periode
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Sudah Mendaftar -->
                        <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Sudah Mendaftar</span>
                                    <span class="info-box-number">{{ $stats['mahasiswa_baru'] }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 53.8%"></div>
                                    </div>
                                    <span class="progress-description">
                                        53.8% dari pendaftar bulan ini
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Belum Mendaftar -->
                        <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-times-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Belum Mendaftar</span>
                                    <span class="info-box-number">{{ $stats['belum_mendaftar'] }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 46.2%"></div>
                                    </div>
                                    <span class="progress-description">
                                        46.2% dari pendaftar bulan ini
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
                                    <h3 class="card-title">Trend Pendaftaran 6 Bulan Terakhir</h3>
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
                                    <h3 class="card-title">Distribusi Prodi</h3>
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
            </div>
        </div>
    </div>

    <!-- Manajemen Mahasiswa -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-users mr-2"></i>Manajemen Mahasiswa</h3>
                    <div>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-list mr-1"></i> Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-search mr-2"></i>Cari Mahasiswa</h5>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nama atau NIM...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $stats['mahasiswa_baru'] }}</h3>
                                    <p>Mahasiswa Baru Bulan Ini</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <a href="{{ route('mahasiswa.baru') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-clock mr-2"></i>Pendaftaran Terbaru</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pendaftaranTerbaru as $item)
                                            <tr>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nim }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>
                                                    @if(strtolower($item->status) === 'gratis')
                                                        <span class="badge bg-success">Gratis</span>
                                                    @else
                                                        <span class="badge bg-primary">Mandiri</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
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
                    <h3 class="card-title"><i class="fas fa-file-export mr-2"></i>Laporan & Export Data</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-gradient-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Laporan Pendaftaran</h3>
                                </div>
                                <div class="card-body">
                                    <p>Generate laporan pendaftaran berdasarkan periode atau kriteria tertentu</p>
                                    <a href="{{ route('laporan.pendaftaran') }}" class="btn btn-outline-light">
                                        <i class="fas fa-file-alt mr-1"></i> Buat Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-gradient-success">
                                <div class="card-header">
                                    <h3 class="card-title">Export Data Excel</h3>
                                </div>
                                <div class="card-body">
                                    <p>Export data mahasiswa dalam format Excel untuk pengolahan lebih lanjut</p>
                                    <a href="{{ route('laporan.export') }}?format=excel" class="btn btn-outline-light">
                                        <i class="fas fa-file-excel mr-1"></i> Export Excel
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-gradient-info">
                                <div class="card-header">
                                    <h3 class="card-title">Export Data PDF</h3>
                                </div>
                                <div class="card-body">
                                    <p>Export data mahasiswa dalam format PDF untuk keperluan dokumentasi</p>
                                    <a href="{{ route('laporan.export') }}?format=pdf" class="btn btn-outline-light">
                                        <i class="fas fa-file-pdf mr-1"></i> Export PDF
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
    // Pendaftaran Chart
    const ctx1 = document.getElementById('pendaftaranChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Jumlah Pendaftar',
                data: [120, 150, 180, 140, 200, 240],
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
                    display: false
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

    // Prodi Chart
    const ctx2 = document.getElementById('prodiChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Teknik Informatika', 'Sistem Informasi', 'Manajemen', 'Akuntansi', 'Lainnya'],
            datasets: [{
                data: [35, 25, 20, 15, 5],
                backgroundColor: [
                    '#f56954',
                    '#00a65a',
                    '#f39c12',
                    '#00c0ef',
                    '#3c8dbc'
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
    
    .small-box {
        border-radius: .25rem;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        display: block;
        margin-bottom: 20px;
        position: relative;
    }
    
    .small-box > .inner {
        padding: 10px;
    }
    
    .small-box h3 {
        font-size: 38px;
        font-weight: 700;
        margin: 0 0 10px;
        padding: 0;
        white-space: nowrap;
    }
    
    .small-box p {
        font-size: 15px;
    }
    
    .small-box .icon {
        color: rgba(0,0,0,.15);
        z-index: 0;
        position: absolute;
        right: 15px;
        top: 15px;
        font-size: 70px;
        transition: all .3s linear;
    }
    
    .small-box:hover .icon {
        font-size: 75px;
    }
</style>
@endsection