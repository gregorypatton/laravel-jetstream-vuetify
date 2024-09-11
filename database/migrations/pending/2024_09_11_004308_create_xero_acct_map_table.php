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
        Schema::create('xero_acct_map', function (Blueprint $table) {
            $table->increments('xero_acct_map_id');
            $table->string('transaction_type', 30);
            $table->string('amount_type', 50);
            $table->string('amount_desc', 100);
            $table->string('xero_acct', 10);
            $table->string('xero_acct_name', 100);
            $table->string('tax_type', 50);
            $table->unsignedBigInteger('seller_id');
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
        Schema::dropIfExists('xero_acct_map');
    }
};
