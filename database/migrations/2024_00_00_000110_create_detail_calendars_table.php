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
        Schema::create('detail_calendars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('calendar_id')->nullable();
            $table->unsignedInteger('is_registered')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('calendar_id')->references('id')->on('calendars')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('detail_calendars');
    }
};
