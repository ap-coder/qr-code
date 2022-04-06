<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('image_galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0)->nullable();
            $table->string('qr_name')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('website')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_icon_class')->nullable();
            $table->string('button_link')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
