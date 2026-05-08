@props([
    'title',
    'eyebrow' => null,
    'icon' => null,
    'description' => null,
])

<section {{ $attributes->merge(['class' => 'rounded-[26px] border border-slate-200 bg-white p-5 shadow-sm md:p-6']) }}>
    <div class="flex flex-col gap-4 border-b border-slate-200 pb-4 md:flex-row md:items-end md:justify-between">
        <div>
            @if ($eyebrow)
                <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">{{ $eyebrow }}</p>
            @endif
            <div class="mt-2 flex items-center gap-3">
                @if ($icon)
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-100 text-slate-600">
                        <x-ui.icon :name="$icon" class="h-5 w-5" />
                    </span>
                @endif
                <h2 class="text-[22px] font-semibold leading-tight text-slate-950">{{ $title }}</h2>
            </div>
            @if ($description)
                <p class="mt-2 text-[12px] font-medium uppercase tracking-[0.14em] text-slate-400">{{ $description }}</p>
            @endif
        </div>

        @isset($actions)
            <div>{{ $actions }}</div>
        @endisset
    </div>

    <div class="mt-5">
        {{ $slot }}
    </div>
</section>
