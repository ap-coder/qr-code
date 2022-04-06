<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignColorsTable extends Migration
{
    public function up()
    {
        Schema::create('design_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('primary')->nullable();
            $table->string('button')->nullable();
            $table->string('secondary')->nullable();
            $table->string('gradient')->nullable();
            $table->string('custom_color')->nullable();
            $table->string('custom_button')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
