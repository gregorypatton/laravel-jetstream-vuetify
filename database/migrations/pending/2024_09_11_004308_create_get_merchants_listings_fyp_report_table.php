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
        Schema::create('get_merchants_listings_fyp_report', function (Blueprint $table) {
            $table->string('status', 50)->nullable();
            $table->string('reason', 200)->nullable();
            $table->string('sku', 80)->primary();
            $table->string('asin', 10)->nullable()->index('asin');
            $table->string('product_name', 200)->nullable();
            $table->string('condition_type', 10)->nullable();
            $table->string('status_change_date', 20)->nullable();
            $table->string('issue_description', 200)->nullable();
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
        Schema::dropIfExists('get_merchants_listings_fyp_report');
    }
};
