<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_industry', function (Blueprint $table) {
            $table->id();
            
            $table->biginteger('solution_id')->unsigned();
            $table->biginteger('industry_id')->unsigned();
            $table->timestamps();

        });
        Schema::table(
            'solution_industry', function ($table) {
                $table->foreign("solution_id")->references('id')->on('item_solutions');
                $table->foreign("industry_id")->references('id')->on('industry');
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
        Schema::dropIfExists('solution_industry');
    }
}
