<div class="bg-white rounded-lg p-6 md:p-7 shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] flex flex-col text-center">
    @if (! empty($card['image']))
        <div class="mb-4">
            <img src="{{ $card['image'] }}" alt="" class="w-16 h-16 mx-auto object-contain" />
        </div>
    @endif

    @if (! empty($card['heading_html']))
        <h3 class="text-[18px] md:text-[19px] font-semibold text-[#14166e] mb-4">
            {!! $card['heading_html'] !!}
        </h3>
    @endif

    @if (! empty($card['items']))
        <ul class="space-y-3 text-left mb-5">
            @foreach ($card['items'] as $li)
                <li class="flex items-start gap-3">
                    <span class="mt-2 inline-block w-2 h-2 rounded-full bg-[#e74c1d] shrink-0"></span>
                    <span class="text-[14.5px] text-gray-700 leading-relaxed">{{ $li }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    @if (! empty($card['cta_label']))
        <div class="mt-auto pt-2">
            <a href="{{ $card['cta_href'] ?: '#' }}"
               class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[14px] px-5 py-2.5 rounded-full transition">
                {{ $card['cta_label'] }}
            </a>
        </div>
    @endif
</div>
