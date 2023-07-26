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
        Schema::create(
            'localetranslate', function (Blueprint $table) {
                $table->id();
                $table->biginteger("localetag_id")->unsigned();
                $table->biginteger("locale_id")->unsigned();
                $table->text("translation");
                $table->timestamps();
                $table->unique(['localetag_id', 'locale_id']);
            }
        );

        Schema::table(
            'localetranslate', function ($table) {
                $table->foreign("localetag_id")->references('id')->on('localetag');
            }
        );
        Schema::table(
            'localetranslate', function ($table) {
                $table->foreign("locale_id")->references('id')->on('locale');
            }
        );

        Schema::table(
            'localetranslate', function (Blueprint $table) {
                $table->softDeletes();
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
        Schema::dropIfExists('localetranslate');
    }
};
