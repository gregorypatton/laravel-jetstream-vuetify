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
        Schema::create('get_restock_inventory_recommendations_report', function (Blueprint $table) {
            $table->string('country', 2)->nullable();
            $table->string('product_name', 200)->nullable();
            $table->string('fnsku', 12)->nullable();
            $table->string('merchant_sku', 80)->nullable();
            $table->string('asin', 10)->nullable()->index('asin');
            $table->string('condition_type', 10)->nullable();
            $table->string('supplier', 30)->nullable();
            $table->string('supplier_part_no', 30)->nullable();
            $table->string('currency_code', 3)->nullable();
            $table->decimal('price', 10)->nullable();
            $table->decimal('sales_last_30_days', 10)->nullable();
            $table->bigInteger('units_sold_last_30_days')->nullable();
            $table->bigInteger('total_units')->nullable();
            $table->bigInteger('inbound')->nullable();
            $table->bigInteger('available')->nullable();
            $table->bigInteger('fc_transfer')->nullable();
            $table->bigInteger('fc_processing')->nullable();
            $table->bigInteger('customer_order')->nullable();
            $table->bigInteger('unfulfillable')->nullable();
            $table->bigInteger('working')->nullable();
            $table->bigInteger('shipped')->nullable();
            $table->bigInteger('receiving')->nullable();
            $table->string('fulfilled_by', 6)->nullable();
            $table->string('total_days_of_supply', 10)->nullable();
            $table->string('days_of_supply_at_amazon_fulfillment_network', 10)->nullable();
            $table->string('alert', 30)->nullable();
            $table->bigInteger('recommended_replenishment_qty')->nullable();
            $table->string('recommended_ship_date', 20)->nullable();
            $table->string('recommended_action', 30)->nullable();
            $table->string('unit_storage_size', 20)->nullable();
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
        Schema::dropIfExists('get_restock_inventory_recommendations_report');
    }
};
