<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class AttachGuestOrdersToUserAction
{
    public function __invoke(User $user): int
    {
        $email = $this->normalizeEmail($user->email);

        if ($email === null) {
            return 0;
        }

        return DB::table('orders')
            ->whereNull('user_id')
            ->whereRaw('LOWER(billing_email) = ?', [$email])
            ->update(['user_id' => $user->id]);
    }

    private function normalizeEmail(?string $email): ?string
    {
        if (! is_string($email)) {
            return null;
        }

        $normalized = strtolower(trim($email));

        return $normalized === '' ? null : $normalized;
    }
}
