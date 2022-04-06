<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVideosTable extends Migration
{
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6380751')->references('id')->on('users');
            $table->unsignedBigInteger('design_colors_id')->nullable();
            $table->foreign('design_colors_id', 'design_colors_fk_6380824')->references('id')->on('design_colors');
        });
    }
}
