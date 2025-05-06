<div class="sidebar" style="background-color: #29335C; min-height: 100vh;">
    <!-- Sidebar Menu -->
    <nav class="mt-4 px-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

            <li class="nav-item mb-2">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : 'text-white' }}">
                    <i class="nav-icon fas fa-home me-2"></i>
                    <p>Beranda</p>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/daftar-ujian') }}" class="nav-link {{ ($activeMenu == 'daftar-ujian') ? 'active' : 'text-white' }}">
                    <i class="nav-icon fas fa-book me-2"></i>
                    <p>Daftar Ujian</p>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/hasil-ujian') }}" class="nav-link {{ ($activeMenu == 'hasil-ujian') ? 'active' : 'text-white' }}">
                    <i class="nav-icon fas fa-file-alt me-2"></i>
                    <p>Hasil Ujian</p>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/riwayat-ujian') }}" class="nav-link {{ ($activeMenu == 'riwayat-ujian') ? 'active' : 'text-white' }}">
                    <i class="nav-icon fas fa-history me-2"></i>
                    <p>Riwayat Ujian</p>
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/pengajuan-surat') }}" class="nav-link {{ ($activeMenu == 'pengajuan-surat') ? 'active' : 'text-white' }}">
                    <i class="nav-icon fas fa-envelope-open-text me-2"></i>
                    <p>Pengajuan Surat</p>
                </a>
            </li>

            <li class="nav-item mt-4">
                <a href="{{ route('logout') }}" class="nav-link text-white">
                    <i class="nav-icon fas fa-sign-out-alt me-2"></i>
                    <p>Log out</p>
                </a>
            </li>

        </ul>
    </nav>
</div>
