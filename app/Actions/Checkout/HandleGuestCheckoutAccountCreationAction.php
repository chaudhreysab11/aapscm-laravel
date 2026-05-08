<?php

declare(strict_types=1);

namespace App\Actions\Checkout;

use App\Actions\User\AttachGuestOrdersToUserAction;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Throwable;

class HandleGuestCheckoutAccountCreationAction
{
    public function __construct(private AttachGuestOrdersToUserAction $attachGuestOrdersToUser) {}

    public function __invoke(Order $order): void
    {
        $resolution = DB::transaction(fn (): ?array => $this->resolveAccountResolution($order));

        if (! is_array($resolution)) {
            return;
        }

        /** @var User $user */
        $user = $resolution['user'];
        $passwordSetupDispatched = false;

        if ($resolution['created'] === true) {
            $passwordSetupDispatched = $this->dispatchPasswordSetupLink($user);
        }

        DB::transaction(function () use ($resolution, $user, $passwordSetupDispatched): void {
            /** @var Order|null $lockedOrder */
            $lockedOrder = Order::query()->whereKey($resolution['order_id'])->lockForUpdate()->first();

            if (! $lockedOrder instanceof Order) {
                return;
            }

            $notes = $this->orderNotes($lockedOrder);
            $notes['account_resolution'] = [
                'status' => $resolution['created'] === true ? 'created_new_user' : 'linked_existing_user',
                'user_id' => $user->id,
                'user_email' => $user->email,
                'password_setup_dispatched' => $passwordSetupDispatched,
            ];

            $lockedOrder->forceFill([
                'notes' => json_encode($notes),
            ])->save();
        });

        $order->refresh();
        $order->unsetRelation('user');

        activity('guest-checkout-accounts')
            ->performedOn($order)
            ->withProperties([
                'user_id' => $user->id,
                'user_email' => $user->email,
                'resolution' => $resolution['created'] === true ? 'created_new_user' : 'linked_existing_user',
                'linked_orders' => $resolution['linked_orders'],
                'password_setup_dispatched' => $passwordSetupDispatched,
            ])
            ->log($resolution['created'] === true
                ? 'guest checkout account created after payment'
                : 'guest checkout order linked to existing account after payment');
    }

    private function resolveAccountResolution(Order $order): ?array
    {
        /** @var Order|null $lockedOrder */
        $lockedOrder = Order::query()->whereKey($order->getKey())->lockForUpdate()->first();

        if (! $lockedOrder instanceof Order || $lockedOrder->user_id !== null || ! $this->shouldCreateAccount($lockedOrder)) {
            return null;
        }

        $email = $this->normalizeEmail($lockedOrder->billing_email);

        if ($email === null) {
            return null;
        }

        $notes = $this->orderNotes($lockedOrder);
        $user = User::query()->whereRaw('LOWER(email) = ?', [$email])->first();
        $created = false;

        if (! $user instanceof User) {
            $user = User::query()->create([
                'name' => $this->resolveName($lockedOrder, $email),
                'email' => $email,
                'password' => Str::password(32),
                'password_initialized_at' => null,
                'phone' => $this->stringOrNull($notes['billing_phone'] ?? null),
                'company' => $this->stringOrNull($notes['billing_company'] ?? null),
                'country' => $this->stringOrNull($notes['billing_country'] ?? null),
                'is_active' => true,
                'profile_payload' => [
                    'auth' => [
                        'password_setup_required' => true,
                        'password_setup_origin' => 'guest_checkout',
                    ],
                ],
            ]);

            $created = true;
        }

        return [
            'user' => $user,
            'created' => $created,
            'linked_orders' => ($this->attachGuestOrdersToUser)($user),
            'order_id' => $lockedOrder->id,
        ];
    }

    private function shouldCreateAccount(Order $order): bool
    {
        $checkoutContext = $this->orderNotes($order)['checkout_context'] ?? null;

        if (! is_array($checkoutContext)) {
            return false;
        }

        return filter_var($checkoutContext['create_account'] ?? false, FILTER_VALIDATE_BOOL) === true;
    }

    /**
     * @return array<string, mixed>
     */
    private function orderNotes(Order $order): array
    {
        $notes = json_decode((string) $order->notes, true);

        return is_array($notes) ? $notes : [];
    }

    private function normalizeEmail(?string $email): ?string
    {
        if (! is_string($email)) {
            return null;
        }

        $normalized = strtolower(trim($email));

        return $normalized === '' ? null : $normalized;
    }

    private function resolveName(Order $order, string $email): string
    {
        $name = $this->stringOrNull($order->billing_name);

        if ($name !== null) {
            return $name;
        }

        return Str::headline((string) Str::before($email, '@'));
    }

    private function stringOrNull(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $trimmed = trim($value);

        return $trimmed === '' ? null : $trimmed;
    }

    private function dispatchPasswordSetupLink(User $user): bool
    {
        try {
            return Password::sendResetLink(['email' => $user->email]) === Password::RESET_LINK_SENT;
        } catch (Throwable $exception) {
            report($exception);

            return false;
        }
    }
}
