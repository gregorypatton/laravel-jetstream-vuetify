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
        Schema::create('product_channel_sku', function (Blueprint $table) {
            $table->bigIncrements('product_channel_sku_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('channel_id');
            $table->string('sku');
            $table->string('fulfilled_by', 10);
            $table->unsignedInteger('prep_labor_id');
            $table->string('package_part_nbr');
            $table->string('label_part_nbr');
            $table->decimal('referral_pct', 10)->unsigned();
            $table->decimal('inbound_ship_cost', 10)->unsigned();
            $table->decimal('outbound_ship_cost', 10)->unsigned();
            $table->decimal('other_cost', 10)->unsigned();
            $table->decimal('min_price', 10)->unsigned();
            $table->decimal('max_price', 10)->unsigned();
            $table->decimal('bus_price', 10)->unsigned();
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
        Schema::dropIfExists('product_channel_sku');
    }
};
