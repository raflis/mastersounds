<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->biginteger('country_id')->unsigned();
            $table->timestamps();

        });
        Schema::table(
            'contacts', function ($table) {
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
        Schema::dropIfExists('contacts');
    }
}
