<?php

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
          ["id"=>1,"name"=>"view_machines_actuall","guard_name"=>"web"],
          ["id"=>2,"name"=>"view_all_machines","guard_name"=>"web"],
          ["id"=>3,"name"=>"add_machine","guard_name"=>"web"],
          ["id"=>4,"name"=>"add_machine_manually","guard_name"=>"web"],
          ["id"=>5,"name"=>"print_list","guard_name"=>"web"],
          ["id"=>6,"name"=>"print_ticket","guard_name"=>"web"],
          ["id"=>7,"name"=>"move_machine","guard_name"=>"web"],
          ["id"=>8,"name"=>"delete_machine","guard_name"=>"web"],
          ["id"=>9,"name"=>"access_inventory","guard_name"=>"web"],
        ]);
    }
}
