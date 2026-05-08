<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero          = $page->page_data['hero_heading']     ?? $page->title;
        $overview      = $page->page_data['overview']         ?? [];
        $workExp       = $page->page_data['work_experience']  ?? [];
        $quals         = $page->page_data['qualifications']   ?? [];
        $cta           = $page->page_data['cta']              ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[960px] mx-auto px-4 text-center">
            <h2 class="text-[30px] md:text-[36px] font-semibold text-[#14166e] leading-tight">
                {{ $hero }}
            </h2>
        </div>
    </section>

    {{-- Main two-column: criteria on left, Ready to apply on right --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-10">

                {{-- Left: criteria --}}
                <div class="space-y-8">
                    @if (! empty($overview))
                        <div>
                            @if (! empty($overview['kicker']))
                                <h3 class="text-[22px] md:text-[26px] font-semibold text-[#14166e] mb-3">
                                    {{ $overview['kicker'] }}
                                </h3>
                            @endif
                            @if (! empty($overview['lead']))
                                <p class="text-[16px] text-gray-700 leading-relaxed">
                                    {!! $overview['lead'] !!}
                                </p>
                            @endif
                        </div>
                    @endif

                    @if (! empty($workExp))
                        <div>
                            <h3 class="text-[22px] md:text-[26px] font-semibold text-[#14166e] mb-3">
                                {{ $workExp['heading'] }}
                            </h3>
                            <p class="text-[16px] text-gray-700 leading-relaxed">{{ $workExp['body'] }}</p>
                        </div>
                    @endif

                    @if (! empty($quals))
                        <div>
                            <h3 class="text-[22px] md:text-[26px] font-semibold text-[#14166e] mb-3">
                                {{ $quals['heading'] ?? 'Relevant Qualifications' }}
                            </h3>
                            @if (! empty($quals['subheading']))
                                <p class="text-[16px] font-semibold text-gray-800 mb-4">{{ $quals['subheading'] }}</p>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Right: apply CTA --}}
                @if (! empty($cta))
                    <aside class="bg-[#f6f8fb] rounded-lg p-6 md:p-8 border-l-4 border-[#14166e] h-fit">
                        <h3 class="text-[22px] md:text-[26px] font-semibold text-[#14166e] mb-4">
                            {{ $cta['heading'] }}
                        </h3>
                        <a href="{{ $cta['url'] ?? '#' }}"
                           class="inline-block bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[14px] px-6 py-2.5 rounded transition">
                            {{ $cta['label'] }}
                        </a>
                    </aside>
                @endif
            </div>
        </div>
    </section>

    {{-- Qualifications grid --}}
    @if (! empty($quals['awards']))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h3 class="text-[22px] md:text-[26px] font-semibold text-[#14166e] mb-2">
                    BCS Accredited and other degrees in IT relevant subjects
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    @foreach ($quals['awards'] as $award)
                        <div class="bg-white rounded-lg p-5 border border-gray-200 shadow-sm">
                            <p class="text-[16px] text-gray-800 leading-relaxed">
                                <strong class="text-[#14166e]">{{ $award['name'] }}</strong>
                                @if (! empty($award['detail']))
                                    <span class="text-gray-700"> {{ $award['detail'] }}</span>
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>

                @if (! empty($quals['footer_note']))
                    <p class="text-[15px] text-gray-700 leading-relaxed mt-8 italic">
                        {{ $quals['footer_note'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

</x-layouts.cms>
