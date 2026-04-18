<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $heroHeading     = $page->page_data['hero_heading']       ?? $page->title;
        $intro           = $page->page_data['intro']              ?? '';
        $sections        = $page->page_data['sections']           ?? [];
        $authorizedUsers = $page->page_data['authorized_users']   ?? [];
        $termsOfUse      = $page->page_data['terms_of_use']       ?? [];
        $contactLine     = $page->page_data['contact_line_html']  ?? '';
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero heading band --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[900px] mx-auto px-4 text-center">
            <h2 class="text-[30px] md:text-[36px] font-semibold text-[#14166e] leading-tight">
                {{ $heroHeading }}
            </h2>
        </div>
    </section>

    {{-- Body --}}
    <section class="bg-white py-14">
        <div class="max-w-[900px] mx-auto px-4 text-[16px] leading-relaxed text-gray-800">

            @if ($intro)
                <p class="mb-8">{{ $intro }}</p>
            @endif

            @foreach ($sections as $section)
                <div class="mb-8">
                    @if (! empty($section['heading']))
                        <h3 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-4">
                            {{ $section['heading'] }}
                        </h3>
                    @endif

                    @if (! empty($section['lead']))
                        <p class="mb-4">{{ $section['lead'] }}</p>
                    @endif

                    @if (! empty($section['bullets']))
                        <ul class="space-y-2 mb-4">
                            @foreach ($section['bullets'] as $b)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#14166e] flex-shrink-0 mt-[2px]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ $b }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @foreach ($section['paragraphs'] ?? [] as $p)
                        <p class="mb-4">{{ $p }}</p>
                    @endforeach
                </div>
            @endforeach

            @if (! empty($authorizedUsers))
                <div class="mb-8 space-y-5">
                    @foreach ($authorizedUsers as $u)
                        <div class="border-l-4 border-[#14166e] pl-4 py-1">
                            <p class="mb-1"><strong class="text-[#14166e]">{{ $u['title'] }}</strong> &ndash; {{ $u['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            @if (! empty($termsOfUse))
                <div class="mb-8">
                    @if (! empty($termsOfUse['heading']))
                        <h3 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-4">
                            {{ $termsOfUse['heading'] }}
                        </h3>
                    @endif
                    @foreach ($termsOfUse['paragraphs'] ?? [] as $p)
                        <p class="mb-4">{{ $p }}</p>
                    @endforeach
                </div>
            @endif

            @if ($contactLine)
                <p class="mt-10 pt-6 border-t border-gray-200 text-[15px] text-gray-700">
                    {!! $contactLine !!}
                </p>
            @endif

        </div>
    </section>

</x-layouts.cms>
