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
        Schema::create('ship_rate', function (Blueprint $table) {
            $table->bigIncrements('ship_rate_id');
            $table->unsignedInteger('ship_type_id');
            $table->unsignedInteger('ship_oz_max');
            $table->decimal('ship_cost', 10)->unsigned();
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
        Schema::dropIfExists('ship_rate');
    }
};
