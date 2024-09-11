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
        Schema::create('supplier', function (Blueprint $table) {
            $table->bigIncrements('supplier_id');
            $table->string('supplier_name')->fulltext('supplier_name');
            $table->string('website');
            $table->string('account');
            $table->string('phone', 80);
            $table->string('fax', 15);
            $table->string('payment_terms');
            $table->boolean('free_ship_ind');
            $table->decimal('free_ship_min', 10)->unsigned();
            $table->unsignedBigInteger('seller_id')->index('seller_id');
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
        Schema::dropIfExists('supplier');
    }
};
