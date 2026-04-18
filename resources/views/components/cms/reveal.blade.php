@props([
    'animation' => 'fadeInUp',
])

{{--
    Wraps content with a data-reveal attribute consumed by the IntersectionObserver
    in resources/js/app.js. Matches Elementor's fadeInUp / fadeInDown behavior.
--}}
<div {{ $attributes->merge(['data-reveal' => $animation]) }}>
    {{ $slot }}
</div>
