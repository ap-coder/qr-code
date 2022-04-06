<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodeWebsitePivotTable extends Migration
{
    public function up()
    {
        Schema::create('qr_code_website', function (Blueprint $table) {
            $table->unsignedBigInteger('qr_code_id');
            $table->foreign('qr_code_id', 'qr_code_id_fk_6371492')->references('id')->on('qr_codes')->onDelete('cascade');
            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id', 'website_id_fk_6371492')->references('id')->on('websites')->onDelete('cascade');
        });
    }
}
