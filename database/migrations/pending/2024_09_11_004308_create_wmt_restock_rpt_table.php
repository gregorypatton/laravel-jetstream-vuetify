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
        Schema::create('wmt_restock_rpt', function (Blueprint $table) {
            $table->bigIncrements('wmt_restock_rpt_id');
            $table->string('gtin', 20);
            $table->bigInteger('item_id');
            $table->string('seller_sku', 100);
            $table->string('product_name', 300);
            $table->string('brand_name', 100);
            $table->string('published_ind', 10);
            $table->bigInteger('available_units');
            $table->bigInteger('damaged_units');
            $table->bigInteger('inbound_units');
            $table->bigInteger('pending_review');
            $table->decimal('cube_used', 10);
            $table->integer('units_sold_last30');
            $table->unsignedBigInteger('seller_id');
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
        Schema::dropIfExists('wmt_restock_rpt');
    }
};
