<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - SDN Kulinyar</title>

    <!-- Tailwind CSS Play CDN (Aman dari Mixed Content di Railway) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS kustom jika ada -->
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
</head>
<body class="bg-gray-100 antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center bg-blue-50 p-4">
        {{ $slot }}
    </div>
</body>
</html>