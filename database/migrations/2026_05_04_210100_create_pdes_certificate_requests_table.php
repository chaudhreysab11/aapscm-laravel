<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pdes_certificate_requests', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->index();
            $table->string('phone', 50);
            $table->string('certification');
            $table->string('certification_number')->nullable();
            $table->string('activity_type');
            $table->string('course_name');
            $table->string('provider');
            $table->string('location');
            $table->date('course_date');
            $table->unsignedSmallInteger('pdes_earned');
            $table->string('category');
            $table->string('certificate_path')->nullable();
            $table->string('additional_documents_path')->nullable();
            $table->json('declarations');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pdes_certificate_requests');
    }
};
