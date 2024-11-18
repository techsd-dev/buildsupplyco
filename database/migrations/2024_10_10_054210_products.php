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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prd_name')->nullable();
            $table->string('slug')->unique();

            // Ensure correct table names and foreign key constraints
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->onDelete('set null');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('set null');

            $table->decimal('prd_price', 10, 2)->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->decimal('prd_discount_price', 10, 2)->nullable();
            $table->text('prd_description')->nullable();
            $table->string('prd_image')->nullable();
            $table->text('prd_images')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
