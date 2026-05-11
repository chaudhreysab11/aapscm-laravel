@props([
    'title',
    'breadcrumbs' => [],
    'height' => 240,
    'titleTag' => 'h2',
    'backgroundColor' => '#14166e',
    'backgroundImage' => null,
    'titleImageSrc' => null,
])

@php
    $holderClasses = 'eltdf-title-holder eltdf-standard-with-breadcrumbs-type eltdf-title-va-header-bottom flex items-center';
    if ($backgroundImage || $titleImageSrc) {
        $holderClasses .= ' eltdf-has-bg-image';
    }

    $resolvedTitleImage = $titleImageSrc ?? $backgroundImage;

    $holderStyle = collect([
        "background-color: {$backgroundColor}",
        $backgroundImage ? "background-image: url('{$backgroundImage}')" : null,
        $backgroundImage ? 'background-position: 50% 0' : null,
        $backgroundImage ? 'background-repeat: no-repeat' : null,
    ])->filter()->implode('; ');
@endphp

<div class="{{ $holderClasses }}" style="{{ $holderStyle }};">
    @if ($resolvedTitleImage)
        <div class="eltdf-title-image">
            <img itemprop="image" src="{{ $resolvedTitleImage }}" alt="{{ $title }}">
        </div>
    @endif

    <div class="eltdf-title-wrapper flex items-center" style="height: {{ $height }}px;">
        <div class="eltdf-title-inner">
            <div class="eltdf-grid" style="max-width: 1300px; margin: 0 auto; padding: 0 16px;">
                <div class="eltdf-title-info">
                    @if ($titleTag === 'h1')
                        <h1 class="eltdf-page-title entry-title" style="color: #fff; font-size: 45px; line-height: 1.2; font-weight: 700; margin: 0 0 8px; text-align: left;">
                            {{ $title }}
                        </h1>
                    @else
                        <h2 class="eltdf-page-title entry-title" style="color: #fff; font-size: 45px; line-height: 1.2; font-weight: 700; margin: 0 0 8px; text-align: left;">
                            {{ $title }}
                        </h2>
                    @endif

                    @if (! empty($breadcrumbs))
                        <div class="eltdf-breadcrumbs-info">
                            <div itemprop="breadcrumb" class="eltdf-breadcrumbs" style="color: rgba(255, 255, 255, 0.82); font-size: 13px; line-height: 1.6; text-align: left;">
                                <a itemprop="url" href="{{ url('/') }}" style="color: inherit; text-decoration: none;">Home</a>
                                @foreach ($breadcrumbs as $crumb)
                                    <span class="eltdf-delimiter">&nbsp; / &nbsp;</span>
                                    @if (! empty($crumb['url']) && ! $loop->last)
                                        <a itemprop="url" href="{{ $crumb['url'] }}" style="color: inherit; text-decoration: none;">{{ $crumb['label'] }}</a>
                                    @else
                                        <span class="eltdf-current" style="color: #fff;">{{ $crumb['label'] }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
