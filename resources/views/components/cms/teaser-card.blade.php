@props([
    'image',
    'heading',
    'headingUrl' => null,
    'body' => null,
    'buttonLabel',
    'buttonUrl',
])

{{--
    Teaser card used by the CAREERS + BOARD MEMBERS section.
    Wide banner image on top, linked H2 heading, prose, then a link button.
--}}
<div class="flex flex-col items-start gap-4 px-4 py-4">
    <img
        src="{{ $image }}"
        alt=""
        loading="lazy"
        class="w-full max-w-[512px] h-auto"
    />

    <h2 class="text-[28px] leading-tight font-semibold text-[#14166e]">
        @if ($headingUrl)
            <a href="{{ $headingUrl }}" class="hover:underline">{{ $heading }}</a>
        @else
            {{ $heading }}
        @endif
    </h2>

    @if ($body)
        <div class="text-[15px] leading-relaxed text-gray-700">
            {!! $body !!}
        </div>
    @endif

    <a
        href="{{ $buttonUrl }}"
        class="inline-block px-5 py-2 bg-[#14166e] text-white text-sm rounded hover:bg-[#0f1159] transition-colors"
    >
        {{ $buttonLabel }}
    </a>
</div>
