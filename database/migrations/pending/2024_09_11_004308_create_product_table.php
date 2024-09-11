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
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('master_sku')->index('sku');
            $table->string('product_name')->fulltext('product_name');
            $table->decimal('product_cost', 10)->unsigned();
            $table->unsignedInteger('package_qty');
            $table->unsignedBigInteger('man_id');
            $table->unsignedBigInteger('brand_id');
            $table->char('gtin', 14)->index('gtin');
            $table->string('product_desc', 5000);
            $table->string('feature_1', 500);
            $table->string('feature_2', 500);
            $table->string('feature_3', 500);
            $table->string('feature_4', 500);
            $table->string('feature_5', 500);
            $table->string('image_1', 500);
            $table->string('image_2', 500);
            $table->string('image_3', 500);
            $table->string('image_4', 500);
            $table->string('image_5', 500);
            $table->string('image_6', 500);
            $table->string('image_7', 500);
            $table->string('image_8', 500);
            $table->string('image_9', 500);
            $table->string('image_10', 500);
            $table->string('product_tags');
            $table->decimal('ship_length_in', 10)->unsigned();
            $table->decimal('ship_width_in', 10)->unsigned();
            $table->decimal('ship_height_in', 10)->unsigned();
            $table->decimal('ship_weight_oz', 10)->unsigned();
            $table->decimal('map_price', 10)->unsigned();
            $table->decimal('min_markup_pct', 10)->unsigned();
            $table->decimal('max_markup_pct', 10)->unsigned();
            $table->decimal('min_markup_amt', 10)->unsigned();
            $table->decimal('max_markup_amt', 10)->unsigned();
            $table->unsignedInteger('ship_type_id');
            $table->decimal('ship_type_cost', 10)->unsigned();
            $table->unsignedInteger('status_id');
            $table->unsignedBigInteger('seller_id')->index('seller_id');
            $table->unsignedBigInteger('changed_by');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->fullText(['master_sku'], 'sku_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
