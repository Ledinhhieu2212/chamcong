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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username', 200);
            $table->string('fullname', 200)->nullable();
            $table->string('email', 200)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 200);
            $table->string('phone', 10)->nullable();
            $table->string('cccd', 12)->nullable();
            $table->unsignedInteger('sex')->default(0);
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->text('image')->nullable();
            $table->text('qr_code')->nullable();
            $table->uuid('position_id')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
