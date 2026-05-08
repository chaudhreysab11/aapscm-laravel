<x-layouts.member-portal
    title="Account Settings"
    subtitle="Account details, security, and lifecycle settings"
>
    <x-slot:sidebar>
        <x-member.sidebar :member="$user" active="profile" />
    </x-slot:sidebar>

    <div class="space-y-8">
        <div class="grid gap-4 xl:grid-cols-3">
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <x-ui.meta-row icon="user" label="Account Name" :value="$user->name" />
            </div>
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <x-ui.meta-row icon="mail" label="Email Status" :value="$user->hasVerifiedEmail() ? 'Verified' : 'Verification pending'" />
            </div>
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                <x-ui.meta-row icon="shield" label="Member Profile" value="Account Settings" />
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
            <div class="space-y-6">
                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm md:p-8 dark:border-slate-800 dark:bg-slate-900">
                    <div class="mb-6 flex items-center gap-3 border-b border-slate-200 pb-4 dark:border-slate-800">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-[#edf3fb] text-[#0b2f5e] dark:bg-slate-800 dark:text-slate-100">
                            <x-ui.icon name="profile" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Profile</p>
                            <p class="text-[18px] font-semibold text-slate-950 dark:text-slate-100">Contact information</p>
                        </div>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm md:p-8 dark:border-slate-800 dark:bg-slate-900">
                    <div class="mb-6 flex items-center gap-3 border-b border-slate-200 pb-4 dark:border-slate-800">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-[#edf3fb] text-[#0b2f5e] dark:bg-slate-800 dark:text-slate-100">
                            <x-ui.icon name="lock" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Security</p>
                            <p class="text-[18px] font-semibold text-slate-950 dark:text-slate-100">Update password</p>
                        </div>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="rounded-[28px] border border-rose-200 bg-rose-50/80 p-6 shadow-sm md:p-8 dark:border-rose-900/40 dark:bg-rose-950/20">
                <div class="mb-6 flex items-center gap-3 border-b border-rose-200 pb-4 dark:border-rose-900/40">
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white text-rose-700 dark:bg-rose-950/50 dark:text-rose-200">
                        <x-ui.icon name="warning" class="h-5 w-5" />
                    </span>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-rose-500">Account Lifecycle</p>
                        <p class="text-[18px] font-semibold text-rose-950 dark:text-rose-100">Delete account</p>
                    </div>
                </div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-layouts.member-portal>
