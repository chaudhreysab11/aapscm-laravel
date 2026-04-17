<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->boolean('is_published')->default(false)->after('template');
            $table->integer('sort_order')->default(0)->after('is_published');
            $table->unsignedBigInteger('parent_id')->nullable()->after('sort_order');
            $table->foreign('parent_id')->references('id')->on('pages')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['is_published', 'sort_order', 'parent_id']);
        });
    }
};
