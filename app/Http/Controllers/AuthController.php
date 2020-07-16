<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index()
    {
        return view('users/login');
    }
    public function login()
    {
        return view('dashboard');
    }
    public function ubah_pass()
    {
        return view('users/ubah_pass');
    }
}
