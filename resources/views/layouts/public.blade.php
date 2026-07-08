<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SDN Kulinyar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Laravel -->
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        :root { --bs-body-bg: #f5f6fb; }
        body { background-color: #f5f6fb !important; }
        .navbar { position: relative; z-index: 2000; }
        .hero::before { z-index: 0; }
    </style>

</head>

<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>