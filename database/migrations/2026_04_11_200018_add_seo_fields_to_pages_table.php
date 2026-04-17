<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('seo_title')->nullable()->after('content');
            $table->text('seo_description')->nullable()->after('seo_title');
            $table->string('seo_canonical')->nullable()->after('seo_description');
            $table->boolean('show_in_nav')->default(false)->after('seo_canonical');
            $table->unsignedBigInteger('source_id')->nullable(); // WP page ID
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['seo_title', 'seo_description', 'seo_canonical', 'show_in_nav', 'source_id']);
        });
    }
};
