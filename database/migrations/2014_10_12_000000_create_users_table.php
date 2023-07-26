<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->default('1');
            $table->string('name');
            $table->string('lastname');
            $table->string('avatar')->default('avatar.png');
            $table->string('email')->unique();
            $table->json('permissions')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $perms = ["pagefields.logos","pagefields.home","pagefields.social","pagefields.files","users.index","users.create","users.edit","users.delete","users.permissions","home_sliders.index","home_sliders.create","home_sliders.edit","home_sliders.delete","solution_sliders.index","solution_sliders.create","solution_sliders.edit","solution_sliders.delete","episode_sliders.index","episode_sliders.create","episode_sliders.edit","episode_sliders.delete","post_sliders.index","post_sliders.create","post_sliders.edit","post_sliders.delete","category_solutions.index","category_solutions.create","category_solutions.edit","category_solutions.delete","item_solutions.index","item_solutions.create","item_solutions.edit","item_solutions.delete","category_episodes.index","category_episodes.create","category_episodes.edit","category_episodes.delete","item_episodes.index","item_episodes.create","item_episodes.edit","item_episodes.delete","category_posts.index","category_posts.create","category_posts.edit","category_posts.delete","item_posts.index","item_posts.create","item_posts.edit","item_posts.delete","records.index","records.excel"];
        DB::table('users')->insert(["name"=>"Brede","lastname"=>"Basualdo","email"=> 'hola@brede.cl', "permissions"=>json_encode($perms),"password"=>bcrypt("Demo.1234!!")]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
