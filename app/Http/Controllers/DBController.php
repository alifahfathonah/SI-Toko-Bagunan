<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\DbDumper\Databases\MySql;
class DBController extends Controller
{
    public function backup()
    {
        exec('mysqldump --user=root --password= si_toko_bangunan > filenameofsql.sql');
        // MySql::create()
        // ->setDbName('si_toko_bangunan')
        // ->setUserName('root')
        // ->setPassword('')
        // ->dumpToFile('dumpdfsdf.sql');
    }
}
