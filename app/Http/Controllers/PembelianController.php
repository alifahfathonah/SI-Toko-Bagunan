<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function daftar()
    {
        return view('pembelian/daftar_pembelian');
    }
    public function tambah()
    {
        return view('pembelian/tambah_pembelian');
    }
}
