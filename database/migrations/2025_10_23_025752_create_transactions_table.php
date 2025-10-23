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
            $table->ulid('id')->primary();
            $table->string('code')->unique();
            $table->foreignUlid('customer_id')->constrained('customers');
            $table->foreignUlid('workshop_id')->constrained('workshops');
            $table->foreignUlid('admin_id')->nullable()->constrained('users');
            $table->foreignUlid('mechanic_id')->nullable()->constrained('users');
            $table->enum('status', ['pending','process','success'])->default('pending')->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
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
