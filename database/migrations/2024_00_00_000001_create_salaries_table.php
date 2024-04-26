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
        Schema::create('salaries', function (Blueprint $table) {
            $table->uuid('id')->primary();;
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedInteger('month')->nullable();
            $table->unsignedInteger('overtime_pay')->nullable();
            $table->unsignedInteger('bonus_pay')->nullable();
            $table->unsignedInteger('total_pay')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
