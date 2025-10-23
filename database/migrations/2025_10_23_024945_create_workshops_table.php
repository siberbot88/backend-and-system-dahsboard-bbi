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
        Schema::create('workshops', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('owner_id')->constrained('users');
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('photo');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->time('open_time');
            $table->time('close_time');
            $table->string('operational_day');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
