<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Rename old certifications table (conflated catalog + awarded records)
        // to certification_catalog — represents the 60+ credential programs
        Schema::rename('certifications', 'certification_catalog');

        Schema::table('certification_catalog', function (Blueprint $table) {
            // Drop FK to users — the courses FK was left as an unsigned bigint (no FK constraint)
            $table->dropForeign('certifications_user_id_foreign');
            $table->dropColumn(['user_id', 'course_id', 'certificate_number', 'issued_at', 'expires_at']);

            // Add catalog-specific fields
            $table->string('title')->after('id');
            $table->string('slug')->unique()->after('title');
            $table->text('description')->nullable()->after('slug');
            $table->text('eligibility_requirements')->nullable();
            $table->text('exam_details')->nullable();
            $table->unsignedSmallInteger('pdu_credits')->default(0);
            $table->string('badge_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('source_id')->nullable(); // WP post ID
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::rename('certification_catalog', 'certifications');
    }
};
