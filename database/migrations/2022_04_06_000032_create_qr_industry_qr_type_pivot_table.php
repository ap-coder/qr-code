<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrIndustryQrTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('qr_industry_qr_type', function (Blueprint $table) {
            $table->unsignedBigInteger('qr_type_id');
            $table->foreign('qr_type_id', 'qr_type_id_fk_6371532')->references('id')->on('qr_types')->onDelete('cascade');
            $table->unsignedBigInteger('qr_industry_id');
            $table->foreign('qr_industry_id', 'qr_industry_id_fk_6371532')->references('id')->on('qr_industries')->onDelete('cascade');
        });
    }
}
