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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('lng')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('main_page')->nullable();
            $table->integer('sort')->nullable();
            $table->string('header_img')->nullable();
            $table->string('disable_header')->default(0);
            $table->string('header_title')->nullable();
            $table->string('header_desc')->nullable();
            $table->string('arrow')->default(0);
            $table->string('buttons')->default(0);
            $table->string('left_button')->nullable();
            $table->string('left_button_link')->nullable();
            $table->string('right_button')->nullable();
            $table->string('right_button_link')->nullable();
            $table->string('button_yellow')->default(0);
            $table->string('button_blue')->default(0);
            $table->text('content')->nullable();
            $table->string('additional_options')->nullable();
            $table->string('info_refugees')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
