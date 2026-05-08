<?php

declare(strict_types=1);

namespace App\Actions\Membership;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\MembershipService;

class FulfillPaidMembershipOrderAction
{
    public function __construct(private MembershipService $memberships) {}

    public function __invoke(Order $order): void
    {
        if ($order->user_id === null) {
            return;
        }

        $order->loadMissing(['user', 'items.product.membershipTier']);

        if ($order->user === null) {
            return;
        }

        $order->items
            ->filter(function (OrderItem $item): bool {
                /** @var Product|null $product */
                $product = $item->product;

                return $item->item_type === 'membership'
                    && $product instanceof Product
                    && $product->membershipTier !== null;
            })
            ->each(function (OrderItem $item) use ($order): void {
                /** @var Product $product */
                $product = $item->product;
                $billingCycle = is_array($item->meta) && is_string($item->meta['billing_cycle'] ?? null)
                    ? (string) $item->meta['billing_cycle']
                    : 'annual';

                if ($product->isMembershipRenewalProduct()) {
                    $this->memberships->fulfillPaidRenewal(
                        $order->user,
                        $product->membershipTier,
                        $order,
                        $billingCycle,
                    );

                    return;
                }

                $this->memberships->fulfillPaidMembership(
                    $order->user,
                    $product->membershipTier,
                    $order,
                    $billingCycle,
                );
            });
    }
}
