<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Login')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

    .header-sipeto {
      background-color: #152557;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      display: flex;
      align-items: center;
      gap: 10px;
      position: relative;
      z-index: 2;
    }

    .header-sipeto img {
      height: 40px;
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
  </div>>

  <!-- Konten -->
  @yield('content')

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  @stack('scripts')
</body>
</html>
