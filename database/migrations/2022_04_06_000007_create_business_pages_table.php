<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPagesTable extends Migration
{
    public function up()
    {
        Schema::create('business_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0)->nullable();
            $table->string('qr_name')->nullable();
            $table->string('company')->nullable();
            $table->string('headline')->nullable();
            $table->longText('summary')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_lnk')->nullable();
            $table->longText('about')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website_link')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
