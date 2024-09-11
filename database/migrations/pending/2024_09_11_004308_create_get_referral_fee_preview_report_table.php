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
        Schema::create('get_referral_fee_preview_report', function (Blueprint $table) {
            $table->string('seller_sku', 80)->primary();
            $table->string('asin', 10)->nullable()->index('asin');
            $table->string('item_name', 200)->nullable();
            $table->decimal('price', 10)->nullable();
            $table->decimal('estimated_referral_fee_per_item', 10)->nullable();
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
        Schema::dropIfExists('get_referral_fee_preview_report');
    }
};
