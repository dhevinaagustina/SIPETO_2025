<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Login')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

  @stack('styles')

  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
    }

    .background-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .background-container video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.75);
    }

    .login-box {
      position: relative;
      z-index: 2;
    }
  </style>
</head>
<body class="hold-transition login-page">

  <!-- Background Video -->
  <div class="background-container">
    <video autoplay muted loop playsinline>
      <source src="{{ asset('video/gedung.MP4') }}" type="video/mp4">
      Browser Anda tidak mendukung video.
    </video>
  </div>

  <!-- Konten Halaman Login -->
  @yield('content')

  <!-- JavaScript -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

  @stack('scripts')
</body>
</html>
