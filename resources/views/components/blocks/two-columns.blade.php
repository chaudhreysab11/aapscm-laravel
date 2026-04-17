{{--
    Block: Two Columns
    Two equal-width rich text columns side by side.
--}}
@php
    $heading      = $data['heading'] ?? '';
    $leftContent  = $data['left_content'] ?? '';
    $rightContent = $data['right_content'] ?? '';
@endphp

<section class="py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($heading)
            <h2 class="text-3xl font-bold text-[#0B2F5E] mb-8 text-center">{{ $heading }}</h2>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            @foreach([$leftContent, $rightContent] as $col)
                @if($col)
                    <div class="
                        text-gray-700 leading-relaxed
                        [&_h3]:text-xl [&_h3]:font-semibold [&_h3]:text-[#0B2F5E] [&_h3]:mt-4 [&_h3]:mb-2
                        [&_h4]:text-lg [&_h4]:font-semibold [&_h4]:mt-3 [&_h4]:mb-1
                        [&_p]:mb-4 [&_p]:leading-7
                        [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul_li]:mb-1
                        [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4
                        [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
                        [&_strong]:font-semibold
                    ">
                        {!! $col !!}
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>
