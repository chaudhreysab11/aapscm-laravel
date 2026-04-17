<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         Hero section
    ---------------------------------------------------------------- --}}
    <section class="bg-gradient-to-br from-[#0B2F5E] to-[#1a4a8a] text-white py-20 sm:py-28">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-6">
                {{ $page->title }}
            </h1>
            @if ($page->excerpt)
                <p class="text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto">
                    {{ $page->excerpt }}
                </p>
            @endif
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/membership') }}"
                   class="bg-yellow-400 text-[#0B2F5E] font-bold px-8 py-3 rounded-full text-base hover:bg-yellow-300 transition-colors shadow-lg">
                    Become a Member
                </a>
                <a href="{{ url('/certification') }}"
                   class="border-2 border-white text-white font-semibold px-8 py-3 rounded-full text-base hover:bg-white hover:text-[#0B2F5E] transition-colors">
                    View Certifications
                </a>
            </div>
        </div>
    </section>

    {{-- ----------------------------------------------------------------
         Main content
    ---------------------------------------------------------------- --}}
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        {{-- Content is admin-entered HTML from Filament RichEditor, sanitized at input --}}
        <div class="
            text-gray-700 leading-relaxed
            [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-[#0B2F5E] [&_h2]:mt-8 [&_h2]:mb-4 [&_h2]:text-center
            [&_h3]:text-xl  [&_h3]:font-semibold [&_h3]:text-[#0B2F5E] [&_h3]:mt-6 [&_h3]:mb-3
            [&_p]:mb-4 [&_p]:leading-7
            [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul_li]:mb-1
            [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4 [&_ol_li]:mb-1
            [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
            [&_blockquote]:border-l-4 [&_blockquote]:border-yellow-400 [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-gray-600 [&_blockquote]:my-6
            [&_table]:w-full [&_table]:border-collapse [&_table]:mb-6
            [&_th]:bg-[#0B2F5E] [&_th]:text-white [&_th]:px-4 [&_th]:py-2 [&_th]:text-left
            [&_td]:border [&_td]:border-gray-200 [&_td]:px-4 [&_td]:py-2
            [&_tr:nth-child(even)_td]:bg-gray-50
            [&_img]:rounded-lg [&_img]:max-w-full [&_img]:my-4
            [&_hr]:border-gray-200 [&_hr]:my-8
        ">
            {!! $page->content !!}
        </div>
    </article>

    {{-- ----------------------------------------------------------------
         Bottom CTA section
    ---------------------------------------------------------------- --}}
    <section class="bg-yellow-50 border-t border-yellow-200 py-14">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-[#0B2F5E] mb-3">Ready to Advance Your Career?</h2>
            <p class="text-gray-600 mb-6">
                Join a growing network of supply chain professionals with AAPSCM membership and certification.
            </p>
            <a href="{{ url('/membership') }}"
               class="inline-block bg-[#0B2F5E] text-white font-bold px-8 py-3 rounded-full hover:bg-[#0a2750] transition-colors shadow">
                Become a Member
            </a>
        </div>
    </section>

</x-layouts.cms>
