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
        Schema::create('timekeeps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->unsignedInteger('late_status')->nullable();
            $table->unsignedInteger('early_status')->nullable();
            $table->unsignedInteger('absent_status')->nullable(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timekeeps');
    }
};
