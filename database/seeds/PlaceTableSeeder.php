<?php
use App\Place;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::insert([
            ["pid"=>1,"pnname"=>"Erfurt"],
            ["pid"=>2,"pnname"=>"Suhl"],
            ["pid"=>3,"pnname"=>"Leipzig"],
            ["pid"=>4,"pnname"=>"Dresden"],
            ["pid"=>5,"pnname"=>"Chemnitz"],
            ["pid"=>6,"pnname"=>"Berlin"]
        ]);
    }
}
