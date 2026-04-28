<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero    = $page->page_data['hero']    ?? [];
        $intro   = $page->page_data['intro']   ?? [];
        $band    = $page->page_data['band']    ?? [];
        $members = $page->page_data['members'] ?? [];
        $rules   = $page->page_data['rules']   ?? [];
        $closing = $page->page_data['closing'] ?? [];
    @endphp

    {{-- Hero --}}
    @if (! empty($hero))
        <section class="relative bg-cover bg-center bg-no-repeat"
                 @if (! empty($hero['background'])) style="background-image:url('{{ $hero['background'] }}');" @endif>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative max-w-[1200px] mx-auto px-4 py-[100px] text-center">
                <h3 class="text-white font-semibold uppercase tracking-wide text-[28px] md:text-[40px] leading-[45px]">
                    {{ $hero['title'] }}
                </h3>
            </div>
        </section>
    @endif

    {{-- Intro: title + paragraph + image --}}
    @if (! empty($intro))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($intro['title']))
                            <h2 class="uppercase font-normal text-[32px] md:text-[48px] leading-[1.2] md:leading-[58px] text-[#202124] mb-6">
                                {{ $intro['title'] }}
                            </h2>
                        @endif

                        @if (! empty($intro['paragraph']))
                            <p class="text-[18px] text-[#202124] leading-[25px]">
                                {!! $intro['paragraph'] !!}
                            </p>
                        @endif
                    </div>

                    @if (! empty($intro['image']['src']))
                        <div class="flex justify-center">
                            <img src="{{ $intro['image']['src'] }}"
                                 alt="{{ $intro['image']['alt'] ?? '' }}"
                                 class="max-w-full h-auto">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Pale band: AAPSCM® job board --}}
    @if (! empty($band))
        <section class="bg-[#F5F5F5] py-[70px] my-10">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                @if (! empty($band['title']))
                    <h2 class="uppercase font-normal text-[28px] md:text-[40px] leading-tight text-[#202124] mb-6">
                        {{ $band['title'] }}
                    </h2>
                @endif

                @if (! empty($band['body']))
                    <p class="text-[18px] text-[#202124] leading-[25px]">
                        {!! $band['body'] !!}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- Members panel: image left, text right --}}
    @if (! empty($members))
        <section class="bg-white py-12">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-start">
                    @if (! empty($members['image']['src']))
                        <div class="flex justify-center">
                            <img src="{{ $members['image']['src'] }}"
                                 alt="{{ $members['image']['alt'] ?? '' }}"
                                 class="max-w-full h-auto">
                        </div>
                    @endif

                    <div>
                        @if (! empty($members['title']))
                            <h2 class="uppercase font-normal text-[28px] md:text-[35px] leading-[45px] text-[#202124] mb-5">
                                {{ $members['title'] }}
                            </h2>
                        @endif

                        @foreach ($members['paragraphs'] ?? [] as $p)
                            <p class="text-[18px] text-[#202124] leading-[25px] mb-4">
                                {!! $p !!}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Rules panel: text left, image right --}}
    @if (! empty($rules))
        <section class="bg-white py-12">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-start">
                    <div>
                        @if (! empty($rules['title']))
                            <h2 class="uppercase font-normal text-[28px] md:text-[35px] leading-snug text-[#202124] mb-5">
                                {{ $rules['title'] }}
                            </h2>
                        @endif

                        @foreach ($rules['paragraphs'] ?? [] as $p)
                            <p class="text-[18px] text-[#202124] leading-[25px] mb-4">
                                {!! $p !!}
                            </p>
                        @endforeach
                    </div>

                    @if (! empty($rules['image']['src']))
                        <div class="flex justify-center">
                            <img src="{{ $rules['image']['src'] }}"
                                 alt="{{ $rules['image']['alt'] ?? '' }}"
                                 class="max-w-full h-auto">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Closing block --}}
    @if (! empty($closing['body']))
        <section class="bg-white pb-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <p class="text-[18px] text-[#202124] leading-[25px]">
                    {!! $closing['body'] !!}
                </p>
            </div>
        </section>
    @endif

</x-layouts.cms>
