<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Index payment_status on orders (required by approved schema §5).
     *
     * payment_status is queried frequently — webhook handlers filter by it,
     * the admin order list filters by it, and the membership renewal job
     * queries unpaid orders. The column was added without an index in the
     * add_payment_fields migration.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->index('payment_status');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['payment_status']);
        });
    }
};
