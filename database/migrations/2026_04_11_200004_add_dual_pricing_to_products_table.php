<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('member_price', 10, 2)->nullable()->after('price');
            $table->decimal('non_member_price', 10, 2)->nullable()->after('member_price');
            $table->string('category')->nullable()->after('non_member_price');
            $table->string('product_type')->default('standard')->after('category'); // standard, membership, exam
            $table->foreignId('certification_catalog_id')->nullable()->after('product_type')
                ->constrained('certification_catalog')->nullOnDelete();
            $table->unsignedBigInteger('source_id')->nullable(); // WP product ID
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['certification_catalog_id']);
            $table->dropColumn(['member_price', 'non_member_price', 'category', 'product_type', 'certification_catalog_id', 'source_id']);
        });
    }
};
