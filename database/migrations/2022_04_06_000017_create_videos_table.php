<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0)->nullable();
            $table->string('qr_name')->nullable();
            $table->string('title')->nullable();
            $table->string('headline')->nullable();
            $table->string('video_link')->nullable();
            $table->longText('description')->nullable();
            $table->string('company')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_icon_class')->nullable();
            $table->string('button_link')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
