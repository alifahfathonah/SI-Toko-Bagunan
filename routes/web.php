<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('coba');
// });
Route::get('/', 'AuthController@index');
Route::get('/dashboard', 'AuthController@login');
Route::get('/ubah_pass', 'AuthController@ubah_pass');

Route::get('/pembelian/daftar', 'PembelianController@daftar');
Route::get('/pembelian/tambah', 'PembelianController@tambah');

Route::get('/supplier/daftar_supplier', 'SupplierController@daftar_supplier');
Route::get('/supplier/tambah_supplier', 'SupplierController@tambah_supplier');
Route::get('/supplier/daftar_sales', 'SupplierController@daftar_sales');
Route::get('/supplier/tambah_sales', 'SupplierController@tambah_sales');

Route::get('/barang/daftar', 'BarangController@daftar');
Route::get('/barang/tambah', 'BarangController@tambah');
