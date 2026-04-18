@props([
    'icon',
    'iconWidth' => 92,
    'iconHeight' => 79,
    'body',
    'shadow' => false,
])

{{--
    Elementor "image-box" widget, position=left, vertical-align=top.
    Used by the AAPSCM Goals section — check icon on the left, body text
    flowing to the right of it.

    `shadow` matches Elementor's `.t-bx` box-shadow:
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
--}}
<div @class([
    'flex items-start gap-4 px-5 py-5',
    'bg-white rounded-md shadow-[0_7px_29px_rgba(100,100,111,0.2)]' => $shadow,
])>
    <figure class="shrink-0">
        <img
            src="{{ $icon }}"
            width="{{ $iconWidth }}"
            height="{{ $iconHeight }}"
            alt=""
            loading="lazy"
        />
    </figure>
    <div class="text-[15px] leading-relaxed text-gray-700">
        {!! $body !!}
    </div>
</div>
