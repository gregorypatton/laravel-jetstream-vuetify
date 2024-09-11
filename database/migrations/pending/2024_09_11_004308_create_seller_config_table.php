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
        Schema::create('seller_config', function (Blueprint $table) {
            $table->bigIncrements('config_id');
            $table->decimal('avg_pallet_ship_cost', 10)->unsigned();
            $table->decimal('ss_pick_pack_cost', 10)->unsigned();
            $table->decimal('min_margin_pct', 10)->unsigned();
            $table->decimal('max_margin_pct', 10)->unsigned();
            $table->decimal('min_margin_amt', 10)->unsigned();
            $table->decimal('max_margin_amt', 10)->unsigned();
            $table->bigInteger('seller_id')->index('seller_id');
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
        Schema::dropIfExists('seller_config');
    }
};
