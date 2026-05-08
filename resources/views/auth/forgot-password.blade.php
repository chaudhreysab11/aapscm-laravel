<x-layouts.auth-portal
    :eyebrow="$firstLogin ? 'AAPSCM® First-Time Access' : 'AAPSCM® Account Recovery'"
    :title="$firstLogin ? 'Set Your Password' : 'Forgot Password'"
    compact
>
    @php
        $fieldClass = 'mt-2 h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-[15px] text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b2f5e] focus:bg-white focus:outline-none focus:ring-4 focus:ring-[#0b2f5e]/10';
    @endphp

    <div class="flex items-center justify-between gap-3">
        <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
            <x-ui.icon :name="$firstLogin ? 'shield' : 'mail'" class="h-3.5 w-3.5 text-[#0b2f5e]" />
            {{ $firstLogin ? 'Setup link' : 'Reset link' }}
        </div>
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-[12px] font-semibold uppercase tracking-[0.16em] text-slate-500 transition hover:text-[#0b2f5e]">
            <x-ui.icon name="lock" class="h-3.5 w-3.5" />
            Login
        </a>
    </div>

    <x-auth-session-status class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-[14px] text-emerald-800" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-6">
        @csrf

        @if ($firstLogin)
            <input type="hidden" name="first_login" value="1">
        @endif

        @if (! empty($redirectTo ?? null))
            <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
        @endif

        <div>
            <label for="email" class="text-[13px] font-semibold uppercase tracking-[0.18em] text-slate-500">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $email ?? '') }}" required autofocus class="{{ $fieldClass }}" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[13px] text-rose-700" />
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                <x-ui.icon name="shield" class="h-3.5 w-3.5 text-[#0b2f5e]" />
                {{ $firstLogin ? 'Secure access' : 'Email delivery' }}
            </div>

            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                <x-ui.icon name="mail" class="h-4 w-4" />
                {{ $firstLogin ? 'Send Setup Link' : 'Send Reset Link' }}
            </button>
        </div>
    </form>
</x-layouts.auth-portal>
