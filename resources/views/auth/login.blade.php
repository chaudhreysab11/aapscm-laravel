<x-layouts.auth-portal
    eyebrow="AAPSCM® Member Portal"
    title="Member Login"
    compact
>
    @php
        $step = $step ?? 'email';
        $isPasswordStep = $step === 'password';
        $resolvedEmail = $email ?? old('email');
        $emailStepErrors = array_merge($errors->get('email'), $errors->get('login_email'));
        $fieldClass = 'mt-2 h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-[15px] text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b2f5e] focus:bg-white focus:outline-none focus:ring-4 focus:ring-[#0b2f5e]/10';
    @endphp

    <div class="flex items-center justify-between gap-3">
        <div class="inline-flex items-center py-2 text-[14px] font-bold uppercase tracking-[0.18em] text-slate-500">
            {{ $isPasswordStep ? 'Enter your password to continue' : 'Enter your email address to continue' }}
        </div>
        {{-- @if ($isPasswordStep && Route::has('password.request'))
            <a href="{{ route('password.request', array_filter(['email' => $resolvedEmail, 'redirect_to' => $redirectTo ?? null])) }}" class="inline-flex items-center gap-2 text-[12px] font-semibold uppercase tracking-[0.16em] text-slate-500 transition hover:text-[#0b2f5e]">
                <x-ui.icon name="shield" class="h-3.5 w-3.5" />
                Reset
            </a>
        @endif --}}
    </div>

    <x-auth-session-status class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-[14px] text-emerald-800" :status="session('status')" />

    @if ($isPasswordStep)
        <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 text-slate-900">
            <div class="flex items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Account</p>
                    <p class="mt-1 truncate text-[17px] font-semibold">{{ $resolvedEmail }}</p>
                </div>
                <a href="{{ route('login', array_filter(['redirect_to' => $redirectTo ?? null])) }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-2 text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-600 transition hover:border-[#0b2f5e]/20 hover:text-[#0b2f5e]">
                    <x-ui.icon name="profile" class="h-3.5 w-3.5" />
                    Change
                </a>
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-3 text-[13px] text-rose-700" />
        </div>
    @endif

    <form method="POST" action="{{ $isPasswordStep ? route('login') : route('login.email') }}" class="mt-8 space-y-6">
        @csrf

        @if (! empty($redirectTo ?? null))
            <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
        @endif

        @if (! $isPasswordStep)
            <div>
                <label for="email" class="text-[13px] font-semibold uppercase tracking-[0.18em] text-slate-500">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $resolvedEmail) }}" required autofocus autocomplete="username" class="{{ $fieldClass }}" placeholder="you@example.com" />
                <x-input-error :messages="$emailStepErrors" class="mt-2 text-[13px] text-rose-700" />
            </div>
        @else
            <input type="hidden" name="email" value="{{ $resolvedEmail }}">

            <div>
                <label for="password" class="text-[13px] font-semibold uppercase tracking-[0.18em] text-slate-500">Password</label>
                <input id="password" type="password" name="password" required autofocus autocomplete="current-password" class="{{ $fieldClass }}" placeholder="Enter your password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-[13px] text-rose-700" />
            </div>
        @endif

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            @if ($isPasswordStep)
                <label for="remember_me" class="inline-flex items-center gap-3 text-[13px] font-medium text-slate-600">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-[#0b2f5e] focus:ring-[#0b2f5e]" />
                    <span>Stay signed in</span>
                </label>
            @else
            @endif
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ ! empty($redirectTo ?? null) ? route('register', ['redirect_to' => $redirectTo]) : route('register') }}" class="inline-flex items-center gap-2 text-[12px] font-semibold uppercase tracking-[0.16em] text-slate-500 transition hover:text-[#0b2f5e]">
                <x-ui.icon name="profile" class="h-3.5 w-3.5" />
                Create account
            </a>

            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                <x-ui.icon :name="$isPasswordStep ? 'lock' : 'mail'" class="h-4 w-4" />
                {{ $isPasswordStep ? 'Log In' : 'Continue' }}
            </button>
        </div>
    </form>
</x-layouts.auth-portal>
