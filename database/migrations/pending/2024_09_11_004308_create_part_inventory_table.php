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
        Schema::create('part_inventory', function (Blueprint $table) {
            $table->bigIncrements('part_inventory_id');
            $table->unsignedBigInteger('part_id');
            $table->string('slot_name', 50);
            $table->unsignedBigInteger('inventory_qty');
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
        Schema::dropIfExists('part_inventory');
    }
};
