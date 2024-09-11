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
        Schema::create('amz_settlement_sum', function (Blueprint $table) {
            $table->unsignedBigInteger('settlement_id')->primary();
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('settlement_amt', 10);
            $table->string('currency', 10);
            $table->decimal('usd_deposit_amt', 10);
            $table->decimal('usd_cogs_amt', 10);
            $table->decimal('usd_margin_amt', 10);
            $table->string('xero_file1', 200);
            $table->string('xero_file2', 200);
            $table->unsignedSmallInteger('status_id');
            $table->string('status_message', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amz_settlement_sum');
    }
};
