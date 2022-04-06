<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialSocialChannelPivotTable extends Migration
{
    public function up()
    {
        Schema::create('social_social_channel', function (Blueprint $table) {
            $table->unsignedBigInteger('social_channel_id');
            $table->foreign('social_channel_id', 'social_channel_id_fk_6371485')->references('id')->on('social_channels')->onDelete('cascade');
            $table->unsignedBigInteger('social_id');
            $table->foreign('social_id', 'social_id_fk_6371485')->references('id')->on('socials')->onDelete('cascade');
        });
    }
}
