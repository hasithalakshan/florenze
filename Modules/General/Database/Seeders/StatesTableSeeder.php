<?php

namespace Modules\General\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        DB::table('states')->insert([
            ['name' => 'western'],
            ['name' => 'eastern'],
            ['name' => 'southern'],
            ['name' => 'northern'],
            ['name' => 'north eastern'],
            ['name' => 'central'],
        ]);
        
        $this->call("Modules\General\Database\Seeders\RolesTableSeeder");
    }
}
