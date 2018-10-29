<?php

namespace Modules\General\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('roles')->insert([
            ['role' => 'doctor'],
            ['role' => 'receptionist'],
            ['role' => 'room_assistant'],
            ['role' => 'system_admin'],
            ['role' => 'general_administrator'],
            ['role' => 'cashier'],
            ['role' => 'patient'],
        ]);
        

        // $this->call("OthersTableSeeder");
    }
}
