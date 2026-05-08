@props([
    'icon' => 'document',
    'label',
    'value',
])

<div {{ $attributes->merge(['class' => 'flex items-start gap-3']) }}>
    <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-200">
        <x-ui.icon :name="$icon" class="h-4.5 w-4.5" />
    </span>
    <div class="min-w-0">
        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">{{ $label }}</p>
        <p class="mt-1 text-[15px] font-semibold text-slate-900 dark:text-slate-100">{{ $value }}</p>
    </div>
</div>
