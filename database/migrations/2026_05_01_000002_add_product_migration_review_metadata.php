<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::statement("ALTER TABLE products MODIFY type ENUM('physical', 'digital', 'exam_voucher', 'membership', 'training', 'bundle', 'donation', 'external', 'variation') NOT NULL DEFAULT 'digital'");
        }

        Schema::table('products', function (Blueprint $table): void {
            if (! Schema::hasColumn('products', 'migration_review_status')) {
                $table->string('migration_review_status')->nullable()->after('source_id')->index();
            }

            if (! Schema::hasColumn('products', 'migration_notes')) {
                $table->text('migration_notes')->nullable()->after('migration_review_status');
            }

            if (! Schema::hasColumn('products', 'migration_payload')) {
                $table->json('migration_payload')->nullable()->after('migration_notes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table): void {
            if (Schema::hasColumn('products', 'migration_payload')) {
                $table->dropColumn('migration_payload');
            }

            if (Schema::hasColumn('products', 'migration_notes')) {
                $table->dropColumn('migration_notes');
            }

            if (Schema::hasColumn('products', 'migration_review_status')) {
                $table->dropIndex(['migration_review_status']);
                $table->dropColumn('migration_review_status');
            }
        });

        $driver = DB::getDriverName();

        if (in_array($driver, ['mysql', 'mariadb'], true)) {
            DB::table('products')
                ->whereIn('type', ['external', 'variation'])
                ->update(['type' => 'digital']);

            DB::statement("ALTER TABLE products MODIFY type ENUM('physical', 'digital', 'exam_voucher', 'membership', 'training', 'bundle', 'donation') NOT NULL DEFAULT 'digital'");
        }
    }
};
