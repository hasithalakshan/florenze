<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('doctors');
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 1);
            $table->string('speciality', 40)->default('none');
            $table->double('appointment_price', 6, 2)->nullable();
            $table->integer('employee_id')->unsigned();
            $table->string('room_no', 5)->nullable();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('room_no')->references('room_no')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
