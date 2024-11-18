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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Make nullable
            $table->string('mer_transaction_id')->unique()->nullable(); // Make nullable
            $table->string('transaction_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('state')->default('PENDING')->nullable(); // Make nullable
            $table->string('status')->default('Pending')->nullable(); // Make nullable
            $table->decimal('amount', 10, 2)->nullable();
            $table->text('complete_response')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
