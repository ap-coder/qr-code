<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrTypesTable extends Migration
{
    public function up()
    {
        Schema::create('qr_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('select_type')->nullable();
            $table->string('icon_class')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
