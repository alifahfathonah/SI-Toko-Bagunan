<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function daftar_supplier()
    {
        return view('supplier/daftar_supplier');
    }
    public function tambah_supplier()
    {
        return view('supplier/tambah_supplier');
    }
    public function daftar_sales()
    {
        return view('supplier/daftar_sales');
    }
    public function tambah_sales()
    {
        return view('supplier/tambah_sales');
    }
}
