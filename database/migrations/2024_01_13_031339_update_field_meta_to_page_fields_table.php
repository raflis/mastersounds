<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldMetaToPageFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_fields', function (Blueprint $table) {
            $table->json('meta_title')->nullable()->after('wizard_result_button2');
            $table->json('meta_keyword')->nullable()->after('meta_title');
            $table->json('meta_description')->nullable()->after('meta_keyword');
            $table->json('meta_image')->nullable()->after('meta_description');
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
