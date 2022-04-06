<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourVcardPivotTable extends Migration
{
    public function up()
    {
        Schema::create('hour_vcard', function (Blueprint $table) {
            $table->unsignedBigInteger('vcard_id');
            $table->foreign('vcard_id', 'vcard_id_fk_6371452')->references('id')->on('vcards')->onDelete('cascade');
            $table->unsignedBigInteger('hour_id');
            $table->foreign('hour_id', 'hour_id_fk_6371452')->references('id')->on('hours')->onDelete('cascade');
        });
    }
}
