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
        Schema::create('day_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_calendar_id')->unsigned()->nullable();
            $table->string('date_day')->nullable();
            $table->foreign('detail_calendar_id')->references('id')->on('detail_calendars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_works');
    }
};
