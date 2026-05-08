@php
    $data = $page->page_data ?? [];
    $titleBand = $data['title_band'] ?? [];
    $hero = $data['hero'] ?? [];
    $overview = $data['overview'] ?? [];
    $terms = $data['terms'] ?? [];
    $postal = $terms['postal'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    <section class="relative overflow-hidden bg-[#202124] py-[100px]">
        @if (! empty($titleBand['background']))
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $titleBand['background'] }}');"></div>
        @endif
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative mx-auto max-w-[1200px] px-4 text-center">
            <h1 class="font-[Poppins] text-[40px] font-semibold uppercase leading-[45px] text-white">
                {{ $titleBand['title'] ?? $page->title }}
            </h1>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto grid min-h-[450px] max-w-[1200px] grid-cols-1 items-center gap-10 px-4 py-12 md:grid-cols-[49.908%_50%]">
            <div class="order-2 md:order-1">
                @if (! empty($hero['title']))
                    <h2 class="text-center font-[Poppins] text-[20px] font-normal uppercase leading-[28px] text-[#202124] md:text-left md:text-[48px] md:leading-[58px]">
                        {{ $hero['title'] }}
                    </h2>
                @endif

                @if (! empty($hero['subtitle']))
                    <p class="mt-7 text-center font-[Poppins] text-[15px] font-normal leading-[25px] text-[#202124] md:mt-[30px] md:text-justify">
                        {{ $hero['subtitle'] }}
                    </p>
                @endif

                @if (! empty($hero['cta']['label']))
                    <div class="mt-[30px] text-center md:text-left">
                        <a href="{{ $hero['cta']['href'] ?? '#' }}"
                           class="inline-flex rounded-full bg-[#001A67] px-[30px] py-[15px] font-[Poppins] text-[16px] font-normal text-white transition hover:bg-[#001450]">
                            {{ $hero['cta']['label'] }}
                        </a>
                    </div>
                @endif
            </div>

            @if (! empty($hero['image']))
                <div class="order-1 flex justify-center md:order-2">
                    <img src="{{ $hero['image'] }}"
                         alt=""
                         class="w-full max-w-[509px] rounded-[10px] shadow-[0_0_4px_rgba(0,0,0,0.5)]"
                         loading="lazy">
                </div>
            @endif
        </div>
    </section>

    <section class="mt-[50px] bg-white">
        <div class="mx-auto max-w-[1200px] px-4">
            @if (! empty($overview['heading']))
                <h2 class="text-center font-[Poppins] text-[20px] font-normal uppercase leading-[30px] text-[#1B1B1B] md:text-left md:text-[35px] md:leading-[45px]">
                    {{ $overview['heading'] }}
                </h2>
            @endif
        </div>
    </section>

    <section class="bg-white pb-4 pt-0">
        <div class="mx-auto max-w-[1200px] px-4">
            @foreach ($overview['paragraphs'] ?? [] as $paragraph)
                <p class="mb-5 text-center font-[Poppins] text-[22px] font-light leading-[1.5em] text-[#202124] md:mb-4 md:text-[1.05rem] md:[text-align:justify]">
                    {{ $paragraph }}
                </p>
            @endforeach

            @if (! empty($overview['items']))
                <ul class="mb-5 list-disc space-y-3 pl-6 text-center font-[Poppins] text-[15px] font-normal leading-[25px] text-[#202124] md:text-left md:[text-align:justify]">
                    @foreach ($overview['items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif

            @if (! empty($overview['closing']))
                <p class="mb-0 text-center font-[Poppins] text-[22px] font-light leading-[1.5em] text-[#202124] md:text-[1.05rem] md:[text-align:justify]">
                    {{ $overview['closing'] }}
                </p>
            @endif
        </div>
    </section>

    <section class="bg-white py-[15px]">
        <div class="mx-auto max-w-[1200px] px-4">
            <div class="h-[4px] w-full bg-black"></div>
        </div>
    </section>

    <section class="bg-white pb-[50px] pt-[25px]">
        <div class="mx-auto grid max-w-[1200px] grid-cols-1 gap-8 px-4 md:grid-cols-[69.666%_30%]">
            <div class="flex flex-col justify-center">
                @if (! empty($terms['heading']))
                    <h2 class="text-center font-[Poppins] text-[20px] font-medium tracking-[1.5px] text-[#202124] md:text-left md:text-[1.7rem]">
                        {{ $terms['heading'] }}
                    </h2>
                @endif

                @foreach ($terms['paragraphs'] ?? [] as $paragraph)
                    <p class="mt-6 text-center font-[Poppins] text-[22px] font-normal leading-[1.5em] text-[#202124] md:text-[15px] md:leading-[25px] md:[text-align:justify]">
                        {{ $paragraph }}
                    </p>
                @endforeach

                @if (! empty($terms['formats']))
                    <h3 class="mt-6 text-center font-[Poppins] text-[20px] font-medium tracking-[1.5px] text-[#1B1B1B] md:text-left md:text-[1.2rem]">
                        {{ $terms['paragraphs'][2] ?? 'Accepted formats' }}
                    </h3>

                    <ul class="mt-5 space-y-3">
                        @foreach ($terms['formats'] as $format)
                            <li class="flex items-center justify-center gap-3 md:justify-start">
                                <svg class="h-[14px] w-[14px] shrink-0 text-[#08186A]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-[Poppins] text-[15px] font-normal text-[#202124]">
                                    {{ $format }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if (! empty($terms['cancellation_notice']))
                    <p class="mt-6 text-center font-[Poppins] text-[22px] font-light leading-[1.5em] text-black md:text-[1.05rem] md:[text-align:justify]">
                        {{ $terms['cancellation_notice'] }}
                    </p>
                @endif
            </div>

            <div class="rounded-[10px] bg-[#F5F5F5] shadow-[0_0_3px_rgba(0,0,0,0.5)] md:m-[10px]">
                <div class="flex h-full flex-col items-center rounded-[10px] px-6 py-6 text-center">
                    @if (! empty($postal['image']))
                        <img src="{{ $postal['image'] }}"
                             alt=""
                             class="mb-5 w-full rounded-[10px]"
                             loading="lazy">
                    @endif

                    @if (! empty($postal['address_html']))
                        <p class="whitespace-pre-line text-center font-[Poppins] text-[22px] font-light leading-[1.5em] text-black md:text-left md:text-[1.2rem]">
                            {{ $postal['address_html'] }}
                        </p>
                    @endif

                    @if (! empty($postal['note']))
                        <p class="mt-5 text-center font-[Poppins] text-[22px] font-light leading-[1.5em] text-[#202124] md:text-[15px] md:[text-align:justify]">
                            {{ $postal['note'] }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-layouts.cms>
