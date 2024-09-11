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
        Schema::create('zzz_product_core', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->unsignedBigInteger('product_part_id')->index('product_part_id');
            $table->string('product_name');
            $table->string('product_desc', 5000);
            $table->unsignedBigInteger('man_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedInteger('package_qty');
            $table->unsignedBigInteger('seller_id')->index('seller_id');
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
        Schema::dropIfExists('zzz_product_core');
    }
};
