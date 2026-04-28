@php
    $pageData = $page->page_data ?? [];
    $hero = $pageData['hero'] ?? [];
    $introHeading = $pageData['intro_heading_html'] ?? '';
    $columns = $pageData['cert_columns'] ?? [];
    $obj = $pageData['objectives'] ?? [];
@endphp

<x-layouts.cms :page="$page">
    <x-cms.seo-head :page="$page" />

    {{-- Hero: image left, heading + text right --}}
    @if (! empty($hero) && (! empty($hero['image']) || ! empty($hero['heading_html']) || ! empty($hero['text_html'])))
        <section class="bg-white py-14 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    @if (! empty($hero['image']))
                        <div>
                            <img src="{{ $hero['image'] }}" alt="" class="w-full h-auto" loading="lazy" />
                        </div>
                    @endif
                    <div>
                        @if (! empty($hero['heading_html']))
                            <h1 class="text-[28px] md:text-[40px] font-light text-[#14166e] leading-tight mb-5">
                                {!! $hero['heading_html'] !!}
                            </h1>
                            <div class="w-16 h-[3px] bg-[#e74c1d] mb-6"></div>
                        @endif
                        @if (! empty($hero['text_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                                {!! $hero['text_html'] !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Intro heading above the columns --}}
    @if (! empty($introHeading))
        <section class="bg-[#f6f8fb] py-10">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h3 class="text-[22px] md:text-[28px] font-light text-[#14166e] leading-tight">
                    {!! $introHeading !!}
                </h3>
            </div>
        </section>
    @endif

    {{-- 4-column certification listings --}}
    @if (! empty($columns))
        <section class="bg-white py-14">
            <div class="max-w-[1300px] mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-6">
                    @foreach ($columns as $col)
                        <div>
                            @if (! empty($col['heading_html']))
                                <h4 class="text-[16px] md:text-[17px] font-bold text-[#14166e] mb-4 leading-snug">
                                    {!! $col['heading_html'] !!}
                                </h4>
                            @endif
                            @if (! empty($col['items']))
                                <ul class="space-y-3">
                                    @foreach ($col['items'] as $item)
                                        <li>
                                            <a href="{{ $item['href'] ?? '#' }}"
                                               class="group flex items-center gap-3 bg-white rounded-full pl-3 pr-5 py-2.5 shadow-[rgba(100,100,111,0.18)_0px_2px_10px_0px] hover:shadow-[rgba(100,100,111,0.28)_0px_4px_14px_0px] transition">
                                                <span class="flex-shrink-0 w-7 h-7 rounded-full bg-[#e74c1d] text-white flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                <span class="text-[13.5px] md:text-[14px] text-gray-700 leading-snug group-hover:text-[#14166e]">
                                                    {{ $item['label'] ?? '' }}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Exam Objectives heading + body --}}
    @if (! empty($obj) && (! empty($obj['heading_html']) || ! empty($obj['text_html'])))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1100px] mx-auto px-4">
                @if (! empty($obj['heading_html']))
                    <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e] leading-tight mb-4 text-center">
                        {!! $obj['heading_html'] !!}
                    </h2>
                    <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mb-8"></div>
                @endif
                @if (! empty($obj['text_html']))
                    <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                        {!! $obj['text_html'] !!}
                    </div>
                @endif
            </div>
        </section>
    @endif
</x-layouts.cms>
