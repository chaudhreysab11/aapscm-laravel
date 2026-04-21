<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero         = $page->page_data['hero']             ?? [];
        $whyDiff      = $page->page_data['why_different']    ?? [];
        $whyCert      = $page->page_data['why_cert']         ?? [];
        $aboutExam    = $page->page_data['about_exam']       ?? [];
        $skills       = $page->page_data['skills']           ?? [];
        $focusAreas   = $page->page_data['focus_areas']      ?? [];
        $aiIntro      = $page->page_data['ai_intro']         ?? [];
        $whoBenefits  = $page->page_data['who_benefits']     ?? [];
        $whyBenefit   = $page->page_data['why_benefit']      ?? [];
        $examDetails  = $page->page_data['exam_details']     ?? [];
        $training     = $page->page_data['training_options'] ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- SECTION 0 — Hero: 2-col (heading+text left, image right) --}}
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

    {{-- SECTION 1 — Why is it Different? 2-col (image left, heading+text right) --}}
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

    {{-- SECTION 2 — Why Go for ACPP Certification? Navy background, centered, green CTA --}}
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

    {{-- SECTION 3 — About the exam: 2-col (image left, heading+bullets right) --}}
    @if (! empty($aboutExam))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($aboutExam['image']))
                    <div class="flex justify-center">
                        <img src="{{ $aboutExam['image'] }}" alt="{{ $aboutExam['heading'] ?? '' }}"
                             class="w-full max-w-[520px] h-auto rounded" />
                    </div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $aboutExam['heading'] }}
                    </h2>
                    @if (! empty($aboutExam['intro']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                            {{ $aboutExam['intro'] }}
                        </p>
                    @endif
                    <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        @foreach (($aboutExam['items'] ?? []) as $item)
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif
    
{{-- SECTION 7 — Focus areas: 2-col (image + bullets + summary | image) --}}
    @if (! empty($focusAreas))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    {{-- @if (! empty($focusAreas['image_left']))
                        <img src="{{ $focusAreas['image_left'] }}" alt="Focus areas"
                             class="w-full max-w-[520px] h-auto rounded-lg mb-6 shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    @endif --}}
                    <ul class="space-y-3 text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">
                        @foreach (($focusAreas['items'] ?? []) as $item)
                            <li class="flex gap-3">
                                <span class="text-[#5cb85c] font-bold mt-[2px]">&#10003;</span>
                                <span><span class="font-semibold text-[#14166e]">{{ $item['title'] }}:</span> {{ $item['text'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                    @if (! empty($focusAreas['summary']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                            {{ $focusAreas['summary'] }}
                        </p>
                    @endif
                </div>
                @if (! empty($focusAreas['image_right']))
                    <div class="flex justify-center">
                        <img src="{{ $focusAreas['image_right'] }}" alt="Focus areas"
                             class="w-full max-w-[520px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]" />
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 4/5/6 — Skills grid: centered heading then 6 cards in 3-col rows --}}
    @if (! empty($skills))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-10 text-center">
                    {{ $skills['heading'] }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach (($skills['cards'] ?? []) as $card)
                        <div class="bg-white rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px]">
                            @if (! empty($card['icon']))
                                <img src="{{ $card['icon'] }}" alt="{{ $card['title'] }}"
                                     class="w-16 h-16 mx-auto mb-4 object-contain" />
                            @endif
                            <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mb-3">
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



    {{-- SECTION 8 — Introduction to AI in Procurement: navy bg, centered --}}
    @if (! empty($aiIntro))
        <section class="bg-[#14166e] py-16 text-white">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-bold uppercase mb-6 leading-snug">
                    {{ $aiIntro['heading'] }}
                </h2>
                <p class="text-[15px] md:text-[16px] text-gray-100 leading-relaxed max-w-[960px] mx-auto">
                    {{ $aiIntro['body'] }}
                </p>
            </div>
        </section>
    @endif

    {{-- SECTION 9 — Who Would Benefit: 2-col (text left, image right) --}}
    @if (! empty($whoBenefits))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $whoBenefits['heading'] }}
                    </h2>
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                        {{ $whoBenefits['description'] }}
                    </p>
                </div>
                @if (! empty($whoBenefits['side_image']))
                    <div class="flex justify-center">
                        <img src="{{ $whoBenefits['side_image'] }}" alt="{{ $whoBenefits['heading'] ?? '' }}"
                             class="w-full max-w-[420px] h-auto" />
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- SECTION 10 — Why Would You Benefit: 2-col (badge left, text right) --}}
    @if (! empty($whyBenefit))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($whyBenefit['badge_image']))
                    <div class="flex justify-center">
                        <img src="{{ $whyBenefit['badge_image'] }}" alt="{{ $whyBenefit['heading'] ?? '' }}"
                             class="w-full max-w-[420px] h-auto" />
                    </div>
                @endif
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase mb-5 leading-snug">
                        {{ $whyBenefit['heading'] }}
                    </h2>
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                        {{ $whyBenefit['body'] }}
                    </p>
                </div>
            </div>
        </section>
    @endif

    {{-- SECTION 11 — Exam Details table + Download Flyer CTA --}}
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

    {{-- SECTION 12 — Training options: 2 cards side-by-side with green CTA --}}
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
