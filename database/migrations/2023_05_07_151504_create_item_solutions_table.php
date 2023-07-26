<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_solutions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_solution_id')->unsigned();
            $table->string('name');
            
            $table->string('slider');
            $table->text('description1');
            $table->text('description2');
            $table->text('body1');
            $table->text('body2');
            $table->json('details')->nullable();
            
            $table->string('pdf1');
            $table->string('pdf2');
            $table->text('podcast1');
            $table->text('podcast2');
            $table->string('podcastlink1');
            $table->string('podcastlink2');
            $table->integer('order');
            $table->integer('minuserforsale')->default(1);
      
            $table->timestamps();

            $table->foreign('category_solution_id')->references('id')->on('category_solutions')
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
        Schema::dropIfExists('item_solutions');
    }
}
