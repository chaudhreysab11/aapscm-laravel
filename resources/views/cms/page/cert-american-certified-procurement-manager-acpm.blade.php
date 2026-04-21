<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero          = $page->page_data['hero']                ?? [];
        $whyDiff       = $page->page_data['why_different']       ?? [];
        $whyCert       = $page->page_data['why_cert']            ?? [];
        $aboutExam     = $page->page_data['about_exam']          ?? [];
        $examHeader    = $page->page_data['exam_areas_header']   ?? [];
        $examAreas     = $page->page_data['exam_areas']          ?? [];
        $aiOutcomes    = $page->page_data['ai_outcomes']         ?? [];
        $growing       = $page->page_data['growing_opportunity'] ?? [];
        $examDetails   = $page->page_data['exam_details']        ?? [];
        $training      = $page->page_data['training_options']    ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- SECTION 0 — Hero: 2-col (heading+text left, image right) --}}
    @if (! empty($hero))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[24px] md:text-[30px] lg:text-[34px] font-bold text-[#14166e] uppercase leading-tight mb-6">
                        {{ $hero['heading'] ?? '' }}
                    </h2>
                    @if (! empty($hero['body']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                            {{ $hero['body'] }}
                        </p>
                    @endif
                </div>
                @if (! empty($hero['image']))
                    <div class="flex justify-center">
                        <img src="{{ $hero['image'] }}" alt="{{ $hero['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto" />
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 1 — Why is it different? 2-col (image left, heading+text right) --}}
    @if (! empty($whyDiff))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($whyDiff['image']))
                    <div class="flex justify-center">
                        <img src="{{ $whyDiff['image'] }}" alt="{{ $whyDiff['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto" />
                    </div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $whyDiff['heading'] }}
                    </h2>
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        {{ $whyDiff['body'] }}
                    </p>
                </div>
            </div>
        </section>
    @endif

    {{-- SECTION 2 — Why Go for ACPM Certification? Navy bg, centered, green CTA --}}
    @if (! empty($whyCert))
        <section class="bg-[#14166e] py-16 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase mb-6 leading-snug">
                    {{ $whyCert['heading'] }}
                </h2>
                <div class="space-y-4 text-[15px] md:text-[16px] text-gray-100 leading-relaxed max-w-[960px] mx-auto">
                    @foreach (($whyCert['paragraphs'] ?? []) as $p)
                        <p>{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($whyCert['cta_label']))
                    <div class="mt-8">
                        <a href="{{ $whyCert['cta_href'] ?? '#' }}"
                           class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">
                            {{ $whyCert['cta_label'] }}
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 3 — About the CPM Exam: 2-col (image stack left, heading+grouped bullets right)
    @if (! empty($aboutExam))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                <div class="space-y-6">
                    @if (! empty($aboutExam['image_top']))
                        <div class="flex justify-center">
                            <img src="{{ $aboutExam['image_top'] }}" alt="{{ $aboutExam['image_caption'] ?? '' }}"
                                 class="w-full max-w-[520px] h-auto rounded" />
                        </div>
                    @endif
                    @if (! empty($aboutExam['image_caption']))
                        <p class="text-center text-[16px] md:text-[18px] font-semibold text-[#14166e]">
                            {{ $aboutExam['image_caption'] }}
                        </p>
                    @endif
                    @if (! empty($aboutExam['image_bottom']))
                        <div class="flex justify-center">
                            <img src="{{ $aboutExam['image_bottom'] }}" alt="{{ $aboutExam['heading'] ?? '' }}"
                                 class="w-full max-w-[520px] h-auto rounded" />
                        </div>
                    @endif
                </div>
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $aboutExam['heading'] }}
                    </h2>
                    @if (! empty($aboutExam['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                            {{ $aboutExam['intro'] }}
                        </p>
                    @endif
                    <div class="space-y-5">
                        @foreach (($aboutExam['groups'] ?? []) as $group)
                            <div>
                                <h3 class="text-[16px] md:text-[17px] font-semibold text-[#14166e] mb-2">
                                    {{ $group['title'] }}
                                </h3>
                                @if (! empty($group['items']))
                                    <ul class="space-y-2 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                        @foreach ($group['items'] as $item)
                                            <li class="flex gap-3">
                                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                                <span>{{ $item }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

    {{-- SECTION 4 — About the ACPM Exam header (centered intro) --}}
    @if (! empty($examHeader))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                    {{ $examHeader['heading'] }}
                </h2>
                @if (! empty($examHeader['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-[960px] mx-auto">
                        {{ $examHeader['intro'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 5+6 — Exam areas: 8 icon-box cards in 4-col grid --}}
    @if (! empty($examAreas['cards']))
        <section class="bg-[#f5f7fa] pb-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($examAreas['cards'] as $card)
                        <div class="bg-white rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px]">
                            <h3 class="text-[16px] md:text-[17px] font-semibold text-[#14166e] mb-3">
                                {{ $card['title'] }}
                            </h3>
                            @if (! empty($card['text']))
                                <p class="text-[14px] md:text-[15px] text-gray-600 leading-relaxed">
                                    {{ $card['text'] }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- SECTION 7 — Learning Outcomes with AI Integration: 2-col (heading+intro+bullets | image) --}}
    @if (! empty($aiOutcomes))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $aiOutcomes['heading'] }}
                    </h2>
                    @if (! empty($aiOutcomes['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                            {{ $aiOutcomes['intro'] }}
                        </p>
                    @endif
                    <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        @foreach (($aiOutcomes['items'] ?? []) as $item)
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if (! empty($aiOutcomes['side_image']))
                    <div class="flex justify-center">
                        <img src="{{ $aiOutcomes['side_image'] }}" alt="{{ $aiOutcomes['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto" />
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 8 — A Growing Opportunity: 2-col (image left, heading+paragraphs right) --}}
    @if (! empty($growing))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($growing['image']))
                    <div class="flex justify-center">
                        <img src="{{ $growing['image'] }}" alt="{{ $growing['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    </div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $growing['heading'] }}
                    </h2>
                    <div class="space-y-4 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        @foreach (($growing['paragraphs'] ?? []) as $p)
                            <p>{{ $p }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- SECTION 9 + 10 — Exam Details table + Download Flyer CTA --}}
    @if (! empty($examDetails['rows']))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="bg-white rounded-lg overflow-hidden border border-gray-200 shadow-[rgba(100,100,111,0.08)_0px_4px_14px_0px]">
                    <table class="w-full text-[15px] md:text-[16px]">
                        <tbody>
                            @foreach ($examDetails['rows'] as $row)
                                <tr class="border-b last:border-b-0 border-gray-200">
                                    <th class="text-left font-semibold text-[#14166e] bg-[#f0f3f9] px-5 py-4 w-1/3 align-top">
                                        {{ $row['label'] }}
                                    </th>
                                    <td class="px-5 py-4 text-gray-700 align-top leading-relaxed">
                                        {{ $row['value'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if (! empty($examDetails['flyer']['href']))
                    <div class="text-center mt-8">
                        <a href="{{ $examDetails['flyer']['href'] }}" target="_blank" rel="noopener"
                           class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">
                            {{ $examDetails['flyer']['label'] ?? 'Download Flyer' }}
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 11 — Training options: 2 cards side-by-side with green CTA --}}
    @if (! empty($training['options']))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($training['options'] as $opt)
                        <div class="bg-white rounded-lg p-6 md:p-8 shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] flex flex-col">
                            <div class="flex items-start gap-4 mb-6">
                                @if (! empty($training['check_icon']))
                                    <img src="{{ $training['check_icon'] }}" alt=""
                                         class="w-10 h-10 object-contain flex-shrink-0" />
                                @endif
                                <p class="flex-1 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                                    {{ $opt['text'] }}
                                </p>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ $opt['cta_href'] ?? '#' }}"
                                   class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-6 py-3 rounded-full transition">
                                    {{ $opt['cta_label'] ?? 'Purchase and Pay' }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
