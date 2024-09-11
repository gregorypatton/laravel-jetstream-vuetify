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
        Schema::create('zzz_product_prep', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
            $table->unsignedInteger('prep_labor_id');
            $table->unsignedInteger('prep_package_id');
            $table->unsignedInteger('prep_label_id');
            $table->string('fulfilled_by', 10);
            $table->decimal('referral_pct', 10)->unsigned();
            $table->string('fulfillment_calc_ind', 1);
            $table->string('fulfillment_service', 10);
            $table->string('fulfillment_class', 20);
            $table->decimal('inbound_ship_cost', 10)->unsigned();
            $table->decimal('prep_labor_cost', 10)->unsigned();
            $table->decimal('prep_package_cost', 10)->unsigned();
            $table->decimal('prep_label_cost', 10)->unsigned();
            $table->decimal('fulfillment_cost', 10)->unsigned();
            $table->decimal('other_cost', 10)->unsigned();
            $table->decimal('min_price', 10)->unsigned();
            $table->decimal('min_ref_cost', 10)->unsigned();
            $table->decimal('min_net', 10)->unsigned();
            $table->decimal('max_price', 10)->unsigned();
            $table->decimal('max_ref_cost', 10)->unsigned();
            $table->decimal('max_net', 10)->unsigned();
            $table->decimal('bus_price', 10)->unsigned();
            $table->decimal('bus_ref_cost', 10)->unsigned();
            $table->decimal('bus_net', 10)->unsigned();
            $table->string('active_ind', 1);
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
        Schema::dropIfExists('zzz_product_prep');
    }
};
