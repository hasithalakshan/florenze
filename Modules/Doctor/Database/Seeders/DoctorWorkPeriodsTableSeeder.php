<?php

namespace Modules\Doctor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DoctorWorkPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('doctor_work_periods')->insert([
            ['doctor_id' => 1, 'day' => 'WED', 'start_time' => '15:30', 'end_time' => '20:00'],
            ['doctor_id' => 2, 'day' => 'TUE', 'start_time' => '15:30', 'end_time' => '20:00'],
            ['doctor_id' => 2, 'day' => 'SAT', 'start_time' => '13:30', 'end_time' => '16:00'],
            ['doctor_id' => 3, 'day' => 'SUN', 'start_time' => '08:30', 'end_time' => '18:00'],
            ['doctor_id' => 4, 'day' => 'MON', 'start_time' => '09:30', 'end_time' => '18:00'],
            ['doctor_id' => 4, 'day' => 'TUE', 'start_time' => '09:30', 'end_time' => '18:00'],
            ['doctor_id' => 4, 'day' => 'WED', 'start_time' => '09:30', 'end_time' => '18:00'],
            ['doctor_id' => 4, 'day' => 'THU', 'start_time' => '09:30', 'end_time' => '18:00'],
            ['doctor_id' => 4, 'day' => 'FRI', 'start_time' => '09:30', 'end_time' => '18:00'],
            ['doctor_id' => 4, 'day' => 'SAT', 'start_time' => '13:30', 'end_time' => '18:00'],
        ]);

        
    }
}
