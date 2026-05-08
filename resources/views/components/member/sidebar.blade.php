@props([
    'member',
    'active' => 'overview',
])

@php
    $items = [
        ['key' => 'overview', 'label' => 'Dashboard Home', 'icon' => 'shield', 'route' => route('dashboard')],
        ['key' => 'membership', 'label' => 'Membership Profile', 'icon' => 'badge', 'route' => route('member.membership')],
        ['key' => 'orders', 'label' => 'Orders', 'icon' => 'receipt', 'route' => route('member.orders')],
        ['key' => 'profile', 'label' => 'Profile', 'icon' => 'user', 'route' => route('member.profile')],
        ['key' => 'training', 'label' => 'Training', 'icon' => 'academic-cap', 'route' => route('member.training')],
    ];
@endphp

<div class="space-y-5 lg:sticky lg:top-6">
    <div class="rounded-[26px] border border-slate-200 bg-white p-5 shadow-sm">
        <div class="flex items-start gap-3">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-[#edf3fb] text-[#0b2f5e]">
                <x-ui.icon name="profile" class="h-5 w-5" />
            </span>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Signed In</p>
                <p class="mt-2 truncate text-[20px] font-semibold text-slate-950">{{ $member->name }}</p>
                <p class="mt-1 truncate text-[13px] text-slate-500">{{ $member->email }}</p>
            </div>
        </div>

        <div class="mt-4 flex flex-wrap gap-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-500">
            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2">
                <x-ui.icon name="shield" class="h-3.5 w-3.5 text-[#0b2f5e]" />
                Secure
            </span>
            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2">
                <x-ui.icon name="membership" class="h-3.5 w-3.5 text-[#0b2f5e]" />
                Portal
            </span>
        </div>
    </div>

    <nav class="rounded-[26px] border border-slate-200 bg-white p-4 shadow-sm">
        <p class="px-3 pb-3 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Navigation</p>
        <div class="space-y-1.5 text-[14px] font-semibold text-slate-700">
            @foreach ($items as $item)
                @php
                    $isActive = $active === $item['key'];
                @endphp

                <a
                    href="{{ $item['route'] }}"
                    @class([
                        'flex items-center gap-3 rounded-2xl px-3 py-3 transition',
                        'bg-[#0b2f5e] text-white shadow-sm hover:bg-[#174a86]' => $isActive,
                        'border border-transparent hover:border-slate-200 hover:bg-slate-50' => ! $isActive,
                    ])
                >
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl {{ $isActive ? 'bg-white/15 text-white' : 'bg-slate-100 text-slate-600' }}">
                        <x-ui.icon :name="$item['icon']" class="h-4.5 w-4.5" />
                    </span>
                    {{ $item['label'] }}
                </a>
            @endforeach

            <form method="POST" action="{{ route('logout') }}" class="pt-1">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 rounded-2xl border border-transparent px-3 py-3 text-left font-semibold text-rose-700 transition hover:border-rose-100 hover:bg-rose-50">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-rose-100 text-rose-700">
                        <x-ui.icon name="logout" class="h-4.5 w-4.5" />
                    </span>
                    Logout
                </button>
            </form>
        </div>
    </nav>
</div>
