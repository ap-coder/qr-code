<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('app_promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0)->nullable();
            $table->string('qr_name')->nullable();
            $table->string('app_name')->nullable();
            $table->string('developer')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('website')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_icon_class')->nullable();
            $table->string('apple_store_link')->nullable();
            $table->string('google_play_link')->nullable();
            $table->string('amazon_app_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
