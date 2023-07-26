<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_post_id')->unsigned();
            $table->string('name1');
            $table->string('name2');
            $table->string('slug');
            $table->string('image');
            $table->text('body1');
            $table->text('body2');
            $table->datetime('date');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('category_post_id')->references('id')->on('category_posts')
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
        Schema::dropIfExists('item_posts');
    }
}
