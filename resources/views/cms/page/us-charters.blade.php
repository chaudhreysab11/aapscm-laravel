@php
    $data = $page->page_data ?? [];
    $heroHeading       = $data['hero_heading']       ?? 'US Chapters';
    $joinChapterCta    = $data['join_chapter_cta']   ?? null;
    $introHeading      = $data['intro_heading']      ?? '';
    $chapters          = $data['chapters']           ?? [];
    $shortDescriptions = $data['short_descriptions'] ?? [];

    // Map chapter display name → anchor IDs (matches about-us links).
    // Keys are the chapter name suffix we match with str_contains().
    $anchorMap = [
        'Columbia'    => ['sc-chapter', 'Chapters'],
        'Spartanburg' => ['Chapters', 'Chapters-sc'],
        'Dallas'      => ['TX-Chapters'],
        'New York'    => ['NY-Chapters'],
        'Rockford'    => ['IL-Chapters'],
        'Boston'      => ['MA-Chapters'],
        'Chicago'     => ['chicago'],
        'Atlanta'     => ['atlanta'],
        'Baltimore'   => ['baltimore'],
    ];

    // Slugify chapter name → id-safe primary anchor
    $slug = static function (string $s): string {
        $s = preg_replace('/[^A-Za-z0-9]+/', '-', $s) ?? $s;
        return strtolower(trim($s, '-'));
    };
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar
        title="US Charters"
        :breadcrumbs="[['label' => 'US Charters']]"
    />

    {{-- Hero --}}
    <section class="py-10 bg-white">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[#14166e] text-[28px] md:text-[34px] font-light tracking-[0.15em] uppercase mb-5">
                {{ $heroHeading }}
            </h3>
            @if (! empty($joinChapterCta))
                <a
                    href="{{ $joinChapterCta['url'] }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#14166e] text-white text-sm rounded hover:bg-[#0f1159] transition-colors"
                >
                    <span>{{ $joinChapterCta['label'] }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" fill="currentColor" aria-hidden="true"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                </a>
            @endif
        </div>
    </section>

    {{-- Intro heading --}}
    @if (! empty($introHeading))
        <section class="py-10 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] text-center leading-snug">
                    {{ $introHeading }}
                </h2>
            </div>
        </section>
    @endif

    {{-- Chapter blocks --}}
    @foreach ($chapters as $i => $ch)
        @php
            $primaryAnchor = $slug($ch['name']);
            $altAnchors = [];
            foreach ($anchorMap as $needle => $ids) {
                if (stripos($ch['name'], $needle) !== false) {
                    $altAnchors = $ids;
                    break;
                }
            }
            $imageFirst = ($i % 2 === 1); // Atlanta-style rows: image left, text right
            $sectionBg = ($i % 2 === 0) ? 'bg-white' : 'bg-[#f6f8fb]';
        @endphp

        <section id="{{ $primaryAnchor }}" class="py-14 {{ $sectionBg }}">
            @foreach ($altAnchors as $alt)
                <span id="{{ $alt }}" class="block -mt-24 pt-24" aria-hidden="true"></span>
            @endforeach

            <div class="max-w-[1100px] mx-auto px-4">
                {{-- Chapter header: description + image --}}
                <div class="grid md:grid-cols-2 gap-10 items-center mb-10">
                    @if ($imageFirst && ! empty($ch['image']))
                        <div>
                            <img src="{{ $ch['image'] }}" alt="" class="w-full h-auto rounded" loading="lazy" />
                        </div>
                    @endif

                    <div>
                        <h2 class="text-[26px] md:text-[30px] font-semibold text-[#14166e] mb-4">
                            {{ $ch['name'] }}
                        </h2>
                        @if (! empty($ch['description']))
                            <p class="text-[15px] leading-relaxed text-gray-700 mb-5">
                                {{ $ch['description'] }}
                            </p>
                        @endif
                        @if (! empty($ch['cta_url']))
                            <a
                                href="{{ $ch['cta_url'] }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#14166e] text-white text-sm rounded hover:bg-[#0f1159] transition-colors"
                            >
                                <span>Join A Chapter</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" fill="currentColor" aria-hidden="true"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                            </a>
                        @endif
                    </div>

                    @if (! $imageFirst && ! empty($ch['image']))
                        <div>
                            <img src="{{ $ch['image'] }}" alt="" class="w-full h-auto rounded" loading="lazy" />
                        </div>
                    @endif
                </div>

                {{-- Objectives + Functionalities --}}
                <div class="grid md:grid-cols-2 gap-8 mb-8">
                    @foreach ([
                        ['title' => 'Objectives',      'items' => $ch['objectives']      ?? []],
                        ['title' => 'Functionalities', 'items' => $ch['functionalities'] ?? []],
                    ] as $col)
                        <div class="bg-white rounded-md shadow-[0_7px_29px_rgba(100,100,111,0.15)] px-6 py-8">
                            <h2 class="text-[20px] font-semibold text-[#14166e] mb-4">
                                {{ $col['title'] }}
                            </h2>
                            <ul class="space-y-2">
                                @foreach ($col['items'] as $item)
                                    <li class="flex items-start gap-2 text-[15px] text-gray-700">
                                        <span class="shrink-0 mt-1 text-[#14166e]" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm12 390.6c-6.2 6.2-16.4 6.2-22.6 0L131.4 284.6c-6.2-6.2-6.2-16.4 0-22.6l22.6-22.6c6.2-6.2 16.4-6.2 22.6 0L228 291.2l149.4-149.4c6.2-6.2 16.4-6.2 22.6 0l22.6 22.6c6.2 6.2 6.2 16.4 0 22.6L268 398.6z"/></svg>
                                        </span>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>

                {{-- Significance --}}
                @if (! empty($ch['significance']))
                    <p class="text-[15px] leading-relaxed text-gray-700">
                        <strong class="text-[#14166e]">Significance:</strong>
                        {{ $ch['significance'] }}
                    </p>
                @endif
            </div>
        </section>
    @endforeach

    {{-- Short chapter descriptions (bottom summary strip) --}}
    @if (! empty($shortDescriptions))
        <section class="py-16 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-x-10 gap-y-10">
                @foreach ($shortDescriptions as $sd)
                    <div>
                        <h3 class="text-[20px] font-semibold text-[#14166e] mb-3">
                            {{ $sd['name'] }}
                        </h3>
                        <p class="text-[14px] leading-relaxed text-gray-700">
                            {{ $sd['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</x-layouts.cms>
