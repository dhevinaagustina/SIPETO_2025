<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #29335C;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-center py-4">
        <img src="{{ asset('adminlte/dist/img/logo-sipeto-2.png') }}" class="sidebar-logo mb-2" alt="Logo SIPETO">
        <h5 class="text-white font-weight-bold m-0">SIPETO</h5>
        <small class="text-white d-block">Admin Dashboard</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-4 px-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @php
                    if (!function_exists('isSubmenuActive')) {
                        function isSubmenuActive($submenu, $activeMenu) {
                            foreach ($submenu as $item) {
                                if ($activeMenu == $item['key']) {
                                    return true;
                                }
                            }
                            return false;
                        }
                    }

                    $menu = [
                        ['label' => 'Statistik Pendaftaran', 'icon' => 'fas fa-chart-pie', 'route' => 'dashboard', 'key' => 'dashboard'],
                        ['label' => 'Manajemen Mahasiswa', 'icon' => 'fas fa-users', 'key' => 'mahasiswa', 'submenu' => [
                            ['label' => 'Data Mahasiswa', 'icon' => 'fas fa-list', 'route' => 'mahasiswa.index', 'key' => 'mahasiswa-index'],
                            ['label' => 'Mahasiswa Baru', 'icon' => 'fas fa-user-plus', 'route' => 'mahasiswa.baru', 'key' => 'mahasiswa-baru'],
                            ['label' => 'Status Pendaftaran', 'icon' => 'fas fa-clipboard-check', 'route' => 'mahasiswa.status', 'key' => 'mahasiswa-status'],
                        ]],
                        ['label' => 'Laporan & Export', 'icon' => 'fas fa-file-export', 'key' => 'laporan', 'submenu' => [
                            ['label' => 'Laporan Pendaftaran', 'icon' => 'fas fa-file-alt', 'route' => 'laporan.pendaftaran', 'key' => 'laporan-pendaftaran'],
                            ['label' => 'Export Data', 'icon' => 'fas fa-download', 'route' => 'laporan.export', 'key' => 'laporan-export'],
                        ]],
                    ];
                @endphp

                @foreach ($menu as $item)
                    <li class="nav-item mb-1 {{ isset($item['submenu']) ? 'has-treeview' : '' }} {{ isset($item['submenu']) && isSubmenuActive($item['submenu'], $activeMenu) ? 'menu-open' : '' }}">
                        @if (isset($item['submenu']))
                            <a href="#" class="nav-link sidebar-button {{ isSubmenuActive($item['submenu'], $activeMenu) ? 'active-parent' : '' }}">
                                <i class="{{ $item['icon'] }} nav-icon"></i>
                                <p>
                                    {{ $item['label'] }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($item['submenu'] as $sub)
                                    <li class="nav-item">
                                        <a href="{{ route($sub['route']) }}"
                                           class="nav-link sidebar-button {{ $activeMenu == $sub['key'] ? 'active' : '' }}">
                                            <i class="{{ $sub['icon'] }} nav-icon"></i>
                                            <p>{{ $sub['label'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a href="{{ route($item['route']) }}"
                               class="nav-link sidebar-button {{ $activeMenu == $item['key'] ? 'active' : '' }}">
                                <i class="{{ $item['icon'] }} nav-icon"></i>
                                <p>{{ $item['label'] }}</p>
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
    
    .sidebar-button {
        display: flex;
        align-items: center;
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 6px;
        color: #ffffff;
        transition: all 0.2s ease;
    }
    
    .sidebar-button p {
        margin: 0;
        flex: 1;
        font-weight: 500;
    }
    
    .sidebar-button:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    .sidebar-button.active {
        background-color: #ffffff !important;
        color: #29335C !important;
        font-weight: 600;
        border-radius: 6px;
    }
    
    .sidebar-button.active .nav-icon {
        color: #29335C !important;
    }
    
    .nav-icon {
        width: 18px;
        text-align: center;
        margin-right: 10px;
        font-size: 14px;
        color: #ffffff;
    }
    
    .nav-treeview .nav-link {
        font-size: 13px;
        padding-left: 32px;
        background-color: transparent !important;
    }
    </style>
    
