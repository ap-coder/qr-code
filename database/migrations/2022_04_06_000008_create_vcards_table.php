<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVcardsTable extends Migration
{
    public function up()
    {
        Schema::create('vcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0)->nullable();
            $table->string('qr_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('title')->nullable();
            $table->longText('summary')->nullable();
            $table->string('company')->nullable();
            $table->string('headline')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_lnk')->nullable();
            $table->longText('about')->nullable();
            $table->string('email')->nullable();
            $table->string('website_link')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
