<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('communities', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            // regional | special_interest | industry | chapter
            $table->string('community_type', 100)->default('regional');
            $table->string('region', 255)->nullable();
            $table->text('community_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            // Traceability back to WordPress source
            $table->unsignedInteger('source_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('community_type');
            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
