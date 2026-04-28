<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cv_submissions', function (Blueprint $table) {
            $table->string('headline')->nullable()->after('email');
            $table->json('form_payload')->nullable()->after('cover_letter');
            $table->string('cv_file_path')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('cv_submissions', function (Blueprint $table) {
            $table->dropColumn(['headline', 'form_payload']);
            $table->string('cv_file_path')->nullable(false)->change();
        });
    }
};
