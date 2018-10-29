<?php

namespace Modules\Doctor\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('doctors')->insert([
            ['type' => 'v', 'speciality' => 'ear nose throat', 'appointment_price' => 1000.00, 'employee_id' => 1],
            ['type' => 'v', 'speciality' => 'skin specialist', 'appointment_price' => 1200.00, 'employee_id' => 2],
            ['type' => 'v', 'speciality' => 'child specialist', 'appointment_price' => 1500.00, 'employee_id' => 5],
            ['type' => 'p', 'speciality' => 'dentist', 'appointment_price' => 500.00, 'employee_id' => 6]
            
        ]);

        $this->call("Modules\Doctor\Database\Seeders\DoctorWorkPeriodsTableSeeder");
    }
}
