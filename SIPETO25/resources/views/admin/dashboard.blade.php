@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@php
    // Set breadcrumb for admin dashboard
    $breadcrumb = (object) [
        'title' => 'Dashboard Admin',
        'list' => ['Home', 'Dashboard']
    ];
@endphp

@section('content')
<div class="container-fluid">
    <!-- Stats Cards Row -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card animate__animated animate__fadeIn">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-2">Total Peserta</h5>
                            <h2 class="mb-0">{{ $stats['total_peserta'] }}</h2>
                        </div>
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                    <p class="text-success mt-3 mb-0">
                        <i class="fas fa-arrow-up mr-1"></i> 12% dari bulan lalu
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card stat-card animate__animated animate__fadeIn animate__delay-1s">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-2">Tingkat Kelulusan</h5>
                            <h2 class="mb-0">{{ $stats['kelulusan'] }}%</h2>
                        </div>
                        <div class="icon-circle bg-success">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                    </div>
                    <p class="text-success mt-3 mb-0">
                        <i class="fas fa-arrow-up mr-1"></i> 5% dari periode lalu
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card stat-card animate__animated animate__fadeIn animate__delay-2s">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-2">Pengajuan Surat</h5>
                            <h2 class="mb-0">{{ $stats['pengajuan_surat'] }}</h2>
                        </div>
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                    </div>
                    <p class="text-danger mt-3 mb-0">
                        <i class="fas fa-arrow-down mr-1"></i> 2 dari minggu lalu
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card stat-card animate__animated animate__fadeIn animate__delay-3s">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-2">Ujian Mendatang</h5>
                            <h2 class="mb-0">{{ $stats['ujian_mendatang'] }}</h2>
                        </div>
                        <div class="icon-circle bg-info">
                            <i class="fas fa-calendar-check text-white"></i>
                        </div>
                    </div>
                    <p class="text-info mt-3 mb-0">
                        <i class="fas fa-clock mr-1"></i> 1 minggu lagi
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card animate__animated animate__fadeIn">
                <div class="card-header border-0 bg-white">
                    <h3 class="card-title">Perkembangan Peserta Ujian</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="participantsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card animate__animated animate__fadeIn">
                <div class="card-header border-0 bg-white">
                    <h3 class="card-title">Distribusi Skor</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="scoreDistributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Registrations Row -->
    <div class="row">
        <div class="col-12">
            <div class="card animate__animated animate__fadeIn">
                <div class="card-header border-0 bg-white">
                    <h3 class="card-title">Pendaftaran Terbaru</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Program Studi</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>12345678</td>
                                <td>Teknik Informatika</td>
                                <td>20 Mei 2025</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>12345679</td>
                                <td>Sistem Informasi</td>
                                <td>19 Mei 2025</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Michael Johnson</td>
                                <td>12345680</td>
                                <td>Manajemen</td>
                                <td>18 Mei 2025</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route('admin.data-peserta') }}" class="btn btn-sm btn-secondary float-right">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Participants Chart
    const ctx1 = document.getElementById('participantsChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Peserta',
                data: [120, 190, 150, 200, 170, 240, 210, 180, 220, 250, 230, 300],
                borderColor: '#29335C',
                backgroundColor: 'rgba(41, 51, 92, 0.1)',
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

    // Score Distribution Chart
    const ctx2 = document.getElementById('scoreDistributionChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['400-500', '501-600', '601-700', '701-800', '801-900', '901-990'],
            datasets: [{
                data: [15, 25, 30, 20, 7, 3],
                backgroundColor: [
                    '#FF6B35',
                    '#FFA630',
                    '#1E90FF',
                    '#6A4C93',
                    '#29335C',
                    '#1E4B8F'
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

@php
    // Data dummy untuk preview
    $user = (object)[
        'name' => 'Admin Dummy',
        'photo' => 'https://randomuser.me/api/portraits/women/45.jpg'
    ];
    
    $stats = [
        'total_peserta' => 1240,
        'kelulusan' => 68,
        'pengajuan_surat' => 24,
        'ujian_mendatang' => 3
    ];
@endphp

<style>
    .stat-card {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    
    .card-title {
        color: #29335C;
        font-weight: 600;
    }
    
    table.table thead th {
        background-color: #f8f9fa;
        color: #29335C;
        font-weight: 600;
    }
</style>
@endsection