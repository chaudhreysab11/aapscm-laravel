@php
    $fieldClass = 'mt-2 h-12 w-full rounded-2xl border border-slate-200 bg-white px-4 text-[15px] text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-[#0b2f5e] focus:outline-none focus:ring-4 focus:ring-[#0b2f5e]/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:placeholder:text-slate-500';
@endphp

<section>
    <header>
        <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Profile</p>
        <h2 class="mt-2 text-[28px] font-semibold leading-tight text-slate-950 dark:text-slate-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-[15px] leading-7 text-slate-600 dark:text-slate-300">
            {{ __("Update the core account details shown throughout your member portal.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-6">
        @csrf
        @method('patch')

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label for="name" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Full Name</label>
                <input id="name" name="name" type="text" class="{{ $fieldClass }}" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                <x-input-error class="mt-2 text-[13px] text-rose-700" :messages="$errors->get('name')" />
            </div>

            <div>
                <label for="email" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Email Address</label>
                <input id="email" name="email" type="email" class="{{ $fieldClass }}" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                <x-input-error class="mt-2 text-[13px] text-rose-700" :messages="$errors->get('email')" />
            </div>

            <div>
                <label for="phone" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Phone</label>
                <input id="phone" name="phone" type="text" class="{{ $fieldClass }}" value="{{ old('phone', $user->phone) }}" autocomplete="tel" />
                <x-input-error class="mt-2 text-[13px] text-rose-700" :messages="$errors->get('phone')" />
            </div>

            <div>
                <label for="job_title" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Job Title</label>
                <input id="job_title" name="job_title" type="text" class="{{ $fieldClass }}" value="{{ old('job_title', $user->job_title) }}" />
                <x-input-error class="mt-2 text-[13px] text-rose-700" :messages="$errors->get('job_title')" />
            </div>

            <div>
                <label for="company" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Organization</label>
                <input id="company" name="company" type="text" class="{{ $fieldClass }}" value="{{ old('company', $user->company) }}" />
                <x-input-error class="mt-2 text-[13px] text-rose-700" :messages="$errors->get('company')" />
            </div>

            <div>
                <label for="country" class="text-[13px] font-semibold uppercase tracking-[0.22em] text-slate-500">Country</label>
                <input id="country" name="country" type="text" class="{{ $fieldClass }}" value="{{ old('country', $user->country) }}" />
                <x-input-error class="mt-2 text-[13px] text-rose-700" :messages="$errors->get('country')" />
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="md:col-span-2 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-4 text-[14px] text-amber-900 dark:border-amber-900/40 dark:bg-amber-950/30 dark:text-amber-100">
                    <p>
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="ml-1 font-semibold underline underline-offset-4">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-emerald-700 dark:text-emerald-300">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-[#0b2f5e] px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">Save Changes</button>

            @if (session('status') === 'profile-updated')
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
