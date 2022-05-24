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
        Schema::table('social_channels', function (Blueprint $table) {
            $table->boolean('is_sharing')->default(1)->nullable();
            $table->boolean('is_custom_banner')->default(0)->nullable();
            $table->string('primary_color')->nullable();
            $table->string('button_color')->nullable();
            $table->string('headline')->nullable();
            $table->string('banner_color')->nullable();
            $table->string('existing_banner')->nullable();
        });
    }
};
