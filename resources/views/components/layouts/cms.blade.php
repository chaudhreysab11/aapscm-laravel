<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php($documentTitle = trim($__env->yieldPushContent('title')))
    @php($siteIcon = asset('storage/cms-images/2025/06/1.png'))

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ $siteIcon }}">
    <link rel="apple-touch-icon" href="{{ $siteIcon }}">
    <meta name="msapplication-TileImage" content="{{ $siteIcon }}">
    <title>{{ $documentTitle !== '' ? $documentTitle : config('app.name', 'AAPSCM') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
@php($bodyClass = trim('font-sans antialiased bg-white text-gray-800 ' . $__env->yieldPushContent('body-class')))
<body class="{{ $bodyClass }}">

    <x-cms.header />

    <main id="main-content">
        {{ $slot }}
    </main>

    <x-cms.footer />

    @stack('scripts')
</body>
</html>
