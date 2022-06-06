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
        Schema::table('vcards', function (Blueprint $table) {
            $table->boolean('is_sharing')->default(1)->nullable();
            $table->boolean('is_direction_show')->default(0)->nullable();
            $table->boolean('is_show_gradient')->default(0)->nullable();
            $table->string('gradient_color')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('button_color')->nullable();
            $table->string('designation')->nullable();
        });
    }
};
