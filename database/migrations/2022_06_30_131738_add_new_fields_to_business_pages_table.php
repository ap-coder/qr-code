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
        Schema::table('business_pages', function (Blueprint $table) {
            $table->string('primary_color')->nullable();
            $table->string('button_color')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id', 'address_fk_6380854001')->references('id')->on('addresses');
        });
    }

};
