<?php

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = ['kg','meter','zak','buah'];

        foreach ($units as $unit) {
            Unit::create([
                'name_unit' => $unit
            ]);
        }
    }
}
