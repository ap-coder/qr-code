<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrColorsTable extends Migration
{
    public function up()
    {
        Schema::create('qr_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color')->nullable();
            $table->string('color_hex')->nullable();
            $table->string('primary')->nullable();
            $table->string('button')->nullable();
            $table->string('gradient')->nullable();
            $table->string('secondary')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
