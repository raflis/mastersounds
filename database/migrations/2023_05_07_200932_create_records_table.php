<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_solution_id')->unsigned();
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('company');
            $table->biginteger('country_id')->unsigned();
            $table->timestamps();

            $table->foreign('item_solution_id')->references('id')->on('item_solutions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table(
            'records', function ($table) {
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
        Schema::dropIfExists('records');
    }
}
