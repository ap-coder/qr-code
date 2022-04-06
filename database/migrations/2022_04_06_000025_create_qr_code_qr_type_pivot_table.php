<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodeQrTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('qr_code_qr_type', function (Blueprint $table) {
            $table->unsignedBigInteger('qr_code_id');
            $table->foreign('qr_code_id', 'qr_code_id_fk_6371525')->references('id')->on('qr_codes')->onDelete('cascade');
            $table->unsignedBigInteger('qr_type_id');
            $table->foreign('qr_type_id', 'qr_type_id_fk_6371525')->references('id')->on('qr_types')->onDelete('cascade');
        });
    }
}
