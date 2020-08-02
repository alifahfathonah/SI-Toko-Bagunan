<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //path to sql file
         $sql = base_path('database/db_daerah.sql');

         //collect contents and pass to DB::unprepared
         DB::unprepared(file_get_contents($sql));
    }
}
