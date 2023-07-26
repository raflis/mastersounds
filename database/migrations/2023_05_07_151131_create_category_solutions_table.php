<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('name1');
            $table->string('name2');
            $table->string('icon');
            $table->string('iconwizard');
            $table->text('description1');
            $table->text('description2');
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
        Schema::dropIfExists('category_solutions');
    }
}
