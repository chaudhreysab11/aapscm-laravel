@props([
    'label',
    'value',
    'icon' => 'document',
    'detail' => null,
])

@php
    $valueText = trim((string) $value);
    $isLongValue = strlen($valueText) > 16;
@endphp

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-[24px] border border-slate-200 bg-white p-4 shadow-sm']) }}>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">{{ $label }}</p>
            @if ($detail)
                <p class="mt-2 text-[12px] font-medium text-slate-500">{{ $detail }}</p>
            @endif
        </div>
        <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">
            <x-ui.icon :name="$icon" class="h-4.5 w-4.5" />
        </span>
    </div>
    <p @class([
        'mt-4 font-semibold text-slate-950',
        'text-[18px] leading-[1.35]' => $isLongValue,
        'text-[24px] leading-tight' => ! $isLongValue,
    ])>{{ $valueText }}</p>
</div>
