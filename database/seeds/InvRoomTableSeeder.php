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
            // ["id"=>1,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.01","altrname"=>""],
            // ["id"=>2,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.02","altrname"=>""],
            // ["id"=>3,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.03","altrname"=>""],
            // ["id"=>4,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.04","altrname"=>""],
            // ["id"=>5,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.05","altrname"=>""],
            // ["id"=>6,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.07","altrname"=>""],
            // ["id"=>7,"place_id"=>1,"location_id"=>1,"etage"=>1,"rname"=>"1.08","altrname"=>""],
            // ["id"=>8,"place_id"=>1,"location_id"=>1,"etage"=>2,"rname"=>"2.01","altrname"=>""],
            // ["id"=>9,"place_id"=>1,"location_id"=>1,"etage"=>2,"rname"=>"2.02","altrname"=>""],
            // ["id"=>10,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"","altrname"=>"Ohne Name"],
            // ["id"=>11,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"2.04","altrname"=>""],
            // ["id"=>12,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"2.05","altrname"=>""],
            // ["id"=>13,"place_id"=>1,"location_id"=>1,"etage"=>3,"rname"=>"2.06","altrname"=>""],
            //TODO: Real Rooms Chemnitz Parkstrasse 28
            ["id"=> 5001,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.01,"altrname"=> "IT"],
            ["id"=> 5002,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.02,"altrname"=> "KBM 7"],
            ["id"=> 5003,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.03,"altrname"=> "Dozenten"],
            ["id"=> 5004,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.04,"altrname"=> "APO/FOSI"],
            ["id"=> 5005,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.05,"altrname"=> ""],
            ["id"=> 5006,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.12,"altrname"=> "KBM 6"],
            ["id"=> 5007,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.13,"altrname"=> "E-COM"],
            ["id"=> 5008,"place_id"=> 5,"location_id"=> 17,"etage"=> "EG","rname"=> 0.14,"altrname"=> "KBM 8 "],
            ["id"=> 5009,"place_id"=> 5,"location_id"=> 17,"etage"=> "5","rname"=> 5.03,"altrname"=> "OSI / IBO"],
            ["id"=> 5010,"place_id"=> 5,"location_id"=> 17,"etage"=> "5","rname"=> 5.04,"altrname"=> "Sekretariat"],
            ["id"=> 5011,"place_id"=> 5,"location_id"=> 17,"etage"=> "5","rname"=> 5.05,"altrname"=> ""],
            ["id"=> 5012,"place_id"=> 5,"location_id"=> 17,"etage"=> "5","rname"=> 5.06,"altrname"=> "Büro Lorenz"],
            ["id"=> 5013,"place_id"=> 5,"location_id"=> 17,"etage"=> "5","rname"=> 5.08,"altrname"=> "Serverraum"],
            ["id"=> 5014,"place_id"=> 5,"location_id"=> 17,"etage"=> "5","rname"=> 5.1,"altrname"=> "BPW"],
            ["id"=> 5015,"place_id"=> 5,"location_id"=> 17,"etage"=> "5","rname"=> 5.11,"altrname"=> "KBM 9"]
        ]);
    }
}
