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
        Schema::create('product_part', function (Blueprint $table) {
            $table->bigIncrements('product_part_id');
            $table->unsignedBigInteger('product_id')->index('product_id');
            $table->unsignedBigInteger('part_id')->index('part_id');
            $table->unsignedInteger('part_qty');
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
        Schema::dropIfExists('product_part');
    }
};
