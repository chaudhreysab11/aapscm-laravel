<?php
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

    $invoiceNumber = $order->order_number;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice <?php echo e($invoiceNumber); ?></title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #14233a;
            font-size: 12px;
            line-height: 1.45;
            margin: 28px;
        }

        .header {
            border-bottom: 2px solid #0b2f5e;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #0b2f5e;
            margin: 0 0 6px;
        }

        .muted {
            color: #5b6778;
        }

        .summary-table,
        .items-table,
        .totals-table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary-table td {
            vertical-align: top;
            width: 50%;
            padding: 0 0 18px;
        }

        .panel {
            border: 1px solid #d5deea;
            background: #f8fbff;
            padding: 14px;
            border-radius: 6px;
        }

        .section-title {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin: 0 0 10px;
            color: #0b2f5e;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #d5deea;
            padding: 10px 8px;
        }

        .items-table th {
            background: #edf4fb;
            text-align: left;
        }

        .items-table .number,
        .totals-table .number {
            text-align: right;
        }

        .totals-wrap {
            margin-top: 18px;
            width: 280px;
            margin-left: auto;
        }

        .totals-table td {
            padding: 6px 0;
        }

        .totals-table .total-row td {
            border-top: 1px solid #0b2f5e;
            font-weight: bold;
            padding-top: 10px;
        }

        .note {
            margin-top: 22px;
            border: 1px solid #f0d596;
            background: #fff8e6;
            padding: 12px;
        }

        .footer {
            margin-top: 28px;
            font-size: 11px;
            color: #5b6778;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="brand">AAPSCM Commerce Invoice</div>
        <div class="muted">Invoice number: <?php echo e($invoiceNumber); ?></div>
        <div class="muted">Invoice date: <?php echo e($order->created_at?->format('M d, Y') ?? 'N/A'); ?></div>
    </div>

    <table class="summary-table">
        <tr>
            <td style="padding-right: 10px;">
                <div class="panel">
                    <div class="section-title">Buyer Details</div>
                    <div><?php echo e($billingDetails['name'] ?? 'N/A'); ?></div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingDetails['company']): ?><div><?php echo e($billingDetails['company']); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingDetails['email']): ?><div><?php echo e($billingDetails['email']); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingDetails['phone']): ?><div><?php echo e($billingDetails['phone']); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div style="margin-top: 10px;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingDetails['address']): ?><div><?php echo e($billingDetails['address']); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingDetails['address_line_2']): ?><div><?php echo e($billingDetails['address_line_2']); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div><?php echo e(collect([$billingDetails['city'], $billingDetails['state'], $billingDetails['postcode']])->filter()->implode(', ')); ?></div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingDetails['country']): ?><div><?php echo e($billingDetails['country']); ?></div><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </td>
            <td style="padding-left: 10px;">
                <div class="panel">
                    <div class="section-title">Payment Record</div>
                    <div><strong>Order Status:</strong> <?php echo e(\Illuminate\Support\Str::headline((string) $order->status)); ?></div>
                    <div><strong>Payment Status:</strong> <?php echo e(\Illuminate\Support\Str::headline((string) $order->payment_status)); ?></div>
                    <div><strong>Payment Method:</strong> <?php echo e(\Illuminate\Support\Str::headline((string) $order->payment_method)); ?></div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->payment_intent_id): ?>
                        <div><strong>Payment Reference:</strong> <?php echo e($order->payment_intent_id); ?></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </td>
        </tr>
    </table>

    <div class="section-title">Line Items</div>
    <table class="items-table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Type</th>
                <th class="number">Qty</th>
                <th class="number">Unit Price</th>
                <th class="number">Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <tr>
                    <td>
                        <div><?php echo e($item->product?->name ?? 'Item'); ?></div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lineMeta($item)): ?>
                            <div class="muted"><?php echo e($lineMeta($item)); ?></div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td><?php echo e(\Illuminate\Support\Str::headline((string) $item->item_type)); ?></td>
                    <td class="number"><?php echo e($item->quantity); ?></td>
                    <td class="number"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $item->unit_price, 2)); ?></td>
                    <td class="number"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $item->total_price, 2)); ?></td>
                </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>

    <div class="totals-wrap">
        <table class="totals-table">
            <tr>
                <td>Subtotal</td>
                <td class="number"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->subtotal, 2)); ?></td>
            </tr>
            <tr>
                <td>Tax</td>
                <td class="number"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->tax, 2)); ?></td>
            </tr>
            <tr>
                <td>Discount</td>
                <td class="number"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->discount, 2)); ?></td>
            </tr>
            <tr class="total-row">
                <td>Total</td>
                <td class="number"><?php echo e($order->currency); ?> <?php echo e(number_format((float) $order->total, 2)); ?></td>
            </tr>
        </table>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($billingDetails['customer_note']): ?>
        <div class="note">
            <strong>Buyer Note:</strong> <?php echo e($billingDetails['customer_note']); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="footer">
        This PDF invoice is generated from the order record stored in the AAPSCM Laravel commerce system. The invoice number uses the existing order number to keep the document auditable without introducing a second numbering sequence.
    </div>
</body>
</html><?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\pdf\order-invoice.blade.php ENDPATH**/ ?>