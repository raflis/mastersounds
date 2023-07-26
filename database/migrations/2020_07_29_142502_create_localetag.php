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
        Schema::create('localetag', function (Blueprint $table) {
            $table->id();
            $table->string("module");
            $table->string("action");
            $table->string("tag");
            $table->timestamps();
            $table->unique(['module', 'action', 'tag']);
        });
        Schema::table(
            'localetag', function (Blueprint $table) {
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
        Schema::dropIfExists('localetag');
    }
};
