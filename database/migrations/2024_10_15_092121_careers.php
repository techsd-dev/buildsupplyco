<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->nullable();
            $table->string('slug')->nullable();
            $table->string('job_location')->nullable();
            $table->text('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->text('overview')->nullable();
            $table->text('roles_n_responsibilities')->nullable();
            $table->string('image')->nullable();
            $table->timestamps(); // created_at and updated_at with current timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
