<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('administrators')->insert([
            ['employee_id' => 1,'type' => 'system' ],
        ]);

        //$this->call("Modules\User\Database\Seeders\PatientsTableSeeder");
    }
}
