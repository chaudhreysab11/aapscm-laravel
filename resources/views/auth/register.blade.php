<x-layouts.auth-portal
    eyebrow="AAPSCM Registration"
    title="Create Account"
    compact
>
    @php
        $fieldClass = 'mt-2 h-12 w-full rounded-2xl border border-slate-200 bg-white px-4 text-[15px] text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b2f5e] focus:outline-none focus:ring-4 focus:ring-[#0b2f5e]/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-500';
    @endphp

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-6">
        @csrf

        @if (! empty($redirectTo ?? null))
            <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">
        @endif

        <div class="grid gap-5 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="name" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="{{ $fieldClass }}" placeholder="Your full name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-[12px] text-rose-700" />
            </div>

            <div class="md:col-span-2">
                <label for="email" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="{{ $fieldClass }}" placeholder="you@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-[12px] text-rose-700" />
            </div>

            <div class="md:col-span-2">
                <label for="password" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="{{ $fieldClass }}" placeholder="Create a password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-[12px] text-rose-700" />
            </div>

            <div class="md:col-span-2">
                <label for="password_confirmation" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="{{ $fieldClass }}" placeholder="Repeat your password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-[12px] text-rose-700" />
            </div>
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-[13px] text-slate-600 dark:text-slate-300">
                Already registered?
                <a href="{{ ! empty($redirectTo ?? null) ? route('login', ['redirect_to' => $redirectTo]) : route('login') }}" class="font-semibold text-[#0b2f5e] transition hover:text-[#174a86]">Return to login</a>
            </p>

            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                <x-ui.icon name="shield" class="h-4 w-4" />
                Create Account
            </button>
        </div>
    </form>
</x-layouts.auth-portal>
