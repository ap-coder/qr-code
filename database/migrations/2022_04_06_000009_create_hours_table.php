<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoursTable extends Migration
{
    public function up()
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day')->nullable();
            $table->time('open_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->string('time_of_day')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
