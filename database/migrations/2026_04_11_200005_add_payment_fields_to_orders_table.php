<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('status');    // stripe, paypal
            $table->string('payment_intent_id')->nullable()->after('payment_method');
            $table->string('payment_status')->default('unpaid')->after('payment_intent_id'); // unpaid, paid, refunded, failed
            $table->string('currency', 3)->default('USD')->after('payment_status');
            $table->decimal('discount', 10, 2)->default(0)->after('tax');
            $table->unsignedBigInteger('source_id')->nullable(); // WP order ID
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'payment_intent_id', 'payment_status', 'currency', 'discount', 'source_id']);
        });
    }
};
