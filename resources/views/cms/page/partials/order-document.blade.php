@php
    $isReceipt = $documentType === 'receipt';
    $documentTitle = $isReceipt ? 'Order Receipt' : 'Invoice-Style Order Document';
    $documentBadge = $isReceipt ? 'Payment Confirmation' : 'Billing Document';
    $referenceLabel = $isReceipt ? 'Order Number' : 'Invoice Number';
    $dateLabel = $isReceipt ? 'Order Date' : 'Invoice Date';
    $secondaryMetaLabel = $isReceipt ? 'Payment Method' : 'Settlement';
    $secondaryMetaValue = $isReceipt
        ? \Illuminate\Support\Str::headline((string) $order->payment_method)
        : match ($order->payment_status) {
            'paid' => 'Paid in full',
            'refunded' => 'Refunded',
            'failed', 'cancelled' => 'Payment exception',
            default => 'Awaiting confirmation',
        };
    $summaryHeading = $isReceipt ? 'Receipt Summary' : 'Invoice Summary';
    $identityHeading = $isReceipt ? 'Buyer Details' : 'Bill To';
    $addressHeading = $isReceipt ? 'Billing Address' : 'Billing Address on File';
    $totalsHeading = $isReceipt ? 'Payment Summary' : 'Invoice Totals';
    $statusPanelHeading = $isReceipt ? 'Payment Record' : 'Invoice Administration';
    $statusClasses = match ($order->payment_status) {
        'paid' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
        'refunded' => 'bg-slate-100 text-slate-700 border-slate-200',
        'failed', 'cancelled' => 'bg-rose-100 text-rose-800 border-rose-200',
        default => 'bg-amber-100 text-amber-800 border-amber-200',
    };
    $lineMeta = static function ($item): ?string {
        if (! is_array($item->meta ?? null)) {
            return null;
        }

        $parts = [];

        if (is_string($item->meta['selected_option'] ?? null) && trim($item->meta['selected_option']) !== '') {
            $parts[] = 'Option: ' . trim($item->meta['selected_option']);
        }

        if (is_string($item->meta['billing_cycle'] ?? null) && trim($item->meta['billing_cycle']) !== '') {
            $parts[] = 'Cycle: ' . trim($item->meta['billing_cycle']);
        }

        return $parts === [] ? null : implode(' | ', $parts);
    };
@endphp

<x-layouts.cms>

    @push('title'){{ $documentTitle }} — @endpush

    <section class="relative overflow-hidden bg-[radial-gradient(circle_at_top_left,_#1f4d8a,_#0b2f5e_55%,_#071f40)] py-12 text-white">
        <div class="absolute inset-0 opacity-20 [background-image:linear-gradient(rgba(255,255,255,0.2)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.12)_1px,transparent_1px)] [background-size:32px_32px]"></div>
        <div class="relative mx-auto flex max-w-[1120px] flex-col gap-6 px-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-[12px] font-semibold uppercase tracking-[0.28em] text-[#f0b323]">{{ $documentBadge }}</p>
                <h1 class="mt-3 text-[28px] font-bold leading-tight md:text-[42px]">{{ $documentTitle }}</h1>
            </div>

            <div class="rounded-2xl border border-white/15 bg-white/10 p-5 backdrop-blur-sm lg:min-w-[320px]">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-[12px] uppercase tracking-[0.2em] text-white/60">{{ $referenceLabel }}</p>
                        <p class="mt-1 text-[20px] font-semibold">{{ $order->order_number }}</p>
                    </div>
                    <span class="rounded-full border px-3 py-1 text-[12px] font-semibold uppercase tracking-[0.12em] {{ $statusClasses }}">
                        {{ \Illuminate\Support\Str::headline($order->payment_status) }}
                    </span>
                </div>

                <dl class="mt-4 grid grid-cols-2 gap-4 text-[13px] text-white/80">
                    <div>
                        <dt class="uppercase tracking-[0.14em] text-white/50">{{ $dateLabel }}</dt>
                        <dd class="mt-1 text-white">{{ $order->created_at?->format('M d, Y') ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="uppercase tracking-[0.14em] text-white/50">{{ $secondaryMetaLabel }}</dt>
                        <dd class="mt-1 text-white">{{ $secondaryMetaValue }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="bg-[#eef3f9] py-10 md:py-14">
        <div class="mx-auto max-w-[1120px] px-4">
            <div class="mb-6 flex flex-col gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="flex items-center gap-2 text-[15px] font-semibold text-slate-900"><x-ui.icon name="document" class="h-4 w-4 text-[#0B2F5E]" />Document Views</p>
                    <p class="text-[13px] text-slate-500">Receipt and invoice view.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ $receiptUrl }}" class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-[13px] font-semibold {{ $isReceipt ? 'bg-[#0B2F5E] text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}"><x-ui.icon name="receipt" class="h-4 w-4" />Receipt</a>
                    <a href="{{ $invoiceUrl }}" class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-[13px] font-semibold {{ $isReceipt ? 'bg-slate-100 text-slate-700 hover:bg-slate-200' : 'bg-[#0B2F5E] text-white' }}"><x-ui.icon name="invoice" class="h-4 w-4" />Invoice View</a>
                    @if (! $isReceipt && $invoicePdfUrl)
                        <a href="{{ $invoicePdfUrl }}" class="inline-flex items-center gap-2 rounded-full bg-[#f0b323] px-4 py-2 text-[13px] font-semibold text-[#0B2F5E] hover:opacity-90"><x-ui.icon name="document" class="h-4 w-4" />Download PDF Invoice</a>
                    @endif
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-[minmax(0,1.7fr)_minmax(320px,0.9fr)]">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                    <div class="flex flex-col gap-2 border-b border-slate-200 pb-5 md:flex-row md:items-end md:justify-between">
                        <div>
                            <p class="text-[12px] font-semibold uppercase tracking-[0.22em] text-slate-400">{{ $summaryHeading }}</p>
                            <div class="mt-2 flex items-center gap-3">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-[#edf3fb] text-[#0B2F5E]">
                                    <x-ui.icon :name="$isReceipt ? 'receipt' : 'invoice'" class="h-4 w-4" />
                                </span>
                                <h2 class="text-[24px] font-semibold text-slate-950">{{ $order->billing_name ?? 'Buyer' }}</h2>
                            </div>
                        </div>
                        <div class="text-[13px] text-slate-500">
                            <p>{{ $isReceipt ? 'Receipt Ref' : 'Invoice Ref' }}: {{ $order->order_number }}</p>
                            <p>Status: {{ \Illuminate\Support\Str::headline($order->status) }}</p>
                        </div>
                    </div>

                    @if ($isReceipt)
                        <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-5">
                            <h3 class="flex items-center gap-2 text-[15px] font-semibold text-emerald-950"><x-ui.icon name="check-circle" class="h-4 w-4" />Payment Confirmation</h3>
                            <p class="mt-2 text-[14px] text-emerald-900">Payment has been recorded successfully for this order.</p>
                        </div>
                    @else
                        <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5">
                            <h3 class="flex items-center gap-2 text-[15px] font-semibold text-slate-950"><x-ui.icon name="invoice" class="h-4 w-4 text-[#0B2F5E]" />Invoice Administration</h3>
                            <dl class="mt-3 grid gap-3 text-[14px] text-slate-600 md:grid-cols-2">
                                <div>
                                    <dt class="font-semibold text-slate-900">Invoice Date</dt>
                                    <dd class="mt-1">{{ $order->created_at?->format('M d, Y') ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold text-slate-900">Payment Terms</dt>
                                    <dd class="mt-1">Due on receipt</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold text-slate-900">Settlement Status</dt>
                                    <dd class="mt-1">{{ $secondaryMetaValue }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold text-slate-900">Accounting Reference</dt>
                                    <dd class="mt-1">{{ $order->payment_intent_id ?? 'Not recorded' }}</dd>
                                </div>
                            </dl>
                        </div>
                    @endif

                    <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-[14px]">
                            <thead class="bg-slate-50 text-slate-500">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Line Item</th>
                                    <th class="px-4 py-3 font-semibold">Type</th>
                                    <th class="px-4 py-3 text-center font-semibold">Qty</th>
                                    <th class="px-4 py-3 text-right font-semibold">Unit</th>
                                    <th class="px-4 py-3 text-right font-semibold">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white text-slate-700">
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td class="px-4 py-4 align-top">
                                            <p class="font-medium text-slate-900">{{ $item->product?->name ?? 'Item' }}</p>
                                            @if ($lineMeta($item) !== null)
                                                <p class="mt-1 text-[12px] text-slate-500">{{ $lineMeta($item) }}</p>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 align-top text-[13px] text-slate-500">{{ \Illuminate\Support\Str::headline((string) $item->item_type) }}</td>
                                        <td class="px-4 py-4 text-center align-top">{{ $item->quantity }}</td>
                                        <td class="px-4 py-4 text-right align-top">{{ $order->currency }} {{ number_format((float) $item->unit_price, 2) }}</td>
                                        <td class="px-4 py-4 text-right align-top font-semibold text-slate-900">{{ $order->currency }} {{ number_format((float) $item->total_price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6 grid gap-6 md:grid-cols-2">
                        <div class="rounded-2xl bg-slate-50 p-5">
                            <h3 class="flex items-center gap-2 text-[15px] font-semibold text-slate-900"><x-ui.icon name="profile" class="h-4 w-4 text-[#0B2F5E]" />{{ $identityHeading }}</h3>
                            <div class="mt-3 space-y-1 text-[14px] text-slate-600">
                                <p>{{ $billingDetails['name'] ?? 'N/A' }}</p>
                                @if ($billingDetails['company'] !== null)
                                    <p>{{ $billingDetails['company'] }}</p>
                                @endif
                                @if ($billingDetails['email'] !== null)
                                    <p>{{ $billingDetails['email'] }}</p>
                                @endif
                                @if ($billingDetails['phone'] !== null)
                                    <p>{{ $billingDetails['phone'] }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="rounded-2xl bg-slate-50 p-5">
                            <h3 class="flex items-center gap-2 text-[15px] font-semibold text-slate-900"><x-ui.icon name="location" class="h-4 w-4 text-[#0B2F5E]" />{{ $addressHeading }}</h3>
                            <div class="mt-3 space-y-1 text-[14px] text-slate-600">
                                @if ($billingDetails['address'] !== null)
                                    <p>{{ $billingDetails['address'] }}</p>
                                @endif
                                @if ($billingDetails['address_line_2'] !== null)
                                    <p>{{ $billingDetails['address_line_2'] }}</p>
                                @endif
                                <p>
                                    {{ collect([$billingDetails['city'], $billingDetails['state'], $billingDetails['postcode']])->filter()->implode(', ') ?: 'Address details unavailable' }}
                                </p>
                                @if ($billingDetails['country'] !== null)
                                    <p>{{ $billingDetails['country'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($billingDetails['customer_note'] !== null)
                        <div class="mt-6 rounded-2xl border border-amber-200 bg-amber-50 p-5">
                            <h3 class="flex items-center gap-2 text-[15px] font-semibold text-amber-950"><x-ui.icon name="note" class="h-4 w-4" />Buyer Note</h3>
                            <p class="mt-2 text-[14px] text-amber-900">{{ $billingDetails['customer_note'] }}</p>
                        </div>
                    @endif

                    @if ($isReceipt && $accountCreationNotice)
                        <div class="mt-6 rounded-2xl border border-sky-200 bg-sky-50 p-5">
                            <h3 class="flex items-center gap-2 text-[15px] font-semibold text-sky-950"><x-ui.icon name="profile" class="h-4 w-4" />Account Setup</h3>
                            <p class="mt-2 text-[14px] text-sky-900">{{ $accountCreationNotice }}</p>
                        </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="flex items-center gap-2 text-[18px] font-semibold text-slate-950"><x-ui.icon name="card" class="h-4 w-4 text-[#0B2F5E]" />{{ $totalsHeading }}</h2>
                        <dl class="mt-5 space-y-3 text-[14px] text-slate-600">
                            <div class="flex items-center justify-between gap-3">
                                <dt>Subtotal</dt>
                                <dd class="font-medium text-slate-900">{{ $order->currency }} {{ number_format((float) $order->subtotal, 2) }}</dd>
                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <dt>Tax</dt>
                                <dd class="font-medium text-slate-900">{{ $order->currency }} {{ number_format((float) $order->tax, 2) }}</dd>
                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <dt>Discount</dt>
                                <dd class="font-medium text-slate-900">{{ $order->currency }} {{ number_format((float) $order->discount, 2) }}</dd>
                            </div>
                            <div class="flex items-center justify-between gap-3 border-t border-slate-200 pt-3 text-[16px] font-semibold text-slate-950">
                                <dt>{{ $isReceipt ? 'Total Paid' : 'Order Total' }}</dt>
                                <dd>{{ $order->currency }} {{ number_format((float) $order->total, 2) }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="flex items-center gap-2 text-[18px] font-semibold text-slate-950"><x-ui.icon :name="$isReceipt ? 'check-circle' : 'document'" class="h-4 w-4 text-[#0B2F5E]" />{{ $statusPanelHeading }}</h2>
                        <dl class="mt-5 space-y-3 text-[14px] text-slate-600">
                            @if ($isReceipt)
                                <div class="flex items-center justify-between gap-3">
                                    <dt>Payment Method</dt>
                                    <dd class="font-medium text-slate-900">{{ \Illuminate\Support\Str::headline((string) $order->payment_method) }}</dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt>Payment Status</dt>
                                    <dd class="font-medium text-slate-900">{{ \Illuminate\Support\Str::headline((string) $order->payment_status) }}</dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt>Order Status</dt>
                                    <dd class="font-medium text-slate-900">{{ \Illuminate\Support\Str::headline((string) $order->status) }}</dd>
                                </div>
                                @if ($order->payment_intent_id !== null)
                                    <div class="flex items-start justify-between gap-3">
                                        <dt>Payment Reference</dt>
                                        <dd class="break-all text-right font-medium text-slate-900">{{ $order->payment_intent_id }}</dd>
                                    </div>
                                @endif
                            @else
                                <div class="flex items-center justify-between gap-3">
                                    <dt>Invoice Number</dt>
                                    <dd class="font-medium text-slate-900">{{ $order->order_number }}</dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt>Invoice Date</dt>
                                    <dd class="font-medium text-slate-900">{{ $order->created_at?->format('M d, Y') ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt>Payment Terms</dt>
                                    <dd class="font-medium text-slate-900">Due on receipt</dd>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <dt>Settlement Status</dt>
                                    <dd class="font-medium text-slate-900">{{ $secondaryMetaValue }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                </div>
            </div>
        </div>
    </section>

</x-layouts.cms>
