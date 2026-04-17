{{--
    Block: Call to Action Banner
    Full-width CTA section with heading, text, and one or two buttons.
--}}
@php
    $heading        = $data['heading'] ?? '';
    $text           = $data['text'] ?? '';
    $primaryLabel   = $data['primary_label'] ?? '';
    $primaryUrl     = $data['primary_url'] ?? '';
    $secondaryLabel = $data['secondary_label'] ?? '';
    $secondaryUrl   = $data['secondary_url'] ?? '';
    $bgColor        = $data['background_color'] ?? 'blue';
    $alignment      = $data['alignment'] ?? 'center';

    [$bgClass, $textClass, $subTextClass] = match($bgColor) {
        'dark'  => ['bg-gray-900', 'text-white', 'text-gray-300'],
        'white' => ['bg-white', 'text-gray-900', 'text-gray-600'],
        'gray'  => ['bg-gray-100', 'text-gray-900', 'text-gray-600'],
        default => ['bg-[#0B2F5E]', 'text-white', 'text-blue-200'],
    };

    $secondaryBtnClass = match($bgColor) {
        'white', 'gray' => 'border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white',
        default         => 'border-white text-white hover:bg-white hover:text-[#0B2F5E]',
    };

    $alignClass = $alignment === 'left' ? 'text-left' : 'text-center items-center';
@endphp

<section class="{{ $bgClass }} py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col {{ $alignClass }} gap-6">

            @if($heading)
                <h2 class="text-3xl sm:text-4xl font-bold {{ $textClass }} leading-tight">
                    {{ $heading }}
                </h2>
            @endif

            @if($text)
                <p class="{{ $subTextClass }} text-lg leading-relaxed max-w-2xl">
                    {{ $text }}
                </p>
            @endif

            @if($primaryLabel || $secondaryLabel)
                <div class="flex flex-col sm:flex-row gap-4 {{ $alignment === 'center' ? 'justify-center' : '' }}">
                    @if($primaryLabel && $primaryUrl)
                        <a href="{{ $primaryUrl }}"
                           class="inline-block bg-yellow-400 text-gray-900 font-bold px-8 py-3 rounded-lg hover:bg-yellow-300 transition-colors shadow-md">
                            {{ $primaryLabel }}
                        </a>
                    @endif

                    @if($secondaryLabel && $secondaryUrl)
                        <a href="{{ $secondaryUrl }}"
                           class="inline-block border-2 {{ $secondaryBtnClass }} font-semibold px-8 py-3 rounded-lg transition-colors">
                            {{ $secondaryLabel }}
                        </a>
                    @endif
                </div>
            @endif

        </div>
    </div>
</section>
