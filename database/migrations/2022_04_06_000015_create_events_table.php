<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qr_name')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('organizer')->nullable();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->longText('summary')->nullable();
            $table->time('doortime')->nullable();
            $table->datetime('event_date_time')->nullable();
            $table->datetime('end_date')->nullable();
            $table->boolean('all_day')->default(0)->nullable();
            $table->date('signup_deadline')->nullable();
            $table->string('link_1')->nullable();
            $table->string('link_1_text')->nullable();
            $table->string('link_2')->nullable();
            $table->string('link_2_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_icon_class')->nullable();
            $table->string('venue_name')->nullable();
            $table->longText('about')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('slug')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('add_share_button')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
