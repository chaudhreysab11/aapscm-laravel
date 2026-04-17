{{--
    Block: Custom HTML
    Renders raw HTML as entered by the admin. Use this for embeds, iframes,
    or complex layouts that don't fit the standard blocks.
--}}
@php
    $content = $data['content'] ?? '';
@endphp

@if($content)
    <div class="cms-html-block py-8">
        {!! $content !!}
    </div>
@endif
