<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Index is_active and source_id on certification_catalog.
     *
     * The refactor migration already created these columns; they were left
     * without indexes. is_active is used in every catalog listing query.
     * source_id is used during data migration to locate the WP post record.
     */
    public function up(): void
    {
        Schema::table('certification_catalog', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('source_id');
        });
    }

    public function down(): void
    {
        Schema::table('certification_catalog', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['source_id']);
        });
    }
};
