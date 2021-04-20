<?php

use App\Role;
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
        ["id"=>1,"name"=>"normal"],
        ["id"=>2,"name"=>"normal2"],
        ["id"=>3,"name"=>"normal3"],
        ["id"=>4,"name"=>"normal4"],
        ["id"=>5,"name"=>"normal5"],
        ["id"=>6,"name"=>"Checker"],
        ["id"=>7,"name"=>"Verwaltung"],
        ["id"=>8,"name"=>"Admin"],
        ["id"=>9,"name"=>"Super Admin"],
    ]);
    }
}
