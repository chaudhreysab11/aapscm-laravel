{{--
    Block: Hero Banner
    Props passed via $data array from the blocks template.
--}}
@php
    $heading          = $data['heading'] ?? '';
    $subheading       = $data['subheading'] ?? '';
    $ctaLabel         = $data['cta_label'] ?? '';
    $ctaUrl           = $data['cta_url'] ?? '';
    $secondaryLabel   = $data['secondary_cta_label'] ?? '';
    $secondaryUrl     = $data['secondary_cta_url'] ?? '';
    $bgColor          = $data['background_color'] ?? 'blue';
    $bgImage          = $data['background_image'] ?? '';

    $bgClasses = match($bgColor) {
        'dark'  => 'bg-gray-900 text-white',
        'white' => 'bg-white text-gray-900',
        'gray'  => 'bg-gray-100 text-gray-900',
        default => 'bg-[#0B2F5E] text-white',
    };
    $btnSecondaryClasses = match($bgColor) {
        'white', 'gray' => 'border-[#0B2F5E] text-[#0B2F5E] hover:bg-[#0B2F5E] hover:text-white',
        default         => 'border-white text-white hover:bg-white hover:text-[#0B2F5E]',
    };
@endphp

<section
    class="relative {{ $bgClasses }} py-20 lg:py-28 overflow-hidden"
    @if($bgImage) style="background-image: url('{{ $bgImage }}'); background-size: cover; background-position: center;" @endif
>
    @if($bgImage)
        <div class="absolute inset-0 bg-[#0B2F5E]/70"></div>
    @endif

    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        @if($heading)
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                {!! nl2br(e($heading)) !!}
            </h1>
        @endif

        @if($subheading)
            <p class="mt-6 text-lg sm:text-xl leading-relaxed max-w-3xl mx-auto opacity-90">
                {{ $subheading }}
            </p>
        @endif

        @if($ctaLabel || $secondaryLabel)
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                @if($ctaLabel && $ctaUrl)
                    <a href="{{ $ctaUrl }}"
                       class="inline-block bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition-colors shadow-lg">
                        {{ $ctaLabel }}
                    </a>
                @endif

                @if($secondaryLabel && $secondaryUrl)
                    <a href="{{ $secondaryUrl }}"
                       class="inline-block border-2 {{ $btnSecondaryClasses }} font-semibold px-8 py-3 rounded-lg transition-colors">
                        {{ $secondaryLabel }}
                    </a>
                @endif
            </div>
        @endif

    </div>
</section>
