<?php

use App\InvRoom;
use Illuminate\Database\Seeder;

class InvRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvRoom::insert([
            ["id"=>1,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.01","altrname"=>""],
            ["id"=>2,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.02","altrname"=>""],
            ["id"=>3,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.03","altrname"=>""],
            ["id"=>4,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.04","altrname"=>""],
            ["id"=>5,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.05","altrname"=>""],
            ["id"=>6,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.07","altrname"=>""],
            ["id"=>7,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.08","altrname"=>""],
            ["id"=>8,"place_id"=>1,"location_id"=>1,"etage"=>2,"rname"=>"2.01","altrname"=>""],
            ["id"=>9,"place_id"=>1,"location_id"=>1,"etage"=>2,"rname"=>"2.02","altrname"=>""],
            ["id"=>10,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"","altrname"=>"Ohne Name"],
            ["id"=>11,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"2.04","altrname"=>""],
            ["id"=>12,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"2.05","altrname"=>""],
            ["id"=>13,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"2.06","altrname"=>""]
        ]);
    }
}
