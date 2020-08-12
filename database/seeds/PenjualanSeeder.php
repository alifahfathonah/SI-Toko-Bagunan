<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Penjualan;


class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=0; $i < 10; $i++) { 
            $faker = Faker\Factory::create();
            Penjualan::create([
                'date'           => Carbon::now()->format('Y-m-d'),
                'nama_pembeli'   => $faker->name,
                'alamat_pembeli' => $faker->address,
                'phone'          => '089898765412',

            ]);
        }
       
    }
}
