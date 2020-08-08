<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    //
    public function index()
    {
        //
        return view('pengiriman/daftar_pengiriman');
    }
    public function cetak_invoice()
    {
        //
        return view('pengiriman/cetak_invoice');
    }
}
