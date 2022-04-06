<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodeVcardPivotTable extends Migration
{
    public function up()
    {
        Schema::create('qr_code_vcard', function (Blueprint $table) {
            $table->unsignedBigInteger('qr_code_id');
            $table->foreign('qr_code_id', 'qr_code_id_fk_6371491')->references('id')->on('qr_codes')->onDelete('cascade');
            $table->unsignedBigInteger('vcard_id');
            $table->foreign('vcard_id', 'vcard_id_fk_6371491')->references('id')->on('vcards')->onDelete('cascade');
        });
    }
}
