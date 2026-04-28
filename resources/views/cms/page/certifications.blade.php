@php
    $data = $page->page_data ?? [];
    $hero = $data['hero'] ?? [];
    $intro = $data['intro'] ?? [];
    $benefits = $data['benefits'] ?? [];
    $cards = $data['cards'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    <section class="relative isolate overflow-hidden py-24 text-white md:py-28">
        @if (! empty($hero['background_image']))
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $hero['background_image'] }}');"></div>
        @endif
        <div class="absolute inset-0 bg-black/55"></div>
        <div class="relative mx-auto max-w-[1200px] px-4 text-center">
            <h1 class="text-4xl font-semibold uppercase tracking-[0.22em] md:text-5xl">
                {{ $hero['title'] ?? 'Certifications' }}
            </h1>
        </div>
    </section>

    <section class="bg-white py-14 md:py-20">
        <div class="mx-auto grid max-w-[1200px] items-center gap-10 px-4 md:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)]">
            @if (! empty($intro['image']))
                <div class="flex justify-center md:justify-start">
                    <img
                        src="{{ $intro['image'] }}"
                        alt="{{ $intro['heading'] ?? 'AAPSCM certifications' }}"
                        class="w-full max-w-[595px] rounded-[2.5rem] object-cover"
                        loading="lazy"
                    >
                </div>
            @endif

            <div>
                <h2 class="text-[2rem] font-light leading-tight text-[#2A2A2A] md:text-[2.2rem]">
                    {{ $intro['heading'] ?? '' }}
                </h2>

                <div class="mt-8 space-y-6">
                    @foreach (($intro['features'] ?? []) as $feature)
                        <div class="flex items-start gap-4">
                            @if (! empty($feature['icon']))
                                <img src="{{ $feature['icon'] }}" alt="" class="mt-1 h-[62px] w-[62px] shrink-0 object-contain" loading="lazy">
                            @endif
                            <div>
                                <h3 class="text-lg font-semibold leading-tight text-[#2A2A2A]">
                                    {{ $feature['title'] ?? '' }}
                                </h3>
                                <p class="mt-2 text-[15px] leading-7 text-[#555]">
                                    {{ $feature['text'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="relative isolate overflow-hidden py-14 md:py-16">
        @if (! empty($benefits['background_image']))
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $benefits['background_image'] }}');"></div>
        @endif
        <div class="absolute inset-0 bg-white/78"></div>

        <div class="relative mx-auto max-w-[1200px] px-4">
            <h2 class="text-center text-[2rem] font-light leading-tight text-[#2A2A2A] md:text-[2.2rem]">
                {{ $benefits['heading'] ?? '' }}
            </h2>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach (($benefits['items'] ?? []) as $item)
                    <article class="rounded-2xl bg-white/90 px-8 py-10 text-center shadow-sm">
                        @if (! empty($item['icon']))
                            <img src="{{ $item['icon'] }}" alt="" class="mx-auto h-16 w-16 object-contain" loading="lazy">
                        @endif
                        <h3 class="mt-5 text-lg font-semibold text-[#2A2A2A]">
                            {{ $item['title'] ?? '' }}
                        </h3>
                        <p class="mt-3 text-[15px] leading-7 text-[#555]">
                            {{ $item['text'] ?? '' }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @if (! empty($data['cta']))
        <section class="bg-white py-14">
            <div class="mx-auto max-w-[980px] px-4 text-center">
                <p class="text-[1.45rem] font-light leading-[1.7] text-[#2A2A2A] md:text-[1.6rem]">
                    {{ $data['cta'] }}
                </p>
            </div>
        </section>
    @endif

    <section class="bg-white pb-20 pt-4 md:pb-24">
        <div class="mx-auto max-w-[1200px] px-4">
            <div class="grid gap-5 md:grid-cols-2 md:gap-y-6">
                @foreach ($cards as $card)
                    <article class="overflow-hidden rounded-[10px] border border-black bg-white shadow-sm transition-transform duration-200 hover:-translate-y-1">
                        <a href="{{ $card['href'] ?? '#' }}" class="block">
                            <div class="h-[198px] bg-[#f5f5f5] bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $card['image'] ?? '' }}');"></div>
                            <div class="px-5 py-4">
                                <h2 class="text-base font-semibold leading-[1.65] text-[#2A2A2A] md:text-[1.02rem]">
                                    {{ $card['title'] ?? '' }}
                                    <span aria-hidden="true">&gt;</span>
                                </h2>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

</x-layouts.cms>
