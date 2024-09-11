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
        Schema::create('upload_file', function (Blueprint $table) {
            $table->bigIncrements('upload_file_id');
            $table->unsignedBigInteger('seller_id')->index('seller_id');
            $table->string('upload_type', 80)->fulltext('upload_type');
            $table->string('upload_file_name', 200);
            $table->string('file_path', 300);
            $table->unsignedTinyInteger('upload_status');
            $table->string('upload_status_txt');
            $table->unsignedTinyInteger('process_status');
            $table->string('process_status_txt');
            $table->unsignedBigInteger('changed_by');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('processed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_file');
    }
};
