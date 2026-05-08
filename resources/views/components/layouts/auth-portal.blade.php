@props([
    'eyebrow' => 'AAPSCM Member Access',
    'title' => '',
    'intro' => null,
    'imagePath' => '/mirrors/shared/wp-content/plugins/academist-membership/assets/img/user-dashboard.jpg',
    'compact' => false,
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
    <body class="min-h-screen bg-[#f5f7fa] font-sans text-slate-900 antialiased">

        <x-cms.header />

        <section class="relative overflow-hidden py-10 lg:py-16">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(11,47,94,0.08),transparent_34%),radial-gradient(circle_at_bottom_right,_rgba(240,179,35,0.1),transparent_26%)]"></div>
            <div class="absolute inset-0 opacity-30 [background-image:linear-gradient(rgba(11,47,94,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(11,47,94,0.04)_1px,transparent_1px)] [background-size:24px_24px]"></div>
            <div @class([
                'relative mx-auto px-4 sm:px-6 lg:px-8',
                'max-w-[620px]' => $compact,
                'max-w-[1180px]' => ! $compact,
            ])>
                <div @class([
                    'grid gap-6 lg:grid-cols-[minmax(0,320px)_minmax(0,1fr)] lg:items-start' => ! $compact,
                    'space-y-4' => $compact,
                ])>
                    <div class="space-y-4">
                        <div class="inline-flex items-center gap-3 rounded-full border border-[#0b2f5e]/10 bg-white/90 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.28em] text-[#0b2f5e] shadow-sm backdrop-blur">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#0b2f5e] text-white">
                                <x-ui.icon name="shield" class="h-4 w-4" />
                            </span>
                            {{ $eyebrow }}
                        </div>

                        <div class="rounded-[28px] border border-slate-200/80 bg-white/90 p-6 shadow-[0_24px_60px_rgba(11,47,94,0.08)] backdrop-blur sm:p-7">
                            <h1 class="text-[28px] font-semibold leading-tight text-slate-950 sm:text-[34px]">{{ $title }}</h1>

                            @if ($intro)
                                <p class="mt-3 max-w-[42ch] text-[14px] leading-6 text-slate-500">{{ $intro }}</p>
                            @endif

                            <div class="mt-5 flex flex-wrap gap-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2">
                                    <x-ui.icon name="lock" class="h-3.5 w-3.5 text-[#0b2f5e]" />
                                    Secure
                                </span>
                                <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2">
                                    <x-ui.icon name="mail" class="h-3.5 w-3.5 text-[#0b2f5e]" />
                                    Direct
                                </span>
                                @unless($compact)
                                    <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2">
                                        <x-ui.icon name="profile" class="h-3.5 w-3.5 text-[#0b2f5e]" />
                                        Member Access
                                    </span>
                                @endunless
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[30px] border border-white/80 bg-white p-6 shadow-[0_24px_72px_rgba(11,47,94,0.12)] sm:p-8 lg:p-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <x-cms.footer />
        </footer>
    </body>
</html>
