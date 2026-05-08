<x-layouts.member-portal
    title="Profile"
    subtitle="Profile"
>
    <x-slot:sidebar>
        <x-member.sidebar :member="$member" :active="$activeSection" />
    </x-slot:sidebar>

    <div class="space-y-8">
        <x-member.section-card
            eyebrow="Account"
            title="Profile"
            description="Identity and contact"
            icon="profile"
        >
            <x-slot:actions>
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 px-4 py-2 text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100"><x-ui.icon name="profile" class="h-4 w-4" />Manage Profile</a>
            </x-slot:actions>

            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Account Name</p>
                    <p class="mt-3 text-[18px] font-semibold text-slate-950">{{ $member->name }}</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Email Verification</p>
                    <p class="mt-3 text-[18px] font-semibold text-slate-950">{{ $member->hasVerifiedEmail() ? 'Verified' : 'Pending verification' }}</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Account Status</p>
                    <p class="mt-3 text-[18px] font-semibold text-slate-950">{{ $member->is_active ? 'Active' : 'Inactive' }}</p>
                </div>
            </div>

            @if ($profileItems !== [])
                <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($profileItems as $label => $value)
                        <div class="rounded-2xl border border-slate-200 bg-white p-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">{{ $label }}</p>
                            <p class="mt-3 text-[18px] font-semibold text-slate-950">{{ $value }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-6">
                    <x-member.empty-state
                        title="Minimal profile details on file"
                        message="Add more profile details from account settings."
                        actionLabel="Manage Profile"
                        :actionHref="route('profile.edit')"
                        icon="profile"
                    />
                </div>
            @endif
        </x-member.section-card>
    </div>
</x-layouts.member-portal>
