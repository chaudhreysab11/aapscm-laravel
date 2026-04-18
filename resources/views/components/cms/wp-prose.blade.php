@props(['content' => null, 'maxWidth' => 'max-w-[1100px]'])

{{--
    Renders legacy WordPress/Elementor body HTML inside a prose container
    styled to match the aapscm.org look. Used by all generic template views
    (standard-content, legal-full-width, sidebar-guide) as the $page->content
    fallback when no blocks are defined.
--}}
<div class="{{ $maxWidth }} mx-auto px-4 py-12">
    @if (! empty($content))
        <div
            class="wp-content
                text-[15px] leading-relaxed text-gray-800
                [&_h1]:text-[32px] [&_h1]:font-semibold [&_h1]:text-[#14166e] [&_h1]:mt-8 [&_h1]:mb-4
                [&_h2]:text-[26px] [&_h2]:font-semibold [&_h2]:text-[#14166e] [&_h2]:mt-8 [&_h2]:mb-4
                [&_h3]:text-[22px] [&_h3]:font-semibold [&_h3]:text-[#14166e] [&_h3]:mt-6 [&_h3]:mb-3
                [&_h4]:text-[18px] [&_h4]:font-semibold [&_h4]:text-[#14166e] [&_h4]:mt-5 [&_h4]:mb-2
                [&_h5]:text-[16px] [&_h5]:font-semibold [&_h5]:text-[#14166e] [&_h5]:mt-5 [&_h5]:mb-2
                [&_p]:mb-4
                [&_a]:text-[#14166e] [&_a]:underline hover:[&_a]:text-[#0f1159]
                [&_strong]:font-semibold
                [&_ul]:list-disc [&_ul]:ml-6 [&_ul]:mb-4 [&_ul]:space-y-1
                [&_ol]:list-decimal [&_ol]:ml-6 [&_ol]:mb-4 [&_ol]:space-y-1
                [&_li]:leading-relaxed
                [&_img]:max-w-full [&_img]:h-auto [&_img]:rounded [&_img]:my-4
                [&_figure]:my-6
                [&_blockquote]:border-l-4 [&_blockquote]:border-[#14166e] [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:my-4 [&_blockquote]:text-gray-600
                [&_table]:w-full [&_table]:my-6 [&_table]:border-collapse
                [&_th]:border [&_th]:border-gray-300 [&_th]:px-3 [&_th]:py-2 [&_th]:bg-gray-50 [&_th]:text-left [&_th]:font-semibold
                [&_td]:border [&_td]:border-gray-200 [&_td]:px-3 [&_td]:py-2
                [&_iframe]:max-w-full [&_iframe]:my-6
                [&_hr]:my-8 [&_hr]:border-gray-200
            "
        >
            {!! $content !!}
        </div>
    @else
        <p class="text-gray-400 text-center py-8">Content coming soon.</p>
    @endif
</div>
