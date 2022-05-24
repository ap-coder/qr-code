<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_code_social_channel', function (Blueprint $table) {
            $table->unsignedBigInteger('qr_code_id');
            $table->foreign('qr_code_id', 'qr_code_id_fk_63714921')->references('id')->on('qr_codes')->onDelete('cascade');
            $table->unsignedBigInteger('social_channel_id');
            $table->foreign('social_channel_id', 'social_channel_id_fk_63714921')->references('id')->on('social_channels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qr_code_social_channel');
    }
};
