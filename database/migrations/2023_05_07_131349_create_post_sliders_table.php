<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image_desktop');
            $table->string('image_mobile');
            $table->string('title1')->nullable();
            $table->text('description1')->nullable();
            $table->string('button_name1')->nullable();
            $table->string('button_link1')->nullable();
            $table->string('title2')->nullable();
            $table->text('description2')->nullable();
            $table->string('button_name2')->nullable();
            $table->string('button_link2')->nullable();
            $table->integer('order');
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
        Schema::dropIfExists('post_sliders');
    }
}
