<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_feature_icons', function (Blueprint $table) {
            $table->id();
            $table->integer('feature_icon_id');
            $table->unsignedBigInteger('business_page_id')->nullable();
            $table->foreign('business_page_id', 'business_page_fk_63808542121')->references('id')->on('business_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_feature_icons');
    }
};
