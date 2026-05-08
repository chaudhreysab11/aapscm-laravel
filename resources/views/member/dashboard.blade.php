<x-layouts.member-portal
    title="Member Dashboard"
    subtitle="Overview"
>
    <x-slot:sidebar>
        <x-member.sidebar :member="$member" :active="$activeSection" />
    </x-slot:sidebar>

    <div class="space-y-6">
        <div class="grid gap-4 xl:grid-cols-[minmax(0,1.2fr)_minmax(0,0.8fr)]">
            <section class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm md:p-7">
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-[#edf3fb] text-[#0b2f5e]">
                        <x-ui.icon name="shield" class="h-5 w-5" />
                    </span>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">Dashboard Home</p>
                        <h2 class="mt-1 text-[28px] font-semibold leading-tight text-slate-950">Account Overview</h2>
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap gap-2">
                    <x-ui.status-pill label="Secure" tone="brand" />
                    <x-ui.status-pill label="Member Only" tone="neutral" />
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2 2xl:grid-cols-4">
                    <x-member.stat-card label="Membership" :value="$stats['membership_label']" icon="membership" detail="Latest" />
                    <x-member.stat-card label="Orders" :value="$stats['orders_count']" icon="receipt" detail="Count" />
                    <x-member.stat-card label="Paid Total" :value="'USD ' . $stats['paid_total']" icon="card" detail="Settled" />
                    <x-member.stat-card label="Training" :value="$stats['enrollment_count']" icon="training" detail="Active" />
                </div>
            </section>

            <section class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm md:p-7">
                <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">Quick Actions</p>
                <div class="mt-4 grid gap-3 sm:grid-cols-2 xl:grid-cols-1">
                    <a href="{{ route('member.profile') }}" class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 transition hover:border-[#0b2f5e]/20 hover:bg-white">
                        <span class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-white text-[#0b2f5e] shadow-sm">
                                <x-ui.icon name="profile" class="h-4 w-4" />
                            </span>
                            <span>
                                <span class="block text-[14px] font-semibold text-slate-900">Profile</span>
                                <span class="block text-[12px] text-slate-500">Update details</span>
                            </span>
                        </span>
                        <x-ui.icon name="check-circle" class="h-4 w-4 text-slate-300" />
                    </a>

                    <a href="{{ route('member.orders') }}" class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 transition hover:border-[#0b2f5e]/20 hover:bg-white">
                        <span class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-white text-[#0b2f5e] shadow-sm">
                                <x-ui.icon name="receipt" class="h-4 w-4" />
                            </span>
                            <span>
                                <span class="block text-[14px] font-semibold text-slate-900">Orders</span>
                                <span class="block text-[12px] text-slate-500">Billing history</span>
                            </span>
                        </span>
                        <x-ui.icon name="check-circle" class="h-4 w-4 text-slate-300" />
                    </a>

                    <a href="{{ route('member.training') }}" class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 transition hover:border-[#0b2f5e]/20 hover:bg-white">
                        <span class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-white text-[#0b2f5e] shadow-sm">
                                <x-ui.icon name="training" class="h-4 w-4" />
                            </span>
                            <span>
                                <span class="block text-[14px] font-semibold text-slate-900">Training</span>
                                <span class="block text-[12px] text-slate-500">Courses and access</span>
                            </span>
                        </span>
                        <x-ui.icon name="check-circle" class="h-4 w-4 text-slate-300" />
                    </a>
                </div>
            </section>
        </div>

        <div class="grid gap-4 xl:grid-cols-2">
            <x-member.section-card
                eyebrow="Member Access"
                title="Membership Profile"
                description="Tier and term"
                icon="membership"
            >
                @if ($membership)
                    <div class="grid gap-3 md:grid-cols-2">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">Tier</p>
                            <p class="mt-3 text-[18px] font-semibold text-slate-950">{{ $membership->tier?->name ?? 'Membership' }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">Expires</p>
                            <p class="mt-3 text-[18px] font-semibold text-slate-950">{{ $membership->expires_at?->format('M d, Y') ?? 'Not set' }}</p>
                        </div>
                    </div>

                    <a href="{{ route('member.membership') }}" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100"><x-ui.icon name="membership" class="h-3.5 w-3.5" />Open Membership Profile</a>
                @else
                    <x-member.empty-state
                        title="No membership profile attached"
                        message="Membership records appear here."
                        icon="membership"
                    />
                @endif
            </x-member.section-card>

            <x-member.section-card
                eyebrow="Account"
                title="Profile"
                description="Identity and contact"
                icon="profile"
            >
                @if ($profileItems !== [])
                    <div class="grid gap-3 md:grid-cols-2">
                        @foreach (array_slice($profileItems, 0, 4, true) as $label => $value)
                            <div class="min-w-0 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">{{ $label }}</p>
                                <p class="mt-3 overflow-hidden text-[16px] font-semibold text-slate-950 [overflow-wrap:anywhere] break-words">{{ $value }}</p>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('member.profile') }}" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100"><x-ui.icon name="profile" class="h-3.5 w-3.5" />Open Profile Section</a>
                @else
                    <x-member.empty-state
                        title="Your profile is still minimal"
                        message="Add contact details."
                        actionLabel="Manage Profile"
                        :actionHref="route('member.profile')"
                        icon="profile"
                    />
                @endif
            </x-member.section-card>
        </div>

        <div class="grid gap-4 xl:grid-cols-2">
            <x-member.section-card
                eyebrow="Commerce"
                title="Recent Orders"
                description="Latest billing activity"
                icon="receipt"
            >
                @if ($recentOrders->isNotEmpty())
                    <div class="overflow-hidden rounded-[22px] border border-slate-200">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-[13px]">
                            <thead class="bg-slate-50 text-slate-500">
                                <tr>
                                    <th class="px-4 py-3 font-semibold uppercase tracking-[0.14em]">Order</th>
                                    <th class="px-4 py-3 font-semibold uppercase tracking-[0.14em]">Placed</th>
                                    <th class="px-4 py-3 font-semibold uppercase tracking-[0.14em]">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                                @foreach ($recentOrders as $order)
                                    <tr>
                                        <td class="px-4 py-4 font-semibold text-slate-950">{{ $order->order_number }}</td>
                                        <td class="px-4 py-4">{{ $order->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                                        <td class="px-4 py-4">{{ $order->currency }} {{ number_format((float) $order->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="{{ route('member.orders') }}" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100"><x-ui.icon name="receipt" class="h-3.5 w-3.5" />View All Orders</a>
                @else
                    <x-member.empty-state
                        title="No orders recorded"
                        message="Orders appear here."
                        icon="receipt"
                    />
                @endif
            </x-member.section-card>

            <x-member.section-card
                eyebrow="Learning"
                title="Enrolled Courses / Training"
                description="Current records"
                icon="training"
            >
                @if ($recentEnrollments->isNotEmpty() || $recentTrainingPurchases->isNotEmpty())
                    <div class="space-y-3">
                        @foreach ($recentEnrollments as $enrollment)
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="text-[16px] font-semibold text-slate-950">{{ $enrollment->course?->title ?? 'Course unavailable' }}</p>
                                        <p class="mt-1 text-[13px] text-slate-500">{{ \Illuminate\Support\Str::headline((string) $enrollment->status) }} · {{ \Illuminate\Support\Str::headline((string) ($enrollment->course?->delivery_format ?? 'n/a')) }}</p>
                                    </div>
                                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-white text-[#0b2f5e] shadow-sm">
                                        <x-ui.icon name="training" class="h-4 w-4" />
                                    </span>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($recentTrainingPurchases as $purchase)
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4">
                                <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                                    <div>
                                        <p class="text-[16px] font-semibold text-slate-950">{{ $purchase['product_name'] }}</p>
                                        <p class="mt-1 text-[13px] text-slate-500">{{ $purchase['delivery_label'] }} · Order {{ $purchase['order_number'] }}</p>
                                    </div>
                                    <x-ui.status-pill :label="$purchase['status_label']" :tone="$purchase['status_tone']" />
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('member.training') }}" class="mt-4 inline-flex items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100"><x-ui.icon name="training" class="h-3.5 w-3.5" />View Training Records</a>
                @else
                    <x-member.empty-state
                        title="No training records attached"
                        message="Training records appear here."
                        icon="training"
                    />
                @endif
            </x-member.section-card>
        </div>
    </div>
</x-layouts.member-portal>
