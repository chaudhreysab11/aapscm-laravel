<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('migration_logs', function (Blueprint $table) {
            $table->id();
            $table->string('importer');              // e.g. UserImporter, CertificateImporter
            $table->string('source_table');          // WP source table
            $table->unsignedBigInteger('source_id'); // WP record ID
            $table->unsignedBigInteger('target_id')->nullable(); // new Laravel record ID
            $table->enum('status', ['imported', 'skipped', 'failed'])->default('imported');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['importer', 'source_id']);
            $table->index('status');
        });

        Schema::create('migration_flags', function (Blueprint $table) {
            $table->id();
            $table->string('importer');
            $table->string('source_table');
            $table->unsignedBigInteger('source_id');
            $table->string('field_name');
            $table->text('original_value')->nullable();
            $table->text('flag_reason');
            $table->boolean('resolved')->default(false);
            $table->timestamps();

            $table->index(['importer', 'resolved']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('migration_flags');
        Schema::dropIfExists('migration_logs');
    }
};
