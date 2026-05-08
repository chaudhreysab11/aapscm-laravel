<x-layouts.member-portal
    title="Membership Profile"
    subtitle="Membership"
>
    <x-slot:sidebar>
        <x-member.sidebar :member="$member" :active="$activeSection" />
    </x-slot:sidebar>

    <div class="space-y-8">
        <x-member.section-card
            eyebrow="Membership"
            title="Membership Profile"
            description="Current membership record"
            icon="membership"
        >
            @if ($membership)
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Tier</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950">{{ $membership->tier?->name ?? 'Membership' }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Status</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950">{{ \Illuminate\Support\Str::headline($membership->status) }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Billing Cycle</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950">{{ \Illuminate\Support\Str::headline((string) $membership->billing_cycle) }}</p>
                    </div>
                    <div class="rounded-2xl bg-slate-50 p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Expires</p>
                        <p class="mt-3 text-[20px] font-semibold text-slate-950">{{ $membership->expires_at?->format('M d, Y') ?? 'Not set' }}</p>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <x-ui.meta-row icon="calendar" label="Member Since" :value="$memberSince ? \Illuminate\Support\Carbon::parse($memberSince)->format('M d, Y') : 'Not available'" class="rounded-2xl border border-slate-200 bg-white p-5" />
                    <div class="rounded-2xl border border-slate-200 bg-white p-5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400">Renewal</p>
                        <div class="mt-3">
                            <x-ui.status-pill :label="$membership->expires_at && $membership->expires_at->isFuture() ? 'In good standing' : 'Needs review'" :tone="$membership->expires_at && $membership->expires_at->isFuture() ? 'success' : 'warning'" />
                        </div>
                    </div>
                </div>
            @else
                <x-member.empty-state
                    title="No membership profile attached"
                    message="No active or migrated membership record is attached yet."
                    icon="membership"
                />
            @endif
        </x-member.section-card>
    </div>
</x-layouts.member-portal>
