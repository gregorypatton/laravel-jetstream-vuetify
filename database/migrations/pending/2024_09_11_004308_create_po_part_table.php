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
        Schema::create('po_part', function (Blueprint $table) {
            $table->bigIncrements('po_part_id');
            $table->unsignedBigInteger('po_id')->index('po_id');
            $table->unsignedBigInteger('part_id')->index('part_id');
            $table->decimal('part_cost', 12, 4)->unsigned();
            $table->unsignedBigInteger('order_qty');
            $table->decimal('order_amt', 10)->unsigned();
            $table->unsignedBigInteger('invoiced_qty');
            $table->unsignedBigInteger('received_qty');
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
        Schema::dropIfExists('po_part');
    }
};
