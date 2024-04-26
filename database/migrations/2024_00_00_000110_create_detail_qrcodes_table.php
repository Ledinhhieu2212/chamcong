<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('detail_qrcodes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('qrcode_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('qrcode_id')->references('id')->on('qrcodes')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('detail_qrcodes');
    }
};
