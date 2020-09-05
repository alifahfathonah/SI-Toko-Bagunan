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

Route::get('/pembelian/riwayat/list', 'PembelianController@riwayat')->name('pembelian.riwayat');

Route::get('/pembelian/detail/{id}', 'PembelianController@detail')->name('pembelian.detail');
Route::get('/pembelian/{id}/pembayaran/create', 'PembelianController@payment_show')->name('pembayaran.form.tambah');
Route::post('/pembelian/{id}/pembayaran/store', 'PembelianController@payment_store')->name('pembayaran.tambah');

Route::post('/pembelian/supplier/store', 'PembelianController@supplier_store')->name('pembelian.supplier.tambah');

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
    'destroy' => 'driver.hapus',
    'show' => 'driver.detail'

]);

Route::resource('pengiriman', 'ShippingController')->names([
    'index' => 'pengiriman.index',
    'create' => 'pengiriman.form.tambah',
    'store' => 'pengiriman.tambah',
    'edit'    => 'pengiriman.form.edit',
    'update'  => 'pengiriman.edit',
    'show'    => 'pengiriman.detail',
    'destroy'    => 'pengiriman.hapus',
]);

Route::get('/pengiriman/riwayat/list', 'ShippingController@riwayat')->name('pengiriman.riwayat');
Route::get('/pengiriman/cetak_invoice/{id}', 'ShippingController@cetak_invoice')->name('pengiriman.cetak-invoice');
Route::get('/pengiriman/{id}/create', 'ShippingController@create')->name('pengiriman.tambah.form');
Route::post('pengiriman/{pengiriman}/send', 'ShippingController@sendShipping')->name('pengiriman.kirim');
Route::get('/pengiriman/cetak_invoice/{id}/pdf', 'ShippingController@pdf_invoice')->name('pengiriman.cetak-pdf');




Route::resource('penjualan', 'PenjualanController')->names([
    'index'  => 'penjualan.index',
    'create' => 'penjualan.form.tambah',
    'show' => 'penjualan.detail',
    'store' => 'penjualan.tambah',
    'edit' => 'penjualan.form.edit',
    'update' => 'penjualan.edit',
    'destroy' => 'penjualan.hapus'
]);

Route::get('/penjualan/{id}/pembayaran/create', 'PenjualanController@payment_show')->name('pembayaransale.form.tambah');
Route::post('/penjualan/{id}/pembayaran/store', 'PenjualanController@payment_store')->name('pembayaransale.tambah');

Route::get('/penjualan/{id}/pembayaran/list', 'PenjualanController@payment_list')->name('pembayaransale.list');
Route::get('/penjualan/pembayaran/edit/{id}/{sale_id}', 'PenjualanController@payment_edit')->name('pembayaransale.edit');
Route::get('/penjualan/pembayaran/update/{id}', 'PenjualanController@payment_update')->name('pembayaransale.update');
Route::get('/penjualan/pembayaran/delete/{id}', 'PenjualanController@payment_destroy')->name('pembayaransale.destroy');
