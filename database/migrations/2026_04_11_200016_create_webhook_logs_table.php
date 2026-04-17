<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webhook_logs', function (Blueprint $table) {
            $table->id();
            $table->string('provider');              // stripe, paypal
            $table->string('event_type');            // e.g. payment_intent.succeeded
            $table->string('event_id')->nullable();  // provider's event ID (idempotency key)
            $table->enum('status', ['received', 'processed', 'failed', 'ignored'])->default('received');
            $table->json('payload');                 // raw webhook body
            $table->text('error_message')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();

            $table->index(['provider', 'event_type']);
            $table->index('event_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webhook_logs');
    }
};
