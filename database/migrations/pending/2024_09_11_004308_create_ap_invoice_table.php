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
        Schema::create('ap_invoice', function (Blueprint $table) {
            $table->bigIncrements('invoice_id');
            $table->unsignedBigInteger('po_id')->index('po_id');
            $table->string('invoice_nbr', 20)->index('invoice_nbr');
            $table->date('invoice_date');
            $table->decimal('goods_amt', 10)->unsigned();
            $table->decimal('services_amt', 10, 0)->unsigned();
            $table->decimal('due_amt', 10)->unsigned();
            $table->date('due_date');
            $table->unsignedBigInteger('status_id');
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
        Schema::dropIfExists('ap_invoice');
    }
};
