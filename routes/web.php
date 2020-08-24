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


// Route::get('/', 'AuthController@index');
Route::get('/dashboard', 'AuthController@login')->name('home');
// Route::get('/ubah_pass', 'AuthController@ubah_pass');

Route::get('/', 'Auth\LoginController@getLogin')->name('login');
Route::get('/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('login');
Route::get('/logout', 'Auth\LoginController@postLogout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::resource('pembelian', 'PembelianController')->names([
    'index' => 'pembelian.index',
    'create' => 'pembelian.form.tambah',
    'store' => 'pembelian.tambah',
    'destroy' => 'pembelian.hapus',
    'edit'    => 'pembelian.form.edit',
    'update'  => 'pembelian.edit',
]);
Route::get('/pembelian/detail/{id}', 'PembelianController@detail')->name('pembelian.detail');
Route::get('/pembelian/{id}/pembayaran/create', 'PembelianController@payment_show')->name('pembayaran.form.tambah');
Route::post('/pembelian/{id}/pembayaran/store', 'PembelianController@payment_store')->name('pembayaran.tambah');

Route::get('/pembelian/{id}/pembayaran/list', 'PembelianController@payment_list')->name('pembayaran.list');
Route::get('/pembelian/pembayaran/edit/{id}/{purchase_id}', 'PembelianController@payment_edit')->name('pembayaran.edit');
Route::get('/pembelian/pembayaran/update/{id}', 'PembelianController@payment_update')->name('pembayaran.update');
Route::get('/pembelian/pembayaran/delete/{id}', 'PembelianController@payment_destroy')->name('pembayaran.destroy');

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
Route::get('supplier/{id}/sales', 'SalesController@getSales');

Route::group(['prefix' => 'lokasi', 'as' => 'lokasi'], function () {
    Route::get('provinsi/{id_prov?}', 'LokasiController@getProvinsi')->name('prov');

    Route::get('provinsi/{id_prov}/kabupaten', 'LokasiController@getKabupatenByIdProv');
    Route::get('provinsi/kabupaten/{id_kab}', 'LokasiController@getKabupatenByIdKab');
});


Route::get('/barang/daftar', 'BarangController@daftar');
Route::get('/barang/tambah', 'BarangController@tambah');

Route::resource('driver', 'DriverController')->names([
    'index'  => 'driver.index',
    'create' => 'driver.form.tambah',
    'store' => 'driver.tambah',
    'edit' => 'driver.edit',
    'update' => 'driver.update',
    'destroy' => 'driver.hapus'
]);

Route::resource('pengiriman', 'ShippingController')->names([
    'index' => 'pengiriman.index',
    'create' => 'pengiriman.form.tambah',
    'store' => 'pengiriman.tambah',
    'destroy' => 'pengiriman.hapus',
    'edit'    => 'pengiriman.form.edit',
    'update'  => 'pengiriman.edit',
    'show'    => 'pengiriman.detail',

]);

Route::get('/pengiriman/cetak_invoice/{id}', 'ShippingController@cetak_invoice')->name('pengiriman.cetak-invoice');
Route::get('/pengiriman/{id}/create', 'ShippingController@create');
Route::post('pengiriman/{pengiriman}/send', 'ShippingController@sendShipping')->name('pengiriman.kirim');


Route::resource('penjualan', 'PenjualanController')->names([
    'index'  => 'penjualan.index',
    'create' => 'penjualan.form.tambah',
    'show' => 'penjualan.detail',
    'store' => 'penjualan.tambah',
    'edit' => 'penjualan.edit',
    'update' => 'penjualan.update',
    'destroy' => 'penjualan.hapus'
]);
