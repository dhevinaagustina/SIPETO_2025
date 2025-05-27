<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #29335C;">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center py-4">
        <img src="{{ asset('adminlte/dist/img/logo-sipeto-2.png') }}" class="sidebar-logo mb-2" alt="Logo SIPETO">
        <h5 class="text-white font-weight-bold m-0">SIPETO</h5>
        <small class="text-white d-block">Admin Dashboard</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-4 px-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @php
                    $menu = [
                        ['label' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'route' => 'admin.dashboard', 'key' => 'dashboard'],
                        ['label' => 'Data Peserta', 'icon' => 'fas fa-users', 'route' => 'admin.data-peserta', 'key' => 'data-peserta'],
                        ['label' => 'Input Hasil', 'icon' => 'fas fa-file-upload', 'route' => 'admin.input-hasil', 'key' => 'input-hasil'],
                        ['label' => 'Kelola Ujian', 'icon' => 'fas fa-calendar-alt', 'key' => 'kelola-ujian', 'submenu' => [
                            ['label' => 'Jadwal Ujian', 'icon' => 'fas fa-calendar-day', 'route' => 'admin.jadwal-ujian', 'key' => 'jadwal-ujian'],
                            ['label' => 'Sesi Ujian', 'icon' => 'fas fa-clock', 'route' => 'admin.sesi-ujian', 'key' => 'sesi-ujian'],
                        ]],
                        ['label' => 'Laporan', 'icon' => 'fas fa-chart-bar', 'key' => 'laporan', 'submenu' => [
                            ['label' => 'Statistik Peserta', 'icon' => 'fas fa-chart-line', 'route' => 'admin.statistik-peserta', 'key' => 'statistik-peserta'],
                            ['label' => 'Hasil Ujian', 'icon' => 'fas fa-file-alt', 'route' => 'admin.laporan-hasil', 'key' => 'laporan-hasil'],
                        ]],
                        ['label' => 'Pengaturan', 'icon' => 'fas fa-cog', 'route' => 'admin.pengaturan', 'key' => 'pengaturan'],
                    ];
                    
                    function isSubmenuActive($submenu, $activeMenu) {
                        foreach ($submenu as $item) {
                            if ($activeMenu == $item['key']) {
                                return true;
                            }
                        }
                        return false;
                    }
                @endphp

                @foreach ($menu as $item)
                    <li class="nav-item mb-2 {{ isset($item['submenu']) ? 'has-treeview' : '' }} {{ isset($item['submenu']) && isSubmenuActive($item['submenu'], $activeMenu) ? 'menu-open' : '' }}">
                        @if (isset($item['submenu']))
                            <a href="#" class="nav-link sidebar-button {{ isSubmenuActive($item['submenu'], $activeMenu) ? 'active-parent' : '' }}">
                                <i class="{{ $item['icon'] }} nav-icon me-2"></i>
                                <span>{{ $item['label'] }}</span>
                                <i class="right fas fa-angle-down ms-auto"></i>
                            </a>
                            <ul class="nav nav-treeview ps-4">
                                @foreach ($item['submenu'] as $sub)
                                    <li class="nav-item">
                                        <a href="{{ route($sub['route']) }}"
                                           class="nav-link sidebar-button {{ $activeMenu == $sub['key'] ? 'active' : '' }}">
                                            <i class="{{ $sub['icon'] }} nav-icon me-2"></i>
                                            <span>{{ $sub['label'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a href="{{ route($item['route']) }}"
                               class="nav-link sidebar-button {{ $activeMenu == $item['key'] ? 'active' : '' }}">
                                <i class="{{ $item['icon'] }} nav-icon me-2"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>   
        </nav>
    </div>
</aside>

<style>
.sidebar-logo {
    width: 100px;
    height: auto;
    display: block;
    margin: 0 auto 10px auto;
}

.nav-item.menu-open > .nav-link {
    background-color: rgba(255, 255, 255, 0.1) !important;
    color: white !important;
}

.sidebar-button.active,
.nav-treeview .nav-link.active {
    background-color: #ffffff !important;
    color: #29335C !important;
    font-weight: 600;
    border-radius: 8px;
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
.sidebar-button.active .nav-icon {
    color: #29335C !important;
}

.nav-icon {
    width: 20px;
    text-align: center;
    color: white;
    margin-right: 10px;
    transition: color 0.3s;
}

.nav-treeview .nav-link {
    font-size: 14px;
    padding-left: 35px;
    background-color: transparent !important;
}
</style>