<!-- sidebar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #29335C;">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center py-4">
        <img src="{{ asset('adminlte/dist/img/logo-sipeto.png') }}" class="sidebar-logo mb-2" alt="Logo SIPETO">
        <h5 class="text-white font-weight-bold m-0">SIPETO</h5>
        <small class="text-muted d-block">Sistem Pendaftaran TOEIC</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4 px-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @php $menu = [
                    ['label' => 'Beranda', 'icon' => 'fas fa-th-large', 'route' => '/dashboard', 'key' => 'dashboard'],
                    ['label' => 'Daftar Ujian', 'icon' => 'fas fa-pencil-alt', 'route' => '/daftar-ujian', 'key' => 'daftar-ujian'],
                    ['label' => 'Hasil Ujian', 'icon' => 'fas fa-calendar-alt', 'route' => '/hasil-ujian', 'key' => 'hasil-ujian'],
                    ['label' => 'Riwayat Ujian', 'icon' => 'fas fa-clock', 'route' => '/riwayat-ujian', 'key' => 'riwayat-ujian'],
                    ['label' => 'Pengajuan Surat', 'icon' => 'fas fa-pen-fancy', 'route' => '/pengajuan-surat', 'key' => 'pengajuan-surat'],
                ]; @endphp

                @foreach ($menu as $item)
                    <li class="nav-item mb-2">
                        <a href="{{ url($item['route']) }}"
                           class="nav-link sidebar-button {{ $activeMenu == $item['key'] ? 'active' : '' }}">
                            <i class="{{ $item['icon'] }} nav-icon me-2"></i>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach

                <li class="nav-item mt-4">
                    <a href="{{ route('logout') }}" class="nav-link sidebar-button text-white">
                        <i class="fas fa-sign-out-alt nav-icon me-2"></i>
                        Log out
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Tambahkan ke CSS kamu -->
<style>
.sidebar-logo {
    width: 72px;
    height: auto;
    filter: brightness(0) invert(1);
}

.sidebar .nav-link.active {
    background-color: #ffffff !important; /* Putih */
    color: #29335C !important;           /* Biru teks sesuai warna tema */
    font-weight: 600;
    border-radius: 8px;
}
.sidebar .nav-link.active i {
    color: #29335C !important;
}

.sidebar-button {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    border-radius: 8px;
    color: #ffffff;
    font-weight: 500;
    transition: all 0.3s ease;
}

.sidebar-button:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: translateX(4px);
}

.sidebar-button.active {
    background-color: #ffffff;
    color: #29335C;
    font-weight: bold;
}

.sidebar-button.active .nav-icon {
    color: #29335C;
}

.nav-icon {
    width: 20px;
    text-align: center;
    color: white;
    margin-right: 10px;
    transition: color 0.3s;
}
</style>
