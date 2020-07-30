<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Sales;
use App\Models\Purchase;

class AuthController extends Controller
{

    public function index()
    {
        return view('users/login');
    }
    public function login()
    {
        $purchaseCount = Purchase::count();
        $supplierCount = Supplier::count();
        $salesCount = Sales::count();

        // echo "<pre>";
        // var_dump($purchaseCount, $supplierCount, $salesCount);
        // echo "</pre>";
        return view('dashboard', compact('purchaseCount', 'supplierCount', 'salesCount'));
    }
}
