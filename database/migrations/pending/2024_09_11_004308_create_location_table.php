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
        Schema::create('location', function (Blueprint $table) {
            $table->bigIncrements('location_id');
            $table->string('location_name')->fulltext('location_name');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->char('state_prov_code', 2);
            $table->string('zip');
            $table->string('phone_nbr');
            $table->string('email_address');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedTinyInteger('buyer_ind');
            $table->unsignedTinyInteger('bill_to_ind');
            $table->unsignedTinyInteger('ship_to_ind');
            $table->string('tax_permit');
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
        Schema::dropIfExists('location');
    }
};
