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
        Schema::create('po', function (Blueprint $table) {
            $table->bigIncrements('po_id');
            $table->string('po_nbr', 20)->fulltext('po_nbr');
            $table->date('po_date');
            $table->decimal('po_amt', 10)->unsigned();
            $table->unsignedBigInteger('supplier_id')->index('supplier_id');
            $table->unsignedBigInteger('buyer_loc_id');
            $table->unsignedBigInteger('supplier_loc_id');
            $table->unsignedBigInteger('bill_to_loc_id');
            $table->unsignedBigInteger('ship_to_loc_id');
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
        Schema::dropIfExists('po');
    }
};
