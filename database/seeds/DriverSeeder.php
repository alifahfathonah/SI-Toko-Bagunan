<?php

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=0; $i < 5 ; $i++) { 
            $faker = Faker\Factory::create();
            Driver::create([
                'name'  => $faker->name,
                'phone' => '089809870987' 
            ]);
        }
    }
}
