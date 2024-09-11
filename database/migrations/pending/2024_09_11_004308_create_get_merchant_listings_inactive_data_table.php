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
        Schema::create('get_merchant_listings_inactive_data', function (Blueprint $table) {
            $table->string('item_name', 200)->nullable();
            $table->string('item_description', 2000)->nullable();
            $table->string('listing_id', 20)->nullable();
            $table->string('seller_sku', 80)->primary();
            $table->decimal('price', 10)->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->date('open_date')->nullable();
            $table->string('image_url', 2048)->nullable();
            $table->string('item_is_marketplace', 1)->nullable();
            $table->bigInteger('product_id_type')->nullable();
            $table->decimal('zshop_shipping_fee', 10)->nullable();
            $table->string('item_note', 2000)->nullable();
            $table->bigInteger('item_condition')->nullable();
            $table->string('zshop_category1', 20)->nullable();
            $table->string('zshop_browse_path', 500)->nullable();
            $table->string('zshop_storefront_feature', 500)->nullable();
            $table->string('asin1', 12)->nullable();
            $table->string('asin2', 12)->nullable();
            $table->string('asin3', 12)->nullable();
            $table->string('will_ship_internationally', 1)->nullable();
            $table->string('expedited_shipping', 1)->nullable();
            $table->string('zshop_boldface', 1)->nullable();
            $table->string('product_id', 12)->nullable();
            $table->decimal('bid_for_featured_placement', 10)->nullable();
            $table->string('add_delete', 10)->nullable();
            $table->bigInteger('pending_quantity')->nullable();
            $table->string('fulfillment_channel', 20)->nullable();
            $table->string('merchant_shipping_group', 200)->nullable();
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
        Schema::dropIfExists('get_merchant_listings_inactive_data');
    }
};
