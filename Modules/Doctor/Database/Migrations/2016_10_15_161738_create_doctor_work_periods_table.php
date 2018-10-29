<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorWorkPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('doctor_work_periods');
        Schema::create('doctor_work_periods', function (Blueprint $table) {
            $table->integer('doctor_id')->unsigned();
            $table->string('day', 3);
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_work_periods');
    }
}
