<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php
        $data        = $page->page_data ?? [];
        $intro       = $data['intro'] ?? null;
        $lead        = $data['lead'] ?? null;
        $enroll      = $data['who_should_enroll'] ?? null;
        $highlights  = $data['program_highlights'] ?? null;
        $outcomes    = $data['learning_outcomes'] ?? null;
        $modules     = $data['modules'] ?? null;
        $pathway     = $data['certification_pathway'] ?? null;
        $examDetails = $data['exam_details'] ?? null;
        $training    = $data['training_options'] ?? null;
    @endphp

    {{-- 1 — Digital Procurement and Supply Chain Analytics (white, intro paragraphs) --}}
    @if (! empty($intro))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($intro['heading']))
                        <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">
                            {{ $intro['heading'] }}
                        </h2>
                    @endif
                    @foreach (($intro['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>

                @if (! empty($intro['image']))
                    <div>
                        <img src="{{ $intro['image'] }}" alt="{{ $intro['heading'] ?? '' }}" class="w-full h-auto rounded-md" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 2 — Lead paragraph (light) --}}
    @if (! empty($lead) && ! empty($lead['paragraph']))
        <section class="bg-[#f5f7fa] py-12 md:py-16">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $lead['paragraph'] }}</p>
            </div>
        </section>
    @endif

    {{-- 3+4+5 — Who Should Enroll (white, heading + intro + 4 check-cards) --}}
    @if (! empty($enroll))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($enroll['heading']))
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-left mb-4">
                        {{ $enroll['heading'] }}
                    </h2>
                @endif
                @if (! empty($enroll['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed text-left max-w-[1100px] mx-auto mb-10">
                        {{ $enroll['intro'] }}
                    </p>
                @endif

                @if (! empty($enroll['items']))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-[1100px] mx-auto">
                        @foreach ($enroll['items'] as $item)
                            <div class="bg-[#f5f7fa] rounded-md p-5 flex gap-4 items-start">
                                @if (! empty($item['icon']))
                                    <img src="{{ $item['icon'] }}" alt="" class="w-6 h-6 mt-1 object-contain shrink-0" loading="lazy">
                                @endif
                                <p class="text-[15px] text-gray-700 leading-relaxed">{{ $item['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 6+7+8 — Program Highlights (light, 5 image+title+text cards) --}}
    @if (! empty($highlights))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($highlights['heading']))
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-10">
                        {{ $highlights['heading'] }}
                    </h2>
                @endif

                @if (! empty($highlights['cards']))
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($highlights['cards'] as $card)
                            <div class="bg-white rounded-md shadow-sm p-6 text-center">
                                @if (! empty($card['icon']))
                                    <img src="{{ $card['icon'] }}" alt="{{ $card['title'] ?? '' }}" class="mx-auto mb-4 w-20 h-20 object-contain" loading="lazy">
                                @endif
                                @if (! empty($card['title']))
                                    <h3 class="text-[18px] font-semibold text-[#14166e] mb-2">{{ $card['title'] }}</h3>
                                @endif
                                @if (! empty($card['text']))
                                    <p class="text-[14px] text-gray-700 leading-relaxed">{{ $card['text'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 9+10+11+12 — Key Learning Outcomes (white, 5 check-cards) --}}
    @if (! empty($outcomes))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($outcomes['heading']))
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-left mb-4">
                        {{ $outcomes['heading'] }}
                    </h2>
                @endif
                @if (! empty($outcomes['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed text-left max-w-[1100px] mx-auto mb-10">
                        {{ $outcomes['intro'] }}
                    </p>
                @endif

                @if (! empty($outcomes['items']))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-[1100px] mx-auto">
                        @foreach ($outcomes['items'] as $item)
                            <div class="bg-[#f5f7fa] rounded-md p-5 flex gap-4 items-start">
                                @if (! empty($item['icon']))
                                    <img src="{{ $item['icon'] }}" alt="" class="w-6 h-6 mt-1 object-contain shrink-0" loading="lazy">
                                @endif
                                <p class="text-[15px] text-gray-700 leading-relaxed">{{ $item['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 13+14+15 — Program Structure and Modules (light, 8 image+title+text cards) --}}
    @if (! empty($modules))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($modules['heading']))
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug text-center mb-10">
                        {{ $modules['heading'] }}
                    </h2>
                @endif

                @if (! empty($modules['cards']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($modules['cards'] as $card)
                            <div class="bg-white rounded-md shadow-sm p-6 text-center">
                                @if (! empty($card['icon']))
                                    <img src="{{ $card['icon'] }}" alt="{{ $card['title'] ?? '' }}" class="mx-auto mb-4 w-16 h-16 object-contain" loading="lazy">
                                @endif
                                @if (! empty($card['title']))
                                    <h3 class="text-[16px] font-semibold text-[#14166e] mb-2">{{ $card['title'] }}</h3>
                                @endif
                                @if (! empty($card['text']))
                                    <p class="text-[14px] text-gray-700 leading-relaxed">{{ $card['text'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 16 — Certification and Career Pathways (white, 2-col image left, list + Enroll Now CTA) --}}
    @if (! empty($pathway))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($pathway['image']))
                    <div>
                        <img src="{{ $pathway['image'] }}" alt="{{ $pathway['heading'] ?? '' }}" class="w-full h-auto rounded-md" loading="lazy">
                    </div>
                @endif
                <div>
                    @if (! empty($pathway['heading']))
                        <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-6">
                            {{ $pathway['heading'] }}
                        </h2>
                    @endif
                    @if (! empty($pathway['paragraph']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $pathway['paragraph'] }}</p>
                    @endif
                    @if (! empty($pathway['roles']))
                        <ul class="space-y-2 mb-8">
                            @foreach ($pathway['roles'] as $role)
                                <li class="flex gap-3">
                                    <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                    <span class="text-[15px] text-gray-700">{{ $role }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (! empty($pathway['cta_label']) && ! empty($pathway['cta_href']))
                        <a href="{{ $pathway['cta_href'] }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">
                            {{ $pathway['cta_label'] }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- 17 — Exam Details table (light) --}}
    @if (! empty($examDetails) && ! empty($examDetails['rows']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 text-[14px] md:text-[15px] bg-white">
                        <tbody>
                            @foreach ($examDetails['rows'] as $row)
                                <tr class="border-b border-gray-200 last:border-b-0">
                                    <th class="bg-[#f0f3f9] text-[#14166e] text-left font-semibold align-top px-4 py-3 w-1/3 border-r border-gray-200">
                                        {{ $row['label'] }}
                                    </th>
                                    <td class="px-4 py-3 text-gray-700 align-top">{{ $row['value'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endif

    {{-- 19 — Training options (white, 2 cards with check + Purchase and Pay) --}}
    @if (! empty($training) && ! empty($training['options']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($training['options'] as $opt)
                    <div class="bg-[#f5f7fa] rounded-md p-6 flex flex-col">
                        <div class="flex gap-3 items-start mb-6">
                            @if (! empty($training['check_icon']))
                                <img src="{{ $training['check_icon'] }}" alt="" class="w-6 h-6 mt-1 object-contain shrink-0" loading="lazy">
                            @endif
                            <p class="text-[15px] text-gray-700 leading-relaxed">{{ $opt['text'] }}</p>
                        </div>
                        <div class="mt-auto text-center">
                            <a href="{{ $opt['cta_href'] }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">
                                {{ $opt['cta_label'] }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</x-layouts.cms>
