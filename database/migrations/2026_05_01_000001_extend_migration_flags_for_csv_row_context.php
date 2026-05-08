<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('migration_flags', function (Blueprint $table): void {
            if (! Schema::hasColumn('migration_flags', 'source_file')) {
                $table->string('source_file')->nullable()->after('source_table');
            }

            if (! Schema::hasColumn('migration_flags', 'source_row_number')) {
                $table->unsignedInteger('source_row_number')->nullable()->after('source_id');
            }

            if (! Schema::hasColumn('migration_flags', 'source_key')) {
                $table->string('source_key')->nullable()->after('source_row_number');
            }

            if (! Schema::hasColumn('migration_flags', 'severity')) {
                $table->enum('severity', ['info', 'warning', 'blocking'])->default('warning')->after('source_key');
            }

            if (! Schema::hasColumn('migration_flags', 'raw_payload')) {
                $table->json('raw_payload')->nullable()->after('flag_reason');
            }

            if (! Schema::hasColumn('migration_flags', 'resolution_notes')) {
                $table->text('resolution_notes')->nullable()->after('resolved');
            }

            if (! Schema::hasColumn('migration_flags', 'resolved_at')) {
                $table->timestamp('resolved_at')->nullable()->after('resolution_notes');
            }

            if (! Schema::hasColumn('migration_flags', 'resolved_by')) {
                $table->unsignedBigInteger('resolved_by')->nullable()->after('resolved_at');
            }
        });

        if (! Schema::hasIndex('migration_flags', 'migration_flags_importer_file_severity_index')) {
            Schema::table('migration_flags', function (Blueprint $table): void {
                $table->index(['importer', 'source_file', 'severity'], 'migration_flags_importer_file_severity_index');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasIndex('migration_flags', 'migration_flags_importer_file_severity_index')) {
            Schema::table('migration_flags', function (Blueprint $table): void {
                $table->dropIndex('migration_flags_importer_file_severity_index');
            });
        }

        Schema::table('migration_flags', function (Blueprint $table): void {
            foreach ([
                'source_file',
                'source_row_number',
                'source_key',
                'severity',
                'raw_payload',
                'resolution_notes',
                'resolved_at',
                'resolved_by',
            ] as $column) {
                if (Schema::hasColumn('migration_flags', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
