<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <h3>SISTEM TOEIC</h3>
        <strong>TOEIC</strong>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house"></i> Beranda
            </a>
        </li>
        <li>
            <a href="{{ route('admin.cekdata') }}">
                <i class="bi bi-search"></i> Cek Data
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.hasilujian*') ? 'active' : '' }}">
            <a href="{{ route('admin.hasilujian.index') }}">
                <i class="bi bi-journal-text"></i> Input Hasil Ujian
            </a>
        </li>
        <li>
            <a href="{{ route('admin.riwayat') }}">
                <i class="bi bi-clock-history"></i> Riwayat Ujian
            </a>
        </li>
        <li>
            <a href="{{ route('admin.pengajuan') }}">
                <i class="bi bi-envelope"></i> Pengajuan Surat
            </a>
        </li>
        <li>
            <a href="{{ route('admin.jadwal') }}">
                <i class="bi bi-calendar-event"></i> Kelola Jadwal
            </a>
        </li>
    </ul>

    <div class="logout-section">
        <a href="{{ route('admin.logout') }}" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</nav>