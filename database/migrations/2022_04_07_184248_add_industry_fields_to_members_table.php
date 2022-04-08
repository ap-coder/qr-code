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
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('industry_id');
            $table->foreign('industry_id', 'industry_id_fk_63710630012')->references('id')->on('qr_industries')->onDelete('cascade');
        });
    }
};
