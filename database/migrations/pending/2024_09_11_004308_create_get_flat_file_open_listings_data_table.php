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
        Schema::create('get_flat_file_open_listings_data', function (Blueprint $table) {
            $table->string('sku', 80)->primary();
            $table->string('asin', 10)->nullable()->index('asin');
            $table->decimal('price', 10)->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->decimal('business_price', 10)->nullable();
            $table->string('quantity_price_type', 10)->nullable();
            $table->bigInteger('quantity_lower_bound_1')->nullable();
            $table->decimal('quantity_price_1', 10)->nullable();
            $table->bigInteger('quantity_lower_bound_2')->nullable();
            $table->decimal('quantity_price_2', 10)->nullable();
            $table->bigInteger('quantity_lower_bound_3')->nullable();
            $table->decimal('quantity_price_3', 10)->nullable();
            $table->bigInteger('quantity_lower_bound_4')->nullable();
            $table->decimal('quantity_price_4', 10)->nullable();
            $table->bigInteger('quantity_lower_bound_5')->nullable();
            $table->decimal('quantity_price_5', 10)->nullable();
            $table->string('progressive_price_type', 10)->nullable();
            $table->decimal('progressive_lower_bound_1', 10)->nullable();
            $table->decimal('progressive_price_1', 10)->nullable();
            $table->decimal('progressive_lower_bound_2', 10)->nullable();
            $table->decimal('progressive_price_2', 10)->nullable();
            $table->decimal('progressive_lower_bound_3', 10)->nullable();
            $table->decimal('progressive_price_3', 10)->nullable();
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
        Schema::dropIfExists('get_flat_file_open_listings_data');
    }
};
