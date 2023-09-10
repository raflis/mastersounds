<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldButton1Button2ToItemSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_solutions', function (Blueprint $table) {
            $table->string('button1')->nullable()->after('podcastlink2');
            $table->string('button2')->nullable()->after('button1');
            $table->string('link_button1')->nullable()->after('button2');
            $table->string('link_button2')->nullable()->after('link_button1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_solutions', function (Blueprint $table) {
            //
        });
    }
}
