<?php

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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname', 40);
            $table->string('lname', 40);
            $table->string('gender', 1);
            $table->date('dob')->nullable();
            $table->string('street', 40)->nullable();
            $table->string('city', 40)->nullable();
            $table->integer('role')->unsigned();
            $table->integer('state_id')->nullable()->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('role')->references('id')->on('roles');

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
