<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('design_colors_id')->nullable();
            $table->foreign('design_colors_id', 'design_colors_fk_6380852')->references('id')->on('design_colors');
            $table->unsignedBigInteger('venue_address_id')->nullable();
            $table->foreign('venue_address_id', 'venue_address_fk_6380853')->references('id')->on('addresses');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6371682')->references('id')->on('users');
        });
    }
}
