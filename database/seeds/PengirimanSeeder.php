<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Shipping;


class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=0; $i < 50; $i++) { 
            # code...
            $faker = Faker\Factory::create();
            
            $data = [
                'tanggal_pengiriman'    => Carbon::now()->format('Y-m-d'),
                'nama_pembeli'          => $faker->name,
                'alamat_pembeli'        => 'bangkalan',
                'phone'                 => '0819878542',
                'grandtotal'            => '100000',
                'prioritas'             => 'normal',
                'status'                => 'pending',
            ];
            
    
            $shipping = Shipping::create($data);
        }
    }
}
