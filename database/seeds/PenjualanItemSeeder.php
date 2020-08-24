<?php

use Illuminate\Database\Seeder;
use App\Models\Penjualan;
use App\Models\Product;
use App\Models\PenjualanItem;

class PenjualanItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = Penjualan::all();
        $products = Product::all();
        $faker = Faker\Factory::create();
        foreach ($sales as $sale) {
            $sale_id = $sale->id;
            foreach ($products as $product) {
                switch ($product->nama_produk) {
                    case 'Semen':
                        $unit_id = 3;
                        break;
                    case 'Pasir':
                        $unit_id = 1;
                        break;
                    case 'Besi Cor':
                        $unit_id = 2;
                        break;
                    case 'Galvalum':
                        $unit_id = 4;
                        break;
                    case 'Krikil':
                        $unit_id = 1;
                        break;
                    case 'Cat Tembok':
                        $unit_id = 4;
                        break;
                    default:
                        break;
                }
                PenjualanItem::create([
                    'penjualan_id' => $sale_id,
                    'product_id'   => $product->id,
                    'quantity'     => $faker->randomElement($array = array (10,20,30,40,50)),
                    'unit_id'      => $unit_id,
                    'total'        => 100000
                ]);
            }

        }
    }
}
