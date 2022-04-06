<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialVideoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('social_video', function (Blueprint $table) {
            $table->unsignedBigInteger('video_id');
            $table->foreign('video_id', 'video_id_fk_6380825')->references('id')->on('videos')->onDelete('cascade');
            $table->unsignedBigInteger('social_id');
            $table->foreign('social_id', 'social_id_fk_6380825')->references('id')->on('socials')->onDelete('cascade');
        });
    }
}
