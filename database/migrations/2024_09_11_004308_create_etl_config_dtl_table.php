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
        Schema::create('etl_config_dtl', function (Blueprint $table) {
            $table->bigIncrements('etl_config_dtl_id');
            $table->string('col_name', 200);
            $table->string('col_type', 20);
            $table->unsignedSmallInteger('col_length');
            $table->string('col_index', 12)->nullable();
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
        Schema::dropIfExists('etl_config_dtl');
    }
};
