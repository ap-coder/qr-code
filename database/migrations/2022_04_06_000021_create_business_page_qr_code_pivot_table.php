<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPageQrCodePivotTable extends Migration
{
    public function up()
    {
        Schema::create('business_page_qr_code', function (Blueprint $table) {
            $table->unsignedBigInteger('qr_code_id');
            $table->foreign('qr_code_id', 'qr_code_id_fk_6371489')->references('id')->on('qr_codes')->onDelete('cascade');
            $table->unsignedBigInteger('business_page_id');
            $table->foreign('business_page_id', 'business_page_id_fk_6371489')->references('id')->on('business_pages')->onDelete('cascade');
        });
    }
}
