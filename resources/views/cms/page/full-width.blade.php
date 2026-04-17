<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         Page hero
    ---------------------------------------------------------------- --}}
    <div class="bg-[#0B2F5E] text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <nav aria-label="Breadcrumb" class="text-sm text-blue-300 mb-4">
                <ol class="flex items-center gap-2">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition-colors">Home</a></li>
                    <li aria-hidden="true" class="text-blue-500">/</li>
                    <li class="text-white" aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>

            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">{{ $page->title }}</h1>

            @if ($page->excerpt)
                <p class="mt-4 text-lg text-blue-100 leading-relaxed max-w-3xl">
                    {{ $page->excerpt }}
                </p>
            @endif
        </div>
    </div>

    {{-- ----------------------------------------------------------------
         Full-width content
    ---------------------------------------------------------------- --}}
    <article class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- Content is admin-entered HTML from Filament RichEditor, sanitized at input --}}
        <div class="
            text-gray-700 leading-relaxed
            [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-[#0B2F5E] [&_h2]:mt-8 [&_h2]:mb-4
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

</x-layouts.cms>
