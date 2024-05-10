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
            $table->unsignedBigInteger('calendar_user_id')->nullable();
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->string('shift')->nullable();
            $table->foreign('calendar_user_id')->references('id')->on('calendar_users')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
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
