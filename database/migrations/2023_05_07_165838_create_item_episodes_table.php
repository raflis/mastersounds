<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_episodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_episode_id')->unsigned();
            $table->bigInteger('locale_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('body');
            $table->string('link0');
            $table->string('link1');
            $table->string('link2');
            $table->string('link3');
            $table->string('link4');
            $table->string('autor_name');
            $table->string('autor_image');
            $table->datetime('date');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('category_episode_id')->references('id')->on('category_episodes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('locale_id')->references('id')->on('locale')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_episodes');
    }
}
