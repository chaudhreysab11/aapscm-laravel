<section class="space-y-6">
    <header>
        <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-rose-500">Danger Zone</p>
        <h2 class="mt-2 text-[28px] font-semibold leading-tight text-slate-950 dark:text-slate-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-[15px] leading-7 text-slate-700 dark:text-slate-300">
            {{ __('Deleting your account permanently removes your access record. Please confirm only if you are certain you want to close this member account.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center justify-center rounded-full bg-rose-700 px-6 py-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-rose-800"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 dark:bg-slate-900">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-slate-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-slate-300">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">{{ __('Password') }}</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 rounded-2xl border border-slate-200 bg-white px-4 py-3 text-[15px] text-slate-900 shadow-sm focus:border-rose-600 focus:outline-none focus:ring-4 focus:ring-rose-200 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-[13px] text-rose-700" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" x-on:click="$dispatch('close')" class="rounded-full border border-slate-200 px-4 py-2 text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-800">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="ms-3 rounded-full bg-rose-700 px-4 py-2 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-rose-800">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
