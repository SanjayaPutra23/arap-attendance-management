<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e3a8a">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>{{ config('app.name', 'ARAP SPPG Kalisapu') }} - @yield('title', 'Masuk')</title>

    <!-- Vite Assets (Bootstrap 5.3 + Custom SCSS + App JS) -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light d-flex align-items-center min-vh-100 py-4">
    <main class="w-100">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
