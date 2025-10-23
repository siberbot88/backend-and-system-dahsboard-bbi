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
        Schema::create('workshop_employees', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('workshop_id')->constrained('workshops');
            $table->foreignUlid('user_id')->constrained('users');
            $table->enum('position', ['admin', 'mechanic']);
            $table->string('job_title');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_employees');
    }
};
