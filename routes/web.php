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
    'index' => 'pembelian.index',
    'create' => 'pembelian.form.tambah',
    'store' => 'pembelian.tambah',
    'destroy' => 'pembelian.hapus'
]);

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

Route::group(['prefix' => 'lokasi', 'as' => 'lokasi'], function () {
    Route::get('provinsi/{id_prov?}', 'LokasiController@getProvinsi')->name('prov');

    Route::get('provinsi/{id_prov}/kabupaten', 'LokasiController@getKabupatenByIdProv');
    Route::get('provinsi/kabupaten/{id_kab}', 'LokasiController@getKabupatenByIdKab');


    Route::get('kabupaten/{id_kab}/kecamatan', 'LokasiController@getKecamatanByIdKab');
    Route::get('kabupaten/kecamatan/{id_kec}', 'LokasiController@getKecamatanByIdKec');


    Route::get('kecamatan/{id_kec}/kelurahan', 'LokasiController@getKelurahanByIdKec');
    Route::get('kecamatan/kelurahan/{id_kel}', 'LokasiController@getKelurahanByIdKel');
});





Route::get('/barang/daftar', 'BarangController@daftar');
Route::get('/barang/tambah', 'BarangController@tambah');
