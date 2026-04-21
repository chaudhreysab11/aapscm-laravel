<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data           = $page->page_data ?? [];
        $hero           = $data['hero'] ?? [];
        $intro          = $data['intro'] ?? [];
        $steps          = $data['steps'] ?? [];
        $keysToSuccess  = $data['keys_to_success'] ?? [];
        $importantNotes = $data['important_notes'] ?? [];
        $ctaButtons     = $data['cta_buttons'] ?? [];
    @endphp

    {{-- Hero banner --}}
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[32px] md:text-[44px] font-bold text-white leading-tight">
                {{ $hero['heading'] ?? $page->title }}
            </h1>
        </div>
    </section>

    {{-- Intro --}}
    @if (! empty($intro))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $intro['heading'] ?? '' }}
                </h2>
                @if (! empty($intro['lead']))
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed max-w-[900px]">
                        {{ $intro['lead'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- Steps --}}
    @foreach ($steps as $i => $step)
        <section class="{{ $i % 2 === 0 ? 'bg-[#f6f8fb]' : 'bg-white' }} py-12">
            <div class="max-w-[1100px] mx-auto px-4">
                <a href="{{ $step['href'] ?? '#' }}" class="group block mb-4">
                    <h3 class="text-[22px] md:text-[28px] font-semibold leading-snug">
                        <span class="text-[#195b13]">Step {{ $step['number'] ?? ($i + 1) }}</span><span class="text-[#14166e]">: {{ $step['heading'] ?? '' }}</span>
                        <svg class="inline-block w-5 h-5 ml-2 text-[#14166e] opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </h3>
                </a>
                @if (! empty($step['description']))
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-5 max-w-[900px]">
                        {{ $step['description'] }}
                    </p>
                @endif
                @if (! empty($step['items']))
                    <ul class="space-y-3 ml-1">
                        @foreach ($step['items'] as $item)
                            <li class="flex items-start gap-3 text-[15px] text-gray-700 leading-relaxed">
                                <span class="text-[#14166e] shrink-0 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endforeach

    {{-- Keys to a Successful Online Test --}}
    @if (! empty($keysToSuccess))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4">
                <h3 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $keysToSuccess['heading'] ?? '' }}
                </h3>
                @if (! empty($keysToSuccess['description']))
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-6 max-w-[900px]">
                        {{ $keysToSuccess['description'] }}
                    </p>
                @endif
                @if (! empty($keysToSuccess['items']))
                    <ul class="space-y-3 ml-1">
                        @foreach ($keysToSuccess['items'] as $item)
                            <li class="flex items-start gap-3 text-[15px] text-gray-700 leading-relaxed">
                                <span class="text-green-400 shrink-0 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endif

    {{-- Important Notes --}}
    @if (! empty($importantNotes))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1100px] mx-auto px-4">
                <h3 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $importantNotes['heading'] ?? '' }}
                </h3>
                @if (! empty($importantNotes['description']))
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-5 max-w-[900px]">
                        {{ $importantNotes['description'] }}
                    </p>
                @endif
                @if (! empty($importantNotes['items']))
                    <ul class="space-y-3 ml-1 mb-8">
                        @foreach ($importantNotes['items'] as $item)
                            <li class="flex items-start gap-3 text-[15px] text-gray-700 leading-relaxed">
                                <span class="text-amber-600 shrink-0 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if (! empty($importantNotes['closing']))
                    @foreach ($importantNotes['closing'] as $paragraph)
                        <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-3 max-w-[900px]">
                            @if (str_contains($paragraph, 'info@aapscm.org'))
                                {!! str_replace('info@aapscm.org', '<a href="mailto:info@aapscm.org" class="text-[#14166e] underline hover:text-[#0B2F5E]">info@aapscm.org</a>', e($paragraph)) !!}
                            @else
                                {{ $paragraph }}
                            @endif
                        </p>
                    @endforeach
                @endif
            </div>
        </section>
    @endif

    {{-- CTA Buttons --}}
    @if (! empty($ctaButtons))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1100px] mx-auto px-4 flex flex-wrap justify-center gap-4">
                @foreach ($ctaButtons as $btn)
                    <a href="{{ $btn['href'] ?? '#' }}"
                       class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[15px] px-8 py-4 rounded transition">
                       {{ $btn['label'] ?? '' }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

</x-layouts.cms>
