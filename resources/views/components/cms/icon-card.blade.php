@props([
    'icon',
    'iconWidth' => 64,
    'iconHeight' => 64,
    'title',
    'body' => null,
    'bullets' => [],
    'cta' => null,
    'textAlign' => 'center',
    'shadow' => false,
])

{{--
    Generic icon-on-top card used by:
      - Mission / Vision (128px icon, no shadow)
      - Chapter Functions (64px icon, shadow=true, optional CTA)
      - Objectives (64px icon, shadow=true, check-bullet list)

    `shadow` matches Elementor's `.t-bx` box-shadow from the live theme:
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
--}}
<div @class([
    'h-full flex flex-col px-6 py-8',
    'items-' . ($textAlign === 'center' ? 'center' : 'start'),
    'text-' . $textAlign,
    'bg-white rounded-md shadow-[0_7px_29px_rgba(100,100,111,0.2)]' => $shadow,
])>
    <img
        src="{{ $icon }}"
        width="{{ $iconWidth }}"
        height="{{ $iconHeight }}"
        alt=""
        loading="lazy"
        class="mb-4"
    />

    <h2 class="text-[22px] leading-snug font-semibold text-[#14166e] mb-3">
        {{ $title }}
    </h2>

    @if ($body)
        <div class="text-[15px] leading-relaxed text-gray-700 mb-4">
            {{ $body }}
        </div>
    @endif

    @if (! empty($bullets))
        <ul class="w-full space-y-2 mb-4 text-{{ $textAlign }}">
            @foreach ($bullets as $bullet)
                <li class="flex gap-2 text-[15px] text-gray-700 {{ $textAlign === 'center' ? 'justify-center' : '' }}">
                    <span class="shrink-0 mt-1 text-[#14166e]" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM227.3 387.3l184-184c6.2-6.2 6.2-16.4 0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6 0L216 308.1l-70.1-70.1c-6.2-6.2-16.4-6.2-22.6 0l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6l104 104c6.2 6.3 16.4 6.3 22.6 0z"/></svg>
                    </span>
                    <span class="text-left">{{ $bullet }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    @if ($cta)
        <div class="mt-auto pt-2">
            <a
                href="{{ $cta['url'] }}"
                class="inline-block px-5 py-2 bg-[#14166e] text-white text-sm rounded hover:bg-[#0f1159] transition-colors"
            >
                {{ $cta['label'] }}
            </a>
        </div>
    @endif
</div>
