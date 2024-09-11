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
        Schema::create('xero_preload', function (Blueprint $table) {
            $table->bigIncrements('xero_preload_id');
            $table->string('xero_preload_grp', 20)->index('xero_preload_grp');
            $table->string('channel_name', 20);
            $table->unsignedBigInteger('settlement_id')->index('settlement_id_idx');
            $table->date('settlement_date');
            $table->date('due_date');
            $table->string('line_desc', 100);
            $table->unsignedInteger('line_qty');
            $table->decimal('line_amt', 10);
            $table->string('xero_acct_name', 30);
            $table->string('tax_type', 30);
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
        Schema::dropIfExists('xero_preload');
    }
};
