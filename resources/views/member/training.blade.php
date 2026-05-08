<x-layouts.member-portal
    title="Enrolled Courses / Training"
    subtitle="Training"
>
    <x-slot:sidebar>
        <x-member.sidebar :member="$member" :active="$activeSection" />
    </x-slot:sidebar>

    <div class="space-y-8">
        <x-member.section-card
            eyebrow="Learning"
            title="Enrolled Courses / Training"
            description="Your current training records"
            icon="training"
        >
            @if ($enrollments->isNotEmpty() || $trainingPurchases->isNotEmpty())
                <div class="overflow-hidden rounded-3xl border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-[14px]">
                        <thead class="bg-slate-50 text-slate-500">
                            <tr>
                                <th class="px-4 py-3 font-semibold">Course</th>
                                <th class="px-4 py-3 font-semibold">Delivery</th>
                                <th class="px-4 py-3 font-semibold">Status</th>
                                <th class="px-4 py-3 font-semibold">Enrolled</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                            @foreach ($enrollments as $enrollment)
                                <tr>
                                    <td class="px-4 py-4 font-semibold text-slate-950">{{ $enrollment->course?->title ?? 'Course unavailable' }}</td>
                                    <td class="px-4 py-4">{{ \Illuminate\Support\Str::headline((string) ($enrollment->course?->delivery_format ?? 'n/a')) }}</td>
                                    <td class="px-4 py-4"><x-ui.status-pill :label="\Illuminate\Support\Str::headline((string) $enrollment->status)" :tone="in_array($enrollment->status, ['completed'], true) ? 'success' : 'brand'" /></td>
                                    <td class="px-4 py-4">{{ $enrollment->enrolled_at?->format('M d, Y') ?? 'N/A' }}</td>
                                </tr>
                            @endforeach

                            @foreach ($trainingPurchases as $purchase)
                                <tr>
                                    <td class="px-4 py-4">
                                        <p class="font-semibold text-slate-950">{{ $purchase['product_name'] }}</p>
                                        <p class="mt-1 text-[13px] text-slate-500">Order {{ $purchase['order_number'] }}</p>
                                    </td>
                                    <td class="px-4 py-4">{{ $purchase['delivery_label'] }}</td>
                                    <td class="px-4 py-4"><x-ui.status-pill :label="$purchase['status_label']" :tone="$purchase['status_tone']" /></td>
                                    <td class="px-4 py-4">{{ $purchase['purchased_at']?->format('M d, Y') ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <x-member.empty-state
                    title="No training records linked"
                    message="Training records will appear here once linked."
                    icon="training"
                />
            @endif
        </x-member.section-card>
    </div>
</x-layouts.member-portal>
