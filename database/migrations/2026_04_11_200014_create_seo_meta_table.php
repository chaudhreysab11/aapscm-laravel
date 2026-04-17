<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_meta', function (Blueprint $table) {
            $table->id();
            $table->string('url_path');                          // relative URL path, e.g. /about/
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('robots')->default('index,follow');
            $table->nullableMorphs('seoable');                   // polymorphic: Page, Post, CertificationCatalog, etc.
            $table->unsignedBigInteger('source_id')->nullable(); // WP post ID (Yoast meta)
            $table->timestamps();

            $table->unique('url_path');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_meta');
    }
};
