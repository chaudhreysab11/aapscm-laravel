<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data            = $page->page_data ?? [];
        $whyCert         = $data['why_cert'] ?? null;
        $aboutExam       = $data['about_exam'] ?? null;
        $whoBenefits     = $data['who_benefits'] ?? null;
        $evolution       = $data['evolution'] ?? null;
        $whyBenefit      = $data['why_benefit'] ?? null;
        $aiGrowing       = $data['ai_growing'] ?? null;
        $whoBenefitsLong = $data['who_benefits_long'] ?? null;
        $whyBenefitLong  = $data['why_benefit_long'] ?? null;
        $examDetails     = $data['exam_details'] ?? null;
        $training        = $data['training_options'] ?? null;
    @endphp

    {{-- 0 — Why Go for CSAI Certification (lead, white, 2-col) --}}
    @if (! empty($whyCert))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($whyCert['heading']))
                        <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] mb-6">
                            {{ $whyCert['heading'] }}
                        </h2>
                    @endif
                    @foreach (($whyCert['paragraphs'] ?? []) as $p)
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                    @endforeach
                </div>
                @if (! empty($whyCert['image']))
                    <div>
                        <img src="{{ $whyCert['image'] }}" alt="{{ $whyCert['heading'] ?? '' }}" class="w-full h-auto" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 1 — About the Exam (light, intro + 6 image-box cards) --}}
    @if (! empty($aboutExam))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($aboutExam['heading']))
                    <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] text-center mb-6">
                        {{ $aboutExam['heading'] }}
                    </h2>
                @endif
                @if (! empty($aboutExam['paragraph']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-[1100px] mx-auto text-center mb-4">
                        {{ $aboutExam['paragraph'] }}
                    </p>
                @endif
                @if (! empty($aboutExam['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-[1100px] mx-auto text-center mb-10">
                        {{ $aboutExam['intro'] }}
                    </p>
                @endif

                @if (! empty($aboutExam['cards']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($aboutExam['cards'] as $card)
                            <div class="bg-white rounded-md shadow-sm p-6 text-center">
                                @if (! empty($card['icon']))
                                    <img src="{{ $card['icon'] }}" alt="{{ $card['title'] ?? '' }}" class="mx-auto mb-4 w-16 h-16 object-contain" loading="lazy">
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

                @if (! empty($aboutExam['closing']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-[1100px] mx-auto text-center mt-10">
                        {{ $aboutExam['closing'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- 3+4+5+6 — Who Would Benefit (white, intro + 6 mini cards + closing) --}}
    @if (! empty($whoBenefits))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($whoBenefits['heading']))
                    <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] text-center mb-6">
                        {{ $whoBenefits['heading'] }}
                    </h2>
                @endif
                @if (! empty($whoBenefits['intro']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-[1100px] mx-auto text-center mb-10">
                        {{ $whoBenefits['intro'] }}
                    </p>
                @endif

                @if (! empty($whoBenefits['cards']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($whoBenefits['cards'] as $card)
                            <div class="text-center">
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

                @if (! empty($whoBenefits['closing']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed max-w-[1100px] mx-auto text-center mt-10">
                        {{ $whoBenefits['closing'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- 7 — Evolution of Supply Chain Roles (light) --}}
    @if (! empty($evolution))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                @if (! empty($evolution['heading']))
                    <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] mb-6">
                        {{ $evolution['heading'] }}
                    </h2>
                @endif
                @if (! empty($evolution['body']))
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $evolution['body'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- 8 — Why Would You Benefit (white) --}}
    @if (! empty($whyBenefit))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                @if (! empty($whyBenefit['heading']))
                    <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] mb-6">
                        {{ $whyBenefit['heading'] }}
                    </h2>
                @endif
                @foreach (($whyBenefit['paragraphs'] ?? []) as $p)
                    <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-4">{{ $p }}</p>
                @endforeach
            </div>
        </section>
    @endif

    {{-- 9 — The Growing Role of AI (light, 2-col) --}}
    @if (! empty($aiGrowing))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($aiGrowing['heading']))
                        <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] mb-6">
                            {{ $aiGrowing['heading'] }}
                        </h2>
                    @endif
                    @if (! empty($aiGrowing['body']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $aiGrowing['body'] }}</p>
                    @endif
                </div>
                @if (! empty($aiGrowing['image']))
                    <div>
                        <img src="{{ $aiGrowing['image'] }}" alt="{{ $aiGrowing['heading'] ?? '' }}" class="w-full h-auto" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- 10 — Who would benefit (long, white, 2-col image left) --}}
    {{-- @if (! empty($whoBenefitsLong))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($whoBenefitsLong['image']))
                    <div>
                        <img src="{{ $whoBenefitsLong['image'] }}" alt="{{ $whoBenefitsLong['heading'] ?? '' }}" class="w-full h-auto" loading="lazy">
                    </div>
                @endif
                <div>
                    @if (! empty($whoBenefitsLong['heading']))
                        <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] mb-6">
                            {{ $whoBenefitsLong['heading'] }}
                        </h2>
                    @endif
                    @if (! empty($whoBenefitsLong['body']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $whoBenefitsLong['body'] }}</p>
                    @endif
                </div>
            </div>
        </section>
    @endif --}}

    {{-- 11 — Why would you benefit (long, light, 2-col image right) --}}
    {{-- @if (! empty($whyBenefitLong))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($whyBenefitLong['heading']))
                        <h2 class="text-[28px] md:text-[34px] leading-tight font-bold text-[#14166e] mb-6">
                            {{ $whyBenefitLong['heading'] }}
                        </h2>
                    @endif
                    @if (! empty($whyBenefitLong['body']))
                        <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $whyBenefitLong['body'] }}</p>
                    @endif
                </div>
                @if (! empty($whyBenefitLong['image']))
                    <div>
                        <img src="{{ $whyBenefitLong['image'] }}" alt="{{ $whyBenefitLong['heading'] ?? '' }}" class="w-full h-auto" loading="lazy">
                    </div>
                @endif
            </div>
        </section>
    @endif --}}

    {{-- 12 — Exam Details table + 3 CTAs (white) --}}
    @if (! empty($examDetails))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4">
                @if (! empty($examDetails['rows']))
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-200 text-[14px] md:text-[15px]">
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
                @endif

                {{-- @if (! empty($examDetails['buttons']))
                    <div class="flex flex-wrap justify-center gap-4 mt-10">
                        @foreach ($examDetails['buttons'] as $btn)
                            <a href="{{ $btn['href'] }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">
                                {{ $btn['label'] }}
                            </a>
                        @endforeach
                    </div>
                @endif --}}
            </div>
        </section>
    @endif

    {{-- 13 — Training options (light, 2 cards with check + Purchase and Pay) --}}
    @if (! empty($training) && ! empty($training['options']))
        <section class="bg-[#f5f7fa] py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($training['options'] as $opt)
                    <div class="bg-white rounded-md shadow-sm p-6 flex flex-col">
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
