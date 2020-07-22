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

Route::resource('pembelian', 'PembelianController')->names([
    'create' => 'pembelian.form.tambah',
    'store' => 'pembelian.tambah',
    'destroy' => 'pembelian.hapus'
]);

Route::resource('supplier', 'SupplierController')->names([
    'index' => 'supplier.index',
    'create' => 'supplier.form.tambah',
    'store' => 'supplier.tambah',
    'edit' => 'supplier.edit',
    'update' => 'supplier.update',
    'destroy' => 'supplier.hapus'
]);

Route::resource('sales', 'SalesController')->names([
    'index'  => 'sales.index',
    'create' => 'sales.form.tambah',
    'store' => 'sales.tambah',
    'edit' => 'sales.edit',
    'update' => 'sales.update',
    'destroy' => 'sales.hapus'
]);



Route::get('/barang/daftar', 'BarangController@daftar');
Route::get('/barang/tambah', 'BarangController@tambah');
