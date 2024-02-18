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
        Schema::create('calendars', function (Blueprint $table) {
            $table->bigIncrements('calendar_id');
            $table->unsignedBigInteger('timekeep_id')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->boolean('morning')->nullable();
            $table->boolean('afternoon')->nullable();
            $table->boolean('evening')->nullable();
            $table->boolean('night')->nullable();
            $table->timestamps();
            $table->foreign('timekeep_id')->references('timekeep_id')->on('timekeeps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendars');
    }
};
