<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\DbDumper\Databases\MySql;
use Carbon\Carbon;

class DBController extends Controller
{
    public function backup()
    {
        $DB_NAME = env('DB_DATABASE');
        $DB_USER = env('DB_USERNAME');
        $DB_PASSWORD = env('DB_PASSWORD');

        $filename = public_path().'\backup_db_'.Carbon::now()->format('Y-m-d_H_i').'.sql';
        $command = 'C:/xampp/mysql/bin/mysqldump --user='.$DB_USER.' --password='.$DB_PASSWORD.' '.$DB_NAME.' > '.$filename;
        try {
            exec($command);
            return redirect()->route('home')->with(['success'=>$filename]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with(['error'=>'error']);
        }
        
    }
}
