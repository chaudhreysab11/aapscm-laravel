<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // unit_price and total_price already exist in create migration
            $table->string('item_type')->nullable()->after('total_price'); // product, membership, exam
            $table->json('meta')->nullable()->after('item_type');          // extra data (e.g. membership tier)
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn(['item_type', 'meta']);
        });
    }
};
