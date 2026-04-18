@props([
    'title',
    'breadcrumbs' => [],
])

{{--
    Theme title bar matching the WordPress Qode/Eltdf theme chrome:
      - 240px tall full-bleed band
      - #14166e background (exact match with live aapscm.org)
      - page title + breadcrumb trail, left-aligned inside a theme grid
--}}
<div
    class="w-full flex items-center"
    style="height: 240px; background-color: #14166e;"
>
    <div class="w-full max-w-[1100px] mx-auto px-4">
        <h1 class="text-white text-[30px] leading-tight font-normal mb-2">
            {{ $title }}
        </h1>

        @if (! empty($breadcrumbs))
            <nav aria-label="Breadcrumb" class="text-[13px] text-white/80">
                <a href="{{ url('/') }}" class="hover:text-white">Home</a>
                @foreach ($breadcrumbs as $crumb)
                    <span class="px-1 text-white/50">/</span>
                    @if (! empty($crumb['url']) && ! $loop->last)
                        <a href="{{ $crumb['url'] }}" class="hover:text-white">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-white">{{ $crumb['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        @endif
    </div>
</div>
