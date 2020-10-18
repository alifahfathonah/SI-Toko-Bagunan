<?php

use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            ['name'=>'tosa'     ,'price'=>10000],
            ['name'=>'pickup'   ,'price'=>20000],
            ['name'=>'truk'     ,'price'=>50000],
        ];
        for ($i=0; $i <3 ; $i++) { 
            App\Models\Vehicle::create($vehicles[$i]);
        }
    }
}
