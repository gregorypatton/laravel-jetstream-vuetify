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
        Schema::create('channel', function (Blueprint $table) {
            $table->increments('channel_id');
            $table->string('channel_name', 20)->fulltext('channel_name');
            $table->string('country_code', 2);
            $table->unsignedBigInteger('seller_id');
            $table->string('iam_user_key', 2048);
            $table->string('iam_user_secret', 2048);
            $table->string('app_lwa_id', 2048);
            $table->string('app_lwa_secret', 2048);
            $table->string('app_refresh_token', 2048);
            $table->string('app_access_token', 2048);
            $table->string('app_host');
            $table->string('app_endpoint');
            $table->string('app_region');
            $table->string('app_mp_id');
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
        Schema::dropIfExists('channel');
    }
};
