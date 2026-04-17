<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->enum('delivery_format', ['in-person', 'virtual', 'self-paced'])->default('in-person')->after('slug');
            $table->unsignedSmallInteger('duration_hours')->nullable()->after('delivery_format');
            $table->string('location')->nullable()->after('duration_hours');
            $table->timestamp('starts_at')->nullable()->after('location');
            $table->timestamp('ends_at')->nullable()->after('starts_at');
            $table->unsignedSmallInteger('max_seats')->nullable()->after('ends_at');
            $table->unsignedSmallInteger('enrolled_count')->default(0)->after('max_seats');
            $table->foreignId('certification_catalog_id')->nullable()->after('enrolled_count')
                ->constrained('certification_catalog')->nullOnDelete();
            $table->unsignedBigInteger('source_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['certification_catalog_id']);
            $table->dropColumn(['delivery_format', 'duration_hours', 'location', 'starts_at', 'ends_at', 'max_seats', 'enrolled_count', 'certification_catalog_id', 'source_id']);
        });
    }
};
