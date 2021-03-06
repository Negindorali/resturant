<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles= json_encode(array_filter(explode("\n",file_get_contents("role"))));
        DB::table('roles')->insert([
           [
               'name'=>"admin",
               'scope'=>$roles
           ],
            [
                'name'=>"user",
                'scope'=>"[]"
            ],
        ]);
    }
}
