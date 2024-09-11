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
        Schema::create('wmt_settlement', function (Blueprint $table) {
            $table->bigIncrements('settlement_key');
            $table->unsignedInteger('status_id');
            $table->unsignedBigInteger('settlement_id')->index('settlement_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('deposit_date');
            $table->decimal('deposit_amt', 10)->unsigned();
            $table->string('currency', 3);
            $table->string('transaction_type', 30);
            $table->string('order_id', 19)->index('order_id');
            $table->string('marketplace_name', 30);
            $table->string('amount_type', 50);
            $table->string('amount_desc', 100);
            $table->decimal('transaction_amt', 10);
            $table->string('fulfillment_type', 30);
            $table->date('posted_date');
            $table->string('sku', 100)->index('sku');
            $table->integer('purchase_qty');

            $table->index(['settlement_id'], 'settlement_id_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wmt_settlement');
    }
};
