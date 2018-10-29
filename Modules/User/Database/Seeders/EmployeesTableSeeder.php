<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('employees')->insert([
            ['password' => Hash::make('mypwd'), 'user_id' => 1],
            
        ]);
        
        $this->call("Modules\User\Database\Seeders\AdministratorsTableSeeder");
    }
}
