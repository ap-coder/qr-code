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
        Schema::create('business_page_social', function (Blueprint $table) {
            $table->unsignedBigInteger('business_page_id');
            $table->foreign('business_page_id', 'business_page_id_fk_63714850011')->references('id')->on('business_pages')->onDelete('cascade');
            $table->unsignedBigInteger('social_id');
            $table->foreign('social_id', 'social_id_fk_63714850011')->references('id')->on('socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_page_social');
    }
};
