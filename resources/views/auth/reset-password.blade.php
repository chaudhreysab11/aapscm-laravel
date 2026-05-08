<x-layouts.auth-portal
    :eyebrow="$isFirstLogin ? 'AAPSCM® First-Time Access' : 'AAPSCM® Account Recovery'"
    :title="$isFirstLogin ? 'Set Your Password' : 'Reset Password'"
    compact
>
    @php
        $fieldClass = 'mt-2 h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-[15px] text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b2f5e] focus:bg-white focus:outline-none focus:ring-4 focus:ring-[#0b2f5e]/10';
    @endphp

    <div class="flex items-center justify-between gap-3">
        <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
            <x-ui.icon :name="$isFirstLogin ? 'shield' : 'lock'" class="h-3.5 w-3.5 text-[#0b2f5e]" />
            {!! $isFirstLogin ? 'First time access, please configure a strong password' : 'Please enter your new password' !!}
        </div>

        @if (! ($isDirectSetup ?? false))
            <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-500">
                <x-ui.icon name="mail" class="h-3.5 w-3.5 text-[#0b2f5e]" />
                Token verified
            </div>
        @endif
    </div>

    <form method="POST" action="{{ $formAction ?? route('password.store') }}" class="mt-8 space-y-6">
        @csrf

        @unless($isDirectSetup ?? false)
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
        @endunless

        @if (! empty($redirectTo ?? null))
            <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
        @endif

        <div>
            <label for="email" class="text-[13px] font-semibold uppercase tracking-[0.18em] text-slate-500">Email</label>

            @if ($isDirectSetup ?? false)
                <input type="hidden" name="email" value="{{ $email ?? '' }}">
                <input id="email" type="email" value="{{ $email ?? '' }}" readonly class="{{ $fieldClass }} bg-slate-50 text-slate-600" />
            @else
                <input id="email" type="email" name="email" value="{{ old('email', $email ?? $request->email) }}" required autofocus autocomplete="username" class="{{ $fieldClass }}" placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-[12px] text-rose-700" />
            @endif
        </div>

        <div>
            <label for="password" class="text-[13px] font-semibold uppercase tracking-[0.18em] text-slate-500">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="{{ $fieldClass }}" placeholder="Create a new password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[12px] text-rose-700" />
        </div>

        <div>
            <label for="password_confirmation" class="text-[13px] font-semibold uppercase tracking-[0.18em] text-slate-500">Confirm</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="{{ $fieldClass }}" placeholder="Repeat your password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-[12px] text-rose-700" />
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                <x-ui.icon name="check-circle" class="h-4 w-4" />
                {{ $isFirstLogin ? 'Set Password' : 'Reset Password' }}
            </button>
        </div>
    </form>
</x-layouts.auth-portal>
