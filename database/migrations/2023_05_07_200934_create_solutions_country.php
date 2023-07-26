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
        Schema::create('solutionscountry', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_solution_id')->unsigned();
            $table->biginteger('country_id')->unsigned();
            $table->timestamps();

            $table->foreign('item_solution_id')->references('id')->on('item_solutions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign("country_id")->references('id')->on('country')->onDelete('cascade')
                ->onUpdate('cascade');;
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
