<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function daftar()
    {
        return view('barang/daftar_barang');
    }
    public function tambah()
    {
        return view('barang/tambah_barang');
    }
}
