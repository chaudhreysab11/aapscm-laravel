<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Actions\Checkout\HandleGuestCheckoutAccountCreationAction;
use App\Events\OrderPaid;

class ResolveGuestCheckoutAccountOnOrderPaid
{
    public function __construct(private HandleGuestCheckoutAccountCreationAction $handleGuestCheckoutAccountCreation) {}

    public function handle(OrderPaid $event): void
    {
        ($this->handleGuestCheckoutAccountCreation)($event->order);
    }
}
