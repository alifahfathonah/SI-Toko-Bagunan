<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\PenjualanItem;
use App\Models\Unit;
use App\Models\Payment;
use App\Models\Product;
use Carbon\Carbon;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Penjualan::all();
        return view('penjualan/daftar_penjualan',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penjualan/tambah_penjualan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'date'                => $request->input('tglPembelian'),
            'nama_pembeli'        => $request->input('namaPembeli'),
            'alamat_pembeli'      => $request->input('alamatPembeli'),
            'grandtotal'          => $request->input('grandTotal'),
            'payment_status'      => $request->input('paymentStatus'),
            'paid_amount'         => $request->input('jmlBayar'),
        ];

        $data['sale_status']  = $request->input('paymentStatus') == "lunas" ? "selesai" : "proses";

        $sale = Penjualan::create($data);

        if ($data['paid_amount'] > 0) {
            $paySale = [
                'payment_date'      => $data['date'],
                'sale_id'           => $sale->id,
                'amount'            => $data['paid_amount'],
            ];

            Payment::create($paySale);
        }

        $items = $request->input('dataItem');
        $saleItem = [];

        foreach ($items as $item) {
            $unit = Unit::firstOrCreate(['name_unit' => $item['unitItem']]);
            $product = Product::firstOrCreate(['nama_produk' => $item['nama']]);
            $saleItem[] = [
                "penjualan_id"   => $sale->id,
                "product_id"     => $product->id,
                "unit_id"        => $unit->id,
                "quantity"       => $item['jumlahItem'],
                "unit_price"     => $item['hargaItem'],
                "total"          => $item['totalItem'],
                "created_at"     => Carbon::now(),
                "updated_at"     => Carbon::now(),
            ]; 
        }

        PenjualanItem::insert($saleItem);
        dd("suskse");
        // return json_encode("insert success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        return view('penjualan/lihat_penjualan',compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
