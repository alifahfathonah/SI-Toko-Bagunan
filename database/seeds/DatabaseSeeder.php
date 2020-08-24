<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(UserSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(DriverSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PenjualanSeeder::class);
        $this->call(PenjualanItemSeeder::class);
    }
}
