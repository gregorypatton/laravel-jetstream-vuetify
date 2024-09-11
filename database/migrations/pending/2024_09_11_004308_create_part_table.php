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
        Schema::create('part', function (Blueprint $table) {
            $table->bigIncrements('part_id');
            $table->string('part_nbr')->fulltext('part_nbr_2');
            $table->string('part_desc')->fulltext('part_desc');
            $table->unsignedBigInteger('part_qty');
            $table->unsignedInteger('min_order_qty1');
            $table->decimal('min_order_cost1', 12, 4)->unsigned();
            $table->unsignedInteger('min_order_qty2');
            $table->decimal('min_order_cost2', 12, 4)->unsigned();
            $table->unsignedInteger('min_order_qty3');
            $table->decimal('min_order_cost3', 12, 4)->unsigned();
            $table->unsignedInteger('lead_days');
            $table->string('fda_listing_nbr', 50);
            $table->string('hsc_code', 20);
            $table->string('hsc_desc', 200);
            $table->unsignedBigInteger('supplier_id')->index('supplier_id');
            $table->unsignedBigInteger('man_id');
            $table->char('origin_country_code', 2);
            $table->unsignedInteger('status_id');
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
        Schema::dropIfExists('part');
    }
};
