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
        Schema::create('amz_restock_rpt', function (Blueprint $table) {
            $table->bigIncrements('amz_restock_rpt_id');
            $table->string('country_code', 10);
            $table->string('product_name', 300)->fulltext('product_name');
            $table->string('fnsku', 30);
            $table->string('merch_sku', 30);
            $table->string('asin', 30);
            $table->string('sku_condition', 30);
            $table->string('supplier', 100);
            $table->string('supplier_part_no', 100);
            $table->string('currency_code', 10);
            $table->decimal('price', 10);
            $table->bigInteger('sales_last_30_days');
            $table->bigInteger('units_last_30_days');
            $table->bigInteger('total_units');
            $table->bigInteger('inbound_units');
            $table->bigInteger('available_units');
            $table->bigInteger('fc_transfer');
            $table->bigInteger('fc_processing');
            $table->bigInteger('customer_order');
            $table->bigInteger('unfillable');
            $table->bigInteger('working');
            $table->bigInteger('shipped');
            $table->bigInteger('receiving');
            $table->string('fulfilled_by', 30);
            $table->bigInteger('days_of_supply_tot');
            $table->bigInteger('days_of_supply_fba');
            $table->string('alert', 300);
            $table->bigInteger('amz_reco_repl_qty');
            $table->date('amz_reco_ship_date');
            $table->string('amz_reco_action', 300);
            $table->string('unit_storage_size', 30);
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('changed_by');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amz_restock_rpt');
    }
};
