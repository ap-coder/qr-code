<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPageHourPivotTable extends Migration
{
    public function up()
    {
        Schema::create('business_page_hour', function (Blueprint $table) {
            $table->unsignedBigInteger('business_page_id');
            $table->foreign('business_page_id', 'business_page_id_fk_6371451')->references('id')->on('business_pages')->onDelete('cascade');
            $table->unsignedBigInteger('hour_id');
            $table->foreign('hour_id', 'hour_id_fk_6371451')->references('id')->on('hours')->onDelete('cascade');
        });
    }
}
