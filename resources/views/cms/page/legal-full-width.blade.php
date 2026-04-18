<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    <main>
        @if (! empty($page->blocks))
            <x-cms.blocks-renderer :blocks="$page->blocks" />
        @else
            <x-cms.wp-prose :content="$page->content" maxWidth="max-w-[900px]" />
        @endif
    </main>

</x-layouts.cms>
