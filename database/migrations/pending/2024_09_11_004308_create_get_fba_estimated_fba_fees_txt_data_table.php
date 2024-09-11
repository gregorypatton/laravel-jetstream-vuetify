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
        Schema::create('get_fba_estimated_fba_fees_txt_data', function (Blueprint $table) {
            $table->string('sku', 80);
            $table->string('fnsku', 12)->nullable();
            $table->string('asin', 10)->nullable()->index('asin');
            $table->string('amazon_store', 2);
            $table->string('product_name', 200)->nullable();
            $table->string('product_group', 200)->nullable();
            $table->string('brand', 50)->nullable();
            $table->string('fulfilled_by', 6)->nullable();
            $table->decimal('your_price', 10)->nullable();
            $table->decimal('sales_price', 10)->nullable();
            $table->decimal('longest_side', 10)->nullable();
            $table->decimal('median_side', 10)->nullable();
            $table->decimal('shortest_side', 10)->nullable();
            $table->decimal('length_and_girth', 10)->nullable();
            $table->string('unit_of_dimension', 20)->nullable();
            $table->decimal('item_package_weight', 10)->nullable();
            $table->string('unit_of_weight', 20)->nullable();
            $table->string('product_size_tier', 50)->nullable();
            $table->string('currency', 3)->nullable();
            $table->decimal('estimated_fee_total', 10)->nullable();
            $table->decimal('estimated_referral_fee_per_unit', 10)->nullable();
            $table->decimal('estimated_variable_closing_fee', 10)->nullable();
            $table->decimal('estimated_order_handling_fee_per_order', 10)->nullable();
            $table->decimal('estimated_pick_pack_fee_per_unit', 10)->nullable();
            $table->decimal('estimated_weight_handling_fee_per_unit', 10)->nullable();
            $table->decimal('expected_fulfillment_fee_per_unit', 10)->nullable();
            $table->unsignedBigInteger('changed_by');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['sku', 'amazon_store']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_fba_estimated_fba_fees_txt_data');
    }
};
