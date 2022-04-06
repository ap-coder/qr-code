<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDownloadsTable extends Migration
{
    public function up()
    {
        Schema::table('downloads', function (Blueprint $table) {
            $table->unsignedBigInteger('qr_color_id')->nullable();
            $table->foreign('qr_color_id', 'qr_color_fk_6380898')->references('id')->on('qr_colors');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6380902')->references('id')->on('users');
        });
    }
}
