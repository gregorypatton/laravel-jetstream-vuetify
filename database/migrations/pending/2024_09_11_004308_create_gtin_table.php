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
        Schema::create('gtin', function (Blueprint $table) {
            $table->unsignedBigInteger('gtin_id')->primary();
            $table->char('gtin_nbr', 14);
            $table->unsignedBigInteger('seller_id')->index('seller_id');
            $table->unsignedInteger('status_id');
            $table->unsignedBigInteger('changed_by');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gtin');
    }
};
