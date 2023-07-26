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
        Schema::create('locale', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->boolean('enabled')->default(0);
            $table->timestamps();
        });
        Schema::table(
            'locale', function (Blueprint $table) {
                $table->softDeletes();
            }
        );
        DB::table('locale')->insert(["id" => 1, "name" => 'Español', "code" => 'es', 'enabled' => 1]);
        DB::table('locale')->insert(["id" => 2, "name" => 'Portuguese', "code" => 'pt', 'enabled' => 1]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locale');
    }
};
