{{--
    Block: Text + Image
    Two-column layout: rich text on one side, image on the other.
--}}
@php
    $heading       = $data['heading'] ?? '';
    $text          = $data['text'] ?? '';
    $imageUrl      = $data['image_url'] ?? '';
    $imageAlt      = $data['image_alt'] ?? ($heading ?: 'Section image');
    $imagePosition = $data['image_position'] ?? 'right';
    $ctaLabel      = $data['cta_label'] ?? '';
    $ctaUrl        = $data['cta_url'] ?? '';
@endphp

<section class="py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center {{ $imagePosition === 'left' ? 'lg:[&>*:first-child]:order-2' : '' }}">

            {{-- Text column --}}
            <div class="order-2 lg:order-none">
                @if($heading)
                    <h2 class="text-3xl font-bold text-[#0B2F5E] mb-4">{{ $heading }}</h2>
                @endif

                <div class="
                    text-gray-700 leading-relaxed
                    [&_h3]:text-xl [&_h3]:font-semibold [&_h3]:text-[#0B2F5E] [&_h3]:mt-4 [&_h3]:mb-2
                    [&_p]:mb-4 [&_p]:leading-7
                    [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul_li]:mb-1
                    [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4
                    [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
                    [&_strong]:font-semibold
                ">
                    {!! $text !!}
                </div>

                @if($ctaLabel && $ctaUrl)
                    <div class="mt-6">
                        <a href="{{ $ctaUrl }}"
                           class="inline-block bg-[#0B2F5E] text-white font-semibold px-6 py-3 rounded-lg hover:bg-[#0a2550] transition-colors">
                            {{ $ctaLabel }}
                        </a>
                    </div>
                @endif
            </div>

            {{-- Image column --}}
            @if($imageUrl)
                <div class="{{ $imagePosition === 'left' ? 'order-1 lg:order-none' : 'order-1 lg:order-none' }}">
                    <img src="{{ $imageUrl }}"
                         alt="{{ $imageAlt }}"
                         class="w-full rounded-xl shadow-lg object-cover"
                         loading="lazy">
                </div>
            @endif

        </div>
    </div>
</section>
