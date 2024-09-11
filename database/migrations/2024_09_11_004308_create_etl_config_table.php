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
        Schema::create('etl_config', function (Blueprint $table) {
            $table->bigIncrements('etl_config_id');
            $table->string('report_type', 200)->index('report_type');
            $table->unsignedInteger('channel_id');
            $table->string('last_run_status', 20);
            $table->string('last_report_id', 200)->index('amz_report_id');
            $table->string('last_report_doc', 200);
            $table->string('first_run_hr', 200);
            $table->string('freq_run_min', 20);
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
        Schema::dropIfExists('etl_config');
    }
};
