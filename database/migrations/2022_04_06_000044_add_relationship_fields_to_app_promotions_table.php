<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppPromotionsTable extends Migration
{
    public function up()
    {
        Schema::table('app_promotions', function (Blueprint $table) {
            $table->unsignedBigInteger('colors_id')->nullable();
            $table->foreign('colors_id', 'colors_fk_6381207')->references('id')->on('design_colors');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6381224')->references('id')->on('users');
        });
    }
}
