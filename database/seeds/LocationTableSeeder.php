<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::insert([
            ["locid"=>1,"pid"=>1,"address"=>"Heinrichstrasse 89"],
            ["locid"=>2,"pid"=>1,"address"=>"Heinrichstrasse 92"],
            ["locid"=>3,"pid"=>1,"address"=>"Ottostrasse 35"],
            ["locid"=>4,"pid"=>1,"address"=>"Barbarossahof 4/5"],
            ["locid"=>5,"pid"=>1,"address"=>"Barbarossahof 2"],
            ["locid"=>6,"pid"=>1,"address"=>"Barbarossahof 18"],
            ["locid"=>7,"pid"=>1,"address"=>"Barbarossahof 1"],
            ["locid"=>8,"pid"=>2,"address"=>"Puschkinstrasse 1"],
            ["locid"=>9,"pid"=>2,"address"=>"Blücherstrasse 6"],
            ["locid"=>10,"pid"=>3,"address"=>"Landsberger Strasse 23"],
            ["locid"=>11,"pid"=>3,"address"=>"Landsberger Strasse 4"],
            ["locid"=>12,"pid"=>3,"address"=>"Franz-Mehring-Strasse 3"],
            ["locid"=>13,"pid"=>4,"address"=>"Löscherstrasse 16"],
            ["locid"=>14,"pid"=>4,"address"=>"Mendelssohnallee 18"],
            ["locid"=>15,"pid"=>4,"address"=>"Glashütter Strasse 101"],
            ["locid"=>16,"pid"=>4,"address"=>"Glashütter Strasse 101A"],
            ["locid"=>17,"pid"=>5,"address"=>"Parkstrasse 28"],
            ["locid"=>18,"pid"=>5,"address"=>"Barbarossastrasse 2"],
            ["locid"=>19,"pid"=>6,"address"=>"Trachenbergring 93"]
        ]);
    }
}
