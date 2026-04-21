<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Promote billing identity out of the notes JSON blob into proper columns.
     *
     * Required so guest orders can be (a) looked up by email, (b) attached to
     * a user account when that email later registers, and (c) gated by the
     * OrderPolicy without parsing JSON. Address/city/country stay in `notes`
     * for now (Task 2 scope is identity only).
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            // Guest checkout: an order may exist before any user account is linked.
            // The UserObserver back-fills user_id when the matching email registers.
            $table->foreignId('user_id')->nullable()->change();

            if (! Schema::hasColumn('orders', 'billing_email')) {
                $table->string('billing_email', 255)->nullable()->after('user_id');
                $table->index('billing_email');
            }

            if (! Schema::hasColumn('orders', 'billing_name')) {
                $table->string('billing_name', 255)->nullable()->after('billing_email');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table): void {
            if (Schema::hasColumn('orders', 'billing_email')) {
                $table->dropIndex(['billing_email']);
                $table->dropColumn('billing_email');
            }

            if (Schema::hasColumn('orders', 'billing_name')) {
                $table->dropColumn('billing_name');
            }

            $table->foreignId('user_id')->nullable(false)->change();
        });
    }
};
