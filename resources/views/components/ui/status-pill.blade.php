@props([
    'icon' => 'check-circle',
    'label',
    'tone' => 'neutral',
])

@php
    $tones = [
        'neutral' => 'border-slate-200 bg-slate-100 text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200',
        'slate' => 'border-slate-200 bg-slate-100 text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200',
        'success' => 'border-emerald-200 bg-emerald-100 text-emerald-700 dark:border-emerald-900/50 dark:bg-emerald-950/40 dark:text-emerald-200',
        'emerald' => 'border-emerald-200 bg-emerald-100 text-emerald-700 dark:border-emerald-900/50 dark:bg-emerald-950/40 dark:text-emerald-200',
        'warning' => 'border-amber-200 bg-amber-100 text-amber-700 dark:border-amber-900/50 dark:bg-amber-950/40 dark:text-amber-200',
        'amber' => 'border-amber-200 bg-amber-100 text-amber-700 dark:border-amber-900/50 dark:bg-amber-950/40 dark:text-amber-200',
        'danger' => 'border-rose-200 bg-rose-100 text-rose-700 dark:border-rose-900/50 dark:bg-rose-950/40 dark:text-rose-200',
        'rose' => 'border-rose-200 bg-rose-100 text-rose-700 dark:border-rose-900/50 dark:bg-rose-950/40 dark:text-rose-200',
        'brand' => 'border-sky-200 bg-sky-100 text-sky-700 dark:border-sky-900/50 dark:bg-sky-950/40 dark:text-sky-200',
        'blue' => 'border-sky-200 bg-sky-100 text-sky-700 dark:border-sky-900/50 dark:bg-sky-950/40 dark:text-sky-200',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 rounded-full border px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.14em] ' . ($tones[$tone] ?? $tones['neutral'])]) }}>
    <x-ui.icon :name="$icon" class="h-3.5 w-3.5" />
    <span>{{ $label }}</span>
</span>
