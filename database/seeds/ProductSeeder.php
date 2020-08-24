<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['Semen','Pasir','Besi Cor','Galvalum','Krikil','Cat Tembok'];
        foreach ($products as $product) {
            Product::create([
                'nama_produk' => $product
            ]);
        }
    }
}
