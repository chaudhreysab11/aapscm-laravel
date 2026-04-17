<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('seo_meta', function (Blueprint $table) {
            $table->unsignedBigInteger('seoable_id')->nullable()->change();
            $table->string('seoable_type')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('seo_meta', function (Blueprint $table) {
            $table->unsignedBigInteger('seoable_id')->nullable(false)->change();
            $table->string('seoable_type')->nullable(false)->change();
        });
    }
};
