<x-layouts.member-portal
    title="Orders"
    subtitle="Orders"
>
    <x-slot:sidebar>
        <x-member.sidebar :member="$member" :active="$activeSection" />
    </x-slot:sidebar>

    <div class="space-y-8">
        <x-member.section-card
            eyebrow="Commerce"
            title="Orders"
            description="Your attached order history"
            icon="receipt"
        >
            @if ($orders->isNotEmpty())
                <div class="overflow-hidden rounded-3xl border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-[14px]">
                        <thead class="bg-slate-50 text-slate-500">
                            <tr>
                                <th class="px-4 py-3 font-semibold">Order</th>
                                <th class="px-4 py-3 font-semibold">Placed</th>
                                <th class="px-4 py-3 font-semibold">Payment</th>
                                <th class="px-4 py-3 font-semibold">Total</th>
                                <th class="px-4 py-3 font-semibold">Access</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="px-4 py-4 font-semibold text-slate-950">{{ $order->order_number }}</td>
                                    <td class="px-4 py-4">{{ $order->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                                    <td class="px-4 py-4">
                                        <x-ui.status-pill :label="\Illuminate\Support\Str::headline((string) $order->payment_status)" :tone="match ($order->payment_status) { 'paid' => 'success', 'refunded' => 'neutral', 'failed', 'cancelled' => 'danger', default => 'warning' }" />
                                    </td>
                                    <td class="px-4 py-4">{{ $order->currency }} {{ number_format((float) $order->total, 2) }}</td>
                                    <td class="px-4 py-4">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="{{ route('order.receipt', ['order' => $order->id]) }}" class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-3 py-1.5 text-[12px] font-semibold text-slate-700 transition hover:bg-slate-200"><x-ui.icon name="receipt" class="h-3.5 w-3.5" />Receipt</a>
                                            @if ($order->payment_status === 'paid' && $order->status === 'completed')
                                                <a href="{{ route('order.invoice', ['order' => $order->id]) }}" class="inline-flex items-center gap-2 rounded-full bg-[#0b2f5e] px-3 py-1.5 text-[12px] font-semibold text-white transition hover:bg-[#174a86]"><x-ui.icon name="invoice" class="h-3.5 w-3.5" />Invoice</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <x-member.empty-state
                    title="No orders have been recorded"
                    message="Order history will appear here once linked to your account."
                    icon="receipt"
                />
            @endif
        </x-member.section-card>
    </div>
</x-layouts.member-portal>
