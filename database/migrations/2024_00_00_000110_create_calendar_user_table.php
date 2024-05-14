<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Bảng này về sau nên đổi là timekeep
     */
    public function up(): void
    {
        Schema::create('calendar_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calendar_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->foreign('calendar_id')->references('id')->on('calendars');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('calendar_user');
    }
};
