<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class PengirimanItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengiriman = App\Models\Shipping::all();
        $items      = [
                        ['nama' => 'semen','unit'=>'sak'  ,'jumlahItem'=>20],
                        ['nama' => 'besi' ,'unit'=>'meter','jumlahItem'=>10],
                        ['nama' => 'pasir','unit'=>'meter3' ,'jumlahItem'=>5],
                        ['nama' => 'koral','unit'=>'meter3' ,'jumlahItem'=>5],
                        ['nama' => 'batu bata','unit'=>'each' ,'jumlahItem'=>500],

        ]; 

        foreach ($pengiriman as $delivery) {
            $pengirimanItem = [];
            for ($i=0; $i < 5 ; $i++) { 
                # code...
                $unit = App\Models\Unit::firstOrCreate(['name_unit' => $items[$i]['unit']]);
                $product = App\Models\Product::firstOrCreate(['nama_produk' => $items[$i]['nama']]);
                $pengirimanItem[] = [
                    "pengiriman_id"   => $delivery->id,
                    "product_id"     => $product->id,
                    "unit_id"       => $unit->id,
                    "quantity"      => $items[$i]['jumlahItem'],
                    "unit_price"    => 20000,
                    "total"         => 100000,
                    "created_at"     => Carbon::now(),
                    "updated_at"     => Carbon::now(),
                ];
            }
            
    
            App\Models\PengirimanItem::insert($pengirimanItem);
        }
    }
}
