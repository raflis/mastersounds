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
        Schema::create('industry', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('imagewizard');
            $table->timestamps();
        });

        Schema::table(
            'industry', function (Blueprint $table) {
                $table->softDeletes();
            }
        );

        DB::table('industry')->insert(["id" => 1, "name" => 'Financiera']);
        DB::table('industry')->insert(["id" => 2, "name" => 'Telco']);
        DB::table('industry')->insert(["id" => 3, "name" => 'Legal']);
        DB::table('industry')->insert(["id" => 4, "name" => 'Salud']);
        DB::table('industry')->insert(["id" => 5, "name" => 'Energia']);
        DB::table('industry')->insert(["id" => 6, "name" => 'TI']);
        DB::table('industry')->insert(["id" => 7, "name" => 'Manufactura']);
        DB::table('industry')->insert(["id" => 8, "name" => 'Educacion']);
        DB::table('industry')->insert(["id" => 9, "name" => 'Transporte']);
        DB::table('industry')->insert(["id" => 10, "name" => 'Retail']);
        DB::table('industry')->insert(["id" => 11, "name" => 'Otras']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industry');
    }
};
