<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('how_to_apply_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->index();
            $table->string('phone');
            $table->string('cv_path');
            $table->text('message');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('how_to_apply_submissions');
    }
};
