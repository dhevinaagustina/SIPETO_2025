<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Halaman')</title>
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
