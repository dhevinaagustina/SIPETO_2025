@php
    use Illuminate\Support\Facades\Auth;

    $user = null;
    $nama = 'Pengguna';
    $photoUrl = asset('adminlte/dist/img/avatar2.png'); // Default image

    if (Auth::guard('mahasiswa')->check()) {
        $user = Auth::guard('mahasiswa')->user();
        $nama = $user->nama_mahasiswa ?? 'Mahasiswa';
        $photoUrl = $user->photo_path ? asset($user->photo_path) : $photoUrl;
    } elseif (Auth::guard('dosen')->check()) {
        $user = Auth::guard('dosen')->user();
        $nama = $user->nama_dosen ?? 'Dosen';
        $photoUrl = $user->photo_path ? asset($user->photo_path) : $photoUrl;
    }

    $currentLocale = session('locale', app()->getLocale());
@endphp

<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 px-3">
    <!-- Left navbar links -->
    <ul class="navbar-nav align-items-center">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="h5 font-weight-bold mb-0 ml-2">Sistem Informasi Pendaftaran TOEIC</span>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
    <!-- Language Switcher -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button">
            <img src="{{ asset($currentLocale === 'id' ? 'img/ind.png' : 'img/eng.png') }}"
                alt="flag"
                width="28" height="20"
                class="mr-2 border rounded shadow-sm">
            <i class="fas fa-chevron-down ml-1 small text-muted"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('change.language', ['lang' => 'id']) }}" class="dropdown-item d-flex align-items-center">
                <img src="{{ asset('img/ind.png') }}" alt="ID" width="28" height="20" class="mr-2 border rounded shadow-sm">
                Bahasa Indonesia
            </a>
            <a href="{{ route('change.language', ['lang' => 'en']) }}" class="dropdown-item d-flex align-items-center">
                <img src="{{ asset('img/eng.png') }}" alt="EN" width="28" height="20" class="mr-2 border rounded shadow-sm">
                English
            </a>
        </div>
    </li>
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" role="button">
                <span class="font-weight-bold mr-2 d-none d-sm-inline">
                    {{ $nama }}
                </span>
                <img src="{{ $photoUrl }}" alt="User Avatar"
                    class="img-circle elevation-1 profile-photo" style="width: 32px; height: 32px; object-fit: cover;">
                <i class="fas fa-chevron-down ml-1 small text-muted"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editPhotoModal">
                    <i class="fas fa-camera mr-2"></i> Ubah Foto Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<!-- Include the modal partial -->
@include('partials.profile_photo_modal')