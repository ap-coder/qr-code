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
        Schema::create('social_vcards', function (Blueprint $table) {
            $table->unsignedBigInteger('vcard_id');
            $table->foreign('vcard_id', 'vcard_id_fk_637148500')->references('id')->on('vcards')->onDelete('cascade');
            $table->unsignedBigInteger('social_id');
            $table->foreign('social_id', 'social_id_fk_637148500')->references('id')->on('socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_vcards');
    }
};
