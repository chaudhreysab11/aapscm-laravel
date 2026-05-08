@php
    $fieldClass = 'mt-2 h-12 w-full rounded-2xl border border-slate-200 bg-white px-4 text-[15px] text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b2f5e] focus:outline-none focus:ring-4 focus:ring-[#0b2f5e]/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-500';
@endphp

<section>
    <header>
        <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Security</p>
        <h2 class="mt-2 text-[28px] font-semibold leading-tight text-slate-950 dark:text-slate-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-[15px] leading-7 text-slate-600 dark:text-slate-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="{{ $fieldClass }}" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-[13px] text-rose-700" />
        </div>

        <div>
            <label for="update_password_password" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">New Password</label>
            <input id="update_password_password" name="password" type="password" class="{{ $fieldClass }}" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-[13px] text-rose-700" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="{{ $fieldClass }}" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-[13px] text-rose-700" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">Update Password</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-slate-600 dark:text-slate-300"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
