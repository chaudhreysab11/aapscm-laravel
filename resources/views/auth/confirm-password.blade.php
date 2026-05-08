<x-layouts.auth-portal
    eyebrow="AAPSCM® Secure Access"
    title="Confirm Password"
    compact
>
    @php
        $fieldClass = 'mt-2 h-12 w-full rounded-2xl border border-slate-200 bg-white px-4 text-[15px] text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b2f5e] focus:outline-none focus:ring-4 focus:ring-[#0b2f5e]/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-500';
    @endphp

    <form method="POST" action="{{ route('password.confirm') }}" class="mt-8 space-y-6">
        @csrf

        <div>
            <label for="password" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="{{ $fieldClass }}" placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[13px] text-rose-700" />
        </div>

        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                <x-ui.icon name="shield" class="h-4 w-4" />
                Confirm
            </button>
        </div>
    </form>
</x-layouts.auth-portal>
