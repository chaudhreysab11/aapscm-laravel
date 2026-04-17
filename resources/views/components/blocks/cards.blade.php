{{--
    Block: Cards Grid
    Section with a heading, optional intro, and a configurable grid of cards.
--}}
@php
    $heading = $data['heading'] ?? '';
    $intro   = $data['intro'] ?? '';
    $columns = (int) ($data['columns'] ?? 3);
    $items   = $data['items'] ?? [];

    $gridClass = match($columns) {
        2 => 'grid-cols-1 sm:grid-cols-2',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
        default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
    };
@endphp

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($heading)
            <h2 class="text-3xl font-bold text-[#0B2F5E] text-center mb-4">{{ $heading }}</h2>
        @endif

        @if($intro)
            <p class="text-gray-600 text-center max-w-2xl mx-auto mb-10">{{ $intro }}</p>
        @endif

        @if($items)
            <div class="grid {{ $gridClass }} gap-6">
                @foreach($items as $item)
                    @php $card = $item['data'] ?? []; @endphp
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col hover:shadow-md transition-shadow">

                        @if(!empty($card['image_url']))
                            <img src="{{ $card['image_url'] }}"
                                 alt="{{ $card['title'] ?? '' }}"
                                 class="w-full h-44 object-cover rounded-lg mb-4"
                                 loading="lazy">
                        @elseif(!empty($card['icon']))
                            <div class="w-12 h-12 bg-[#0B2F5E]/10 rounded-lg flex items-center justify-center mb-4">
                                <x-dynamic-component :component="$card['icon']" class="w-6 h-6 text-[#0B2F5E]" />
                            </div>
                        @endif

                        @if(!empty($card['title']))
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $card['title'] }}</h3>
                        @endif

                        @if(!empty($card['description']))
                            <p class="text-gray-600 text-sm leading-relaxed flex-1">{{ $card['description'] }}</p>
                        @endif

                        @if(!empty($card['link_url']) && !empty($card['link_label']))
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <a href="{{ $card['link_url'] }}"
                                   class="text-[#0B2F5E] font-medium text-sm hover:text-yellow-600 transition-colors inline-flex items-center gap-1">
                                    {{ $card['link_label'] }}
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
