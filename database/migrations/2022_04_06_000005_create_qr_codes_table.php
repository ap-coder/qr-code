<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrCodesTable extends Migration
{
    public function up()
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->integer('scans')->nullable();
            $table->integer('clicks')->nullable();
            $table->string('short_link')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('pause')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
