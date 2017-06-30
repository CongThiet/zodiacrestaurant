<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('lastName');
            $table->string('name');
            $table->string('address');
            $table->string('birthday')->nullable();
            $table->string('phone');            
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('other_email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('password');
            $table->string('image_avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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