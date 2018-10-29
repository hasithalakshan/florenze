<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('users')->insert([
            ['fname' => 'chamika', 'lname' => 'hasantha', 'gender' => 'm','role' => '1'],
            
        ]);
        
        $this->call("Modules\User\Database\Seeders\EmployeesTableSeeder");
    }
}
