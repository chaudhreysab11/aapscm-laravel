<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $guestCreatedUserIds = $this->guestCreatedUserIds();

        DB::table('users')
            ->select(['id', 'profile_payload', 'password_initialized_at', 'created_at', 'updated_at'])
            ->orderBy('id')
            ->chunkById(200, function ($users) use ($guestCreatedUserIds): void {
                foreach ($users as $user) {
                    $this->normalizeUserPasswordState($user, $guestCreatedUserIds);
                }
            });
    }

    public function down(): void
    {
        DB::table('users')
            ->select(['id', 'profile_payload'])
            ->orderBy('id')
            ->chunkById(200, function ($users): void {
                foreach ($users as $user) {
                    $profilePayload = json_decode((string) ($user->profile_payload ?? 'null'), true);

                    if (! is_array($profilePayload)) {
                        continue;
                    }

                    if (data_get($profilePayload, 'auth.password_setup_origin') !== 'guest_checkout') {
                        continue;
                    }

                    data_set($profilePayload, 'auth.password_setup_required', null);
                    data_set($profilePayload, 'auth.password_setup_origin', null);

                    DB::table('users')
                        ->where('id', $user->id)
                        ->update([
                            'profile_payload' => $profilePayload,
                        ]);
                }
            });
    }

    /**
     * @return array<int, bool>
     */
    private function guestCreatedUserIds(): array
    {
        $guestCreatedUserIds = [];

        DB::table('activity_log')
            ->select(['id', 'properties'])
            ->where('log_name', 'guest-checkout-accounts')
            ->where('description', 'guest checkout account created after payment')
            ->orderBy('id')
            ->chunkById(200, function ($logs) use (&$guestCreatedUserIds): void {
                foreach ($logs as $log) {
                    $properties = json_decode((string) ($log->properties ?? 'null'), true);
                    $userId = data_get($properties, 'user_id');

                    if (is_numeric($userId)) {
                        $guestCreatedUserIds[(int) $userId] = true;
                    }
                }
            });

        return $guestCreatedUserIds;
    }

    /**
     * @param  array<int, bool>  $guestCreatedUserIds
     */
    private function normalizeUserPasswordState(object $user, array $guestCreatedUserIds): void
    {
        $profilePayload = json_decode((string) ($user->profile_payload ?? 'null'), true);

        if (! is_array($profilePayload)) {
            $profilePayload = [];
        }

        if (isset($guestCreatedUserIds[(int) $user->id]) && $user->password_initialized_at === null) {
            data_set($profilePayload, 'auth.password_setup_required', true);
            data_set($profilePayload, 'auth.password_setup_origin', 'guest_checkout');
        }

        $updates = [
            'profile_payload' => $profilePayload,
        ];

        if (! $this->requiresPasswordSetup($profilePayload) && $user->password_initialized_at === null) {
            $updates['password_initialized_at'] = $user->updated_at ?? $user->created_at ?? now();
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update($updates);
    }

    /**
     * @param  array<string, mixed>  $profilePayload
     */
    private function requiresPasswordSetup(array $profilePayload): bool
    {
        return data_get($profilePayload, 'migration.password_reset_required') === true
            || data_get($profilePayload, 'auth.password_setup_required') === true;
    }
};
