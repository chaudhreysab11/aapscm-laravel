@props([
    'title',
    'message',
    'icon' => 'document',
    'actionLabel' => null,
    'actionHref' => null,
])

<div {{ $attributes->merge(['class' => 'rounded-[24px] border border-dashed border-slate-300 bg-slate-50 p-5']) }}>
    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white text-slate-600 shadow-sm">
        <x-ui.icon :name="$icon" class="h-5 w-5" />
    </span>
    <h3 class="mt-4 text-[18px] font-semibold text-slate-950">{{ $title }}</h3>
    <p class="mt-2 max-w-[42ch] text-[13px] leading-6 text-slate-500">{{ $message }}</p>

    @if ($actionLabel && $actionHref)
        <a href="{{ $actionHref }}" class="mt-5 inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-4 py-2 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100">
            {{ $actionLabel }}
        </a>
    @endif
</div>
