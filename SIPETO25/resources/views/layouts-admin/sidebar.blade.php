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
                use Illuminate\Support\Facades\Auth;

                // Cek siapa yang sedang login
                $user = null;
                $isSuperAdmin = false;

                if (Auth::guard('super_admin')->check()) {
                    $user = Auth::guard('super_admin')->user();
                    $isSuperAdmin = true;
                } elseif (Auth::guard('admin')->check()) {
                    $user = Auth::guard('admin')->user();
                    $isSuperAdmin = false;
                }

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

                // Menu super admin
                if ($isSuperAdmin) {
                    $menu = [
                        [
                            'label' =>  __('admin/sidebar.menu'), 'icon' => 'fas fa-th-large', 'key' => 'dashboard', 'submenu' => [
                                ['label' => __('admin/sidebar.beranda'),  'icon' => 'fas fa-home', 'route' => route('admin.dashboard'), 'key' => 'dashboard-admberanda'],
                                ['label' => __('admin/sidebar.tulis_pesan'),  'icon' => 'fas fa-bell', 'route' => route('admin.kirim_informasi'), 'key' => 'dashboard-pesan'],
                            ]
                        ],
                        ['label' => __('admin/sidebar.cek_data'),  'icon' => 'fas fa-search', 'route' => route('admin.cekdata.index'), 'key' => 'cek-data'],
                        ['label' => __('admin/sidebar.riwayat_ujian'), 'icon' => 'fas fa-clock', 'route' => route('admin.riwayat'), 'key' => 'riwayat-ujian'],
                        [
                            'label' => __('admin/sidebar.pengajuan_surat'),
                            'icon' => 'fas fa-pen-fancy',
                            'key' => 'surat-pernyataan',
                            'submenu' => [
                                [
                                    'label' => __('admin/sidebar.mahasiswa_aktif'),
                                    'route' => route('admin.surat_pernyataan.by_tipe', ['tipe' => 'aktif']),
                                    'key' => 'surat-pernyataan-aktif',
                                    'icon' => 'fas fa-user-graduate',
                                ],
                                [
                                    'label' =>__('admin/sidebar.alumni'),
                                    'route' => route('admin.surat_pernyataan.by_tipe', ['tipe' => 'alumni']),
                                    'key' => 'surat-pernyataan-alumni',
                                    'icon' => 'fas fa-user-check',
                                ],
                            ]
                        ],
                        ['label' =>  __('admin/sidebar.manajemen_admin'), 'icon' => 'fas fa-users-cog', 'route' => route('admin.kelola_admin'), 'key' => 'kelola-admin'],
                        ['label' => __('admin/sidebar.manajemen_mahasiswa'), 'icon' => 'fas fa-user-graduate', 'route' => route('admin.mahasiswa.index'), 'key' => 'kelola-mahasiswa'],
                        ['label' =>  __('admin/sidebar.manajemen_dosen'),  'icon' => 'fas fa-chalkboard-teacher', 'route' => route('admin.dosen.index'), 'key' => 'kelola-dosen'], // ← Tambahan di sini
                        [
                            'label' => __('admin/sidebar.laporan_pendaftaran'),
                            'icon' => 'fas fa-file-export',
                            'route' => route('admin.laporan.pendaftaran'),
                            'key' => 'laporan-pendaftaran'
                        ],

                    ];
                }

                    else {
                   // Menu admin biasa
            $menu = [
            [
            'label' => __('admin/sidebar.menu'), 'icon' => 'fas fa-th-large', 'key' => 'dashboard', 'submenu' => [
                ['label' => __('admin/sidebar.beranda'), 'icon' => 'fas fa-home', 'route' => route('admin.dashboard'), 'key' => 'dashboard-admberanda'],
                ['label' =>  __('admin/sidebar.tulis_pesan'), 'icon' => 'fas fa-bell', 'route' => route('admin.informasi.create'), 'key' => 'dashboard-pesan'],
            ]
            ],
            ['label' =>  __('admin/sidebar.cek_data'), 'icon' => 'fas fa-search', 'route' => route('admin.cekdata.index'), 'key' => 'cek-data'],
            ['label' =>  __('admin/sidebar.riwayat_ujian'),  'icon' => 'fas fa-clock', 'route' => route('admin.riwayat'), 'key' => 'riwayat-ujian'],
            [
                'label' => __('admin/sidebar.pengajuan_surat'),
                'icon' => 'fas fa-pen-fancy',
                'key' => 'surat-pernyataan',
                'submenu' => [
                    [
                        'label' => __('admin/sidebar.mahasiswa_aktif'),
                        'route' => route('admin.surat_pernyataan.by_tipe', ['tipe' => 'aktif']),
                        'key' => 'surat-pernyataan-aktif',
                        'icon' => 'fas fa-user-graduate',
                    ],
                    [
                        'label' =>__('admin/sidebar.alumni'),
                        'route' => route('admin.surat_pernyataan.by_tipe', ['tipe' => 'alumni']),
                        'key' => 'surat-pernyataan-alumni',
                        'icon' => 'fas fa-user-check',
                    ],
                ]
            ],
            [
                'label' => __('admin/sidebar.laporan_pendaftaran'),
                'icon' => 'fas fa-file-export',
                'route' => route('admin.laporan.pendaftaran'),
                'key' => 'laporan-pendaftaran'
            ],
    ];
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
                        <a href="{{ $sub['route'] }}"
                        class="nav-link sidebar-button {{ $activeMenu == $sub['key'] ? 'active' : '' }}">
                            <i class="{{ $sub['icon'] }} nav-icon me-2"></i>
                            <span>{{ $sub['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <a href="{{ $item['route'] }}"
            class="nav-link sidebar-button {{ $activeMenu == $item['key'] ? 'active' : '' }}">
                <i class="{{ $item['icon'] }} nav-icon me-2"></i>
                <span>{{ $item['label'] }}</span>
            </a>
        @endif
    </li>
@endforeach

             <!-- Sidebar Logout Button -->
            <li class="nav-item mt-4">
                <a href="#" id="btn-logout" class="nav-link sidebar-button text-white">
                    <i class="fas fa-sign-out-alt nav-icon me-2"></i>
                   <span>{{ __('admin/sidebar.logout') }}</span>
                </a>
            </li>

            <!-- Hidden logout form as fallback -->
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn-logout').addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
        title: '{{ __("admin/sidebar.logout_confirm.title") }}',
        text: '{{ __("admin/sidebar.logout_confirm.text") }}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#aaa',
            confirmButtonText: '{{ __("admin/sidebar.logout_confirm.confirm") }}',
            cancelButtonText: '{{ __("admin/sidebar.logout_confirm.cancel") }}'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ route('logout') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Redirect ke halaman login atau root
                        window.location.href = "{{ route('login') }}";
                    } else {
                        return response.json().then(data => {
                            throw new Error(data.message || 'Logout gagal.');
                        });
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', error.message, 'error');
                });
            }
        });
    });
</script>
@endpush
