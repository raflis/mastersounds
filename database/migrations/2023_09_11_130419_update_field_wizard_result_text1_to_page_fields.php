<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldWizardResultText1ToPageFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_fields', function (Blueprint $table) {
            $table->text('wizard_result_text1')->nullable()->after('tooltip2');
            $table->text('wizard_result_text2')->nullable()->after('wizard_result_text1');
            $table->text('wizard_result_link1')->nullable()->after('wizard_result_text2');
            $table->text('wizard_result_link2')->nullable()->after('wizard_result_link1');
            $table->text('wizard_result_button1')->nullable()->after('wizard_result_link2');
            $table->text('wizard_result_button2')->nullable()->after('wizard_result_button1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_fields', function (Blueprint $table) {
            //
        });
    }
}
