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
            $table->uuid('id')->primary();
            $table->uuid('detail_calendar_id');
            $table->date('date')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->unsignedInteger('shift_1')->default(0);
            $table->unsignedInteger('shift_2')->default(0);
            $table->unsignedInteger('shift_3')->default(0);
            $table->timestamps();

            $table->foreign('detail_calendar_id')->references('id')->on('detail_calendars')->onDelete('cascade');
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
