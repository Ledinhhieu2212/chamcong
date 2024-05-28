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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id')->nullable();
            $table->unsignedBigInteger('calendar_id')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->unsignedInteger('shift_1')->default(0);
            $table->unsignedInteger('shift_2')->default(0);
            $table->unsignedInteger('shift_3')->default(0);
            $table->unsignedInteger('shift')->default(0);
            $table->timestamps();
            $table->foreign('calendar_id')->references('id')->on('calendars')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
