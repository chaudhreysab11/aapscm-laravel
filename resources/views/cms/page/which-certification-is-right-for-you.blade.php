<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero        = $page->page_data['hero']        ?? [];
        $credentials = $page->page_data['credentials'] ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero: image left, copy right --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($hero['image']))
                    <div>
                        <img src="{{ $hero['image'] }}" alt="{{ $hero['heading'] ?? $page->title }}" class="w-full h-auto rounded" />
                    </div>
                @endif

                <div>
                    @if (! empty($hero['heading']))
                        <h2 class="text-[30px] md:text-[36px] font-semibold text-[#14166e] leading-tight mb-5">
                            {{ $hero['heading'] }}
                        </h2>
                    @endif

                    @if (! empty($hero['intro']))
                        <p class="text-[16px] text-gray-700 leading-relaxed mb-6">
                            {{ $hero['intro'] }}
                        </p>
                    @endif

                    @if (! empty($hero['cta_label']))
                        <a href="{{ $hero['cta_url'] ?? '#' }}"
                           class="inline-block bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[15px] px-8 py-3 rounded transition">
                            {{ $hero['cta_label'] }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Credentials overview --}}
    @if (! empty($credentials))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($credentials['heading']))
                    <h3 class="text-[28px] md:text-[34px] font-semibold text-[#14166e] text-center mb-4">
                        {{ $credentials['heading'] }}
                    </h3>
                @endif

                @if (! empty($credentials['description']))
                    <p class="text-[16px] text-gray-700 leading-relaxed text-center max-w-[820px] mx-auto mb-10">
                        {{ $credentials['description'] }}
                    </p>
                @endif

                @if (! empty($credentials['tracks']))
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                        @foreach ($credentials['tracks'] as $track)
                            <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] p-6 md:p-7 border-t-4 border-[#14166e]">
                                <h4 class="text-[20px] font-semibold text-[#14166e] mb-3">{{ $track['title'] }}</h4>
                                <p class="text-[15px] text-gray-700 leading-relaxed mb-4">{{ $track['blurb'] }}</p>
                                @if (! empty($track['examples']))
                                    <ul class="space-y-2">
                                        @foreach ($track['examples'] as $example)
                                            <li class="flex items-start gap-2 text-[14px] text-gray-800">
                                                <svg class="w-4 h-4 text-[#14166e] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                {{ $example }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                @if (! empty($credentials['browse_url']))
                    <div class="text-center">
                        <a href="{{ $credentials['browse_url'] }}"
                           class="inline-block bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[15px] px-10 py-3 rounded transition">
                            {{ $credentials['browse_label'] ?? 'Browse All Certifications' }}
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

</x-layouts.cms>
