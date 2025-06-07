<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #29335C;">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center py-4">
        <img src="{{ asset('adminlte/dist/img/logo-sipeto-2.png') }}" class="sidebar-logo mb-2" alt="Logo SIPETO">
        <h5 class="text-white font-weight-bold m-0">SIPETO</h5>
        <small class="text-white d-block">Sistem Pendaftaran TOEIC</small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-4 px-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @php
                    // Hindari redeklarasi fungsi jika layout di-include berkali-kali
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
                        ['label' => 'Menu', 'icon' => 'fas fa-th-large', 'key' => 'dashboard', 'submenu' => [
                            ['label' => 'Beranda', 'icon' => 'fas fa-home', 'route' => '/dashboard/beranda', 'key' => 'dashboard-beranda'],
                            ['label' => 'Pesan', 'icon' => 'fas fa-bell', 'route' => '/dashboard/pesan', 'key' => 'pesan'],
                        ]],
                        ['label' => 'Daftar Ujian', 'icon' => 'fas fa-pencil-alt', 'key' => 'daftar-ujian', 'submenu' => [
                            ['label' => 'Gratis', 'icon' => 'fas fa-receipt', 'route' => '/pendaftaran-toeic/gratis', 'key' => 'pendaftaran-toeic'],
                            ['label' => 'Mandiri', 'icon' => 'fas fa-dollar-sign', 'route' => '/pendaftaran-toeic/mandiri', 'key' => 'pendaftaran-toeic/mandiri'],
                        ]],
                        [
                            'label'   => 'Riwayat Ujian',
                            'icon'    => 'fas fa-clock',
                            'route'   => route('mahasiswa.riwayat'),
                            'key'     => 'riwayat-ujian',
                            'active'  => request()->routeIs('mahasiswa.riwayat'),
                        ]
                        ,
                        ['label' => 'Pengajuan Surat', 'icon' => 'fas fa-pen-fancy', 'route' => '/surat_pernyataan', 'key' => 'surat_pernyataan'],
                    ];
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
                                        <a href="{{ url($sub['route']) }}"
                                           class="nav-link sidebar-button {{ $activeMenu == $sub['key'] ? 'active' : '' }}">
                                            <i class="{{ $sub['icon'] }} nav-icon me-2"></i>
                                            <span>{{ $sub['label'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a href="{{ url($item['route']) }}"
                               class="nav-link sidebar-button {{ $activeMenu == $item['key'] ? 'active' : '' }}">
                                <i class="{{ $item['icon'] }} nav-icon me-2"></i>
                                <span>{{ $item['label'] }}</span>
                            </a>
                        @endif
                    </li>
                @endforeach

                <!-- Logout -->
                <li class="nav-item mt-4">
                    <a href="#" class="nav-link sidebar-button text-white"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt nav-icon me-2"></i>
                        <span>Log out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<!-- CSS -->
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
