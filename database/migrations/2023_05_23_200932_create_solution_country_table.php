<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_country', function (Blueprint $table) {
            $table->id();
            
            $table->biginteger('solution_id')->unsigned();
            $table->biginteger('country_id')->unsigned();
            $table->timestamps();

        });
        Schema::table(
            'solution_country', function ($table) {
                $table->foreign("solution_id")->references('id')->on('item_solutions');
                $table->foreign("country_id")->references('id')->on('country');
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
        Schema::dropIfExists('solution_country');
    }
}
