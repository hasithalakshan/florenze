<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('patients')->insert([
            ['user_id' => 1],
            ['user_id' => 5],
            ['user_id' => 6],
            ['user_id' => 10]
        ]);

        // $this->call("OthersTableSeeder");
    }
}
