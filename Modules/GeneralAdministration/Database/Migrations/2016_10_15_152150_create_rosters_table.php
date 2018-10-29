<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('rosters');
        Schema::create('rosters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day',40);
            $table->integer('work_period_id')->unsigned();
            $table->string('room_no',40);
            $table->integer('room_assistant_id')->unsigned()->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('work_period_id')->references('id')->on('work_periods');
            $table->foreign('room_no')->references('room_no')->on('rooms');
            $table->foreign('room_assistant_id')->references('id')->on('room_assistants');
            $table->foreign('doctor_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('rosters');
    }
}
