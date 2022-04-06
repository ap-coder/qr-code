<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('social_name')->nullable();
            $table->string('url')->nullable();
            $table->string('channel_name')->nullable();
            $table->string('icon_class')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
