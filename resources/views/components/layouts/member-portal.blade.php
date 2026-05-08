@props([
    'title' => 'Member Dashboard',
    'subtitle' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ trim(($title ?: config('app.name', 'AAPSCM')) . ' | AAPSCM') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#f6f8fb] font-sans text-slate-900 antialiased">

        <x-cms.header />

        <div class="border-b border-slate-200/80 bg-white/90 backdrop-blur">
            <div class="mx-auto max-w-[1320px] px-4 py-5 sm:px-6 lg:px-8">
                <nav class="mb-3 flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                    <a href="{{ route('home') }}" class="transition-colors hover:text-[#0b2f5e]">Home</a>
                    <span>/</span>
                    @auth
                        @if ($title !== 'Member Dashboard')
                            <a href="{{ route('dashboard') }}" class="transition-colors hover:text-[#0b2f5e]">Member Portal</a>
                            <span>/</span>
                            <span class="text-slate-600">{{ $title }}</span>
                        @else
                            <span class="text-slate-600">Member Portal</span>
                        @endif
                    @endauth
                </nav>
                <div class="flex flex-col gap-4 rounded-[28px] border border-slate-200 bg-[#fbfcfe] px-5 py-5 shadow-sm sm:px-6">
                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full border border-[#0b2f5e]/10 bg-white px-3 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-[#0b2f5e]">
                            <x-ui.icon name="shield" class="h-3.5 w-3.5" />
                            Member Portal
                        </div>
                        <h1 class="mt-3 text-[24px] font-semibold leading-tight text-slate-950 sm:text-[30px]">{{ $title }}</h1>
                        @if ($subtitle && $subtitle !== $title)
                            <p class="mt-1 text-[13px] font-medium uppercase tracking-[0.14em] text-slate-400">{{ $subtitle }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-[1320px] px-4 py-8 sm:px-6 lg:grid lg:grid-cols-[260px_minmax(0,1fr)] lg:gap-6 lg:px-8">
            <aside class="mb-8 lg:mb-0">
                {{ $sidebar ?? '' }}
            </aside>

            <main>
                {{ $slot }}
            </main>
        </div>

        <footer>
            <x-cms.footer />
        </footer>
    </body>
</html>
