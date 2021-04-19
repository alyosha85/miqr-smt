<?php

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::insert([
        ["id"=>1,"name"=>"normal","guard_name"=>"web"],
        ["id"=>2,"name"=>"normal2","guard_name"=>"web"],
        ["id"=>3,"name"=>"normal3","guard_name"=>"web"],
        ["id"=>4,"name"=>"normal4","guard_name"=>"web"],
        ["id"=>5,"name"=>"normal5","guard_name"=>"web"],
        ["id"=>6,"name"=>"Checker","guard_name"=>"web"],
        ["id"=>7,"name"=>"Verwaltung","guard_name"=>"web"],
        ["id"=>8,"name"=>"Admin","guard_name"=>"web"],
        ["id"=>9,"name"=>"Super Admin","guard_name"=>"web"],
    ]);
    }
}
