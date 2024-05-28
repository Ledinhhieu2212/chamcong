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
        Schema::create('detail_timekeeps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timekeep_id')->nullable();
            $table->unsignedBigInteger('calendar_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->unsignedInteger('month')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('shift')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('timekeep_id')->references('id')->on('timekeeps')->onDelete('cascade');
            $table->foreign('calendar_id')->references('id')->on('calendars')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_timekeeps');
    }
};
