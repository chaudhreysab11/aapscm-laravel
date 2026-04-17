<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('job_title')->nullable()->after('phone');
            $table->string('company')->nullable()->after('job_title');
            $table->string('country')->nullable()->after('company');
            $table->string('avatar')->nullable()->after('country');
            $table->boolean('is_active')->default(true)->after('avatar');
            $table->unsignedBigInteger('source_id')->nullable(); // WP user ID
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'job_title', 'company', 'country', 'avatar', 'is_active', 'source_id']);
        });
    }
};
