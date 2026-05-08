<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('password_initialized_at')->nullable()->after('password');
        });

        $timestamp = now();

        DB::table('users')
            ->select(['id', 'profile_payload'])
            ->orderBy('id')
            ->chunkById(200, function ($users) use ($timestamp): void {
                foreach ($users as $user) {
                    $profilePayload = json_decode((string) ($user->profile_payload ?? 'null'), true);
                    $requiresPasswordReset = data_get($profilePayload, 'migration.password_reset_required') === true;

                    DB::table('users')
                        ->where('id', $user->id)
                        ->update([
                            'password_initialized_at' => $requiresPasswordReset ? null : $timestamp,
                        ]);
                }
            });

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
                        $guestCreatedUserIds[] = (int) $userId;
                    }
                }
            });

        if ($guestCreatedUserIds !== []) {
            DB::table('users')
                ->whereIn('id', array_values(array_unique($guestCreatedUserIds)))
                ->update([
                    'password_initialized_at' => null,
                ]);
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password_initialized_at');
        });
    }
};
