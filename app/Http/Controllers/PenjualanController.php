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
        //
        $sales = Penjualan::all();

        return view('penjualan/daftar_penjualan', compact('sales'));
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

        return json_encode("insert success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        return view('penjualan/lihat_penjualan', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Penjualan::find($id);
        return view('penjualan/edit_penjualan', compact('sale'));
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
        $sale = Penjualan::find($id);
        $sale->date  = $request->input('tglPenjualan');
        $sale->nama_pembeli  = $request->input('namaPembeli');
        $sale->alamat_pembeli  = $request->input('alamatPembeli');
        $sale->grandtotal          = $request->input('grandTotal');
        $sale->payment_status = $request->input('paymentStatus');
        $sale->sale_status = $request->input('grandTotal') - $request->input('jmlBayar') <= 0 ? "selesai" : "proses";
        $sale->save();

        PenjualanItem::where('penjualan_id', $sale->id)->delete();

        $items = $request->input('dataItem');
        $saleItem = [];

        foreach ($items as $item) {
            $unit = Unit::firstOrCreate(['name_unit' => $item['unitItem']]);
            $product = Unit::firstOrCreate(['name_unit' => $item['unitItem']]);
            $saleItem[] = [
                "penjualan_id"   => $sale->id,
                "product_id"  => $product->id,
                "unit_id"       => $unit->id,
                "quantity"      => $item['jumlahItem'],
                "unit_price"    => $item['hargaItem'],
                "total"         => $item['totalItem'],

            ];
        }

        PenjualanItem::insert($saleItem);

        return json_encode("insert success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);

        $penjualan->delete();

        return redirect()->route('penjualan.index');
    }

    public function payment_show($id)
    {
        $sale = Penjualan::find($id);

        $must_pay = $sale->grandtotal - $sale->paid_amount;

        return json_encode(compact('must_pay'));
    }

    public function payment_store($id, Request $request)
    {
        $sale = Penjualan::find($id);

        $paySale = [
            'payment_date' => $request->input('tglPembayaran'),
            'sale_id' => $id,
            'amount' => $request->input('totalPembayaran'),
        ];

        Payment::create($paySale);

        $newPaidAmount = $sale->paid_amount + $paySale['amount'];

        if ($newPaidAmount == $sale->grandtotal) {
            $saleStatus = "selesai";
            $paymentStatus  = "lunas";
        }

        if ($newPaidAmount >= 0 && $newPaidAmount < $sale->grandtotal) {
            $saleStatus = "proses";
            $paymentStatus  = "sebagian";
        }


        $sale->sale_status = $saleStatus;
        $sale->payment_status  = $paymentStatus;
        $sale->paid_amount = $newPaidAmount;
        $sale->save();

        return redirect()->route('penjualan.index');
    }

    public function payment_list($id)
    {
        $payments = Payment::where('sale_id', $id)->get();
        $sale_id = $id;

        return view('penjualan.lihat_pembayaran', compact('payments', 'sale_id'));
    }

    public function payment_edit($id, $sale_id)
    {
        $payment = Payment::find($id);
        $sale = Penjualan::find($sale_id);


        $new_bill = ($sale->grandtotal - $sale->paid_amount);

        return view('penjualan.edit_pembayaran', compact('payment', 'sale', 'new_bill'));
    }

    public function payment_update(Request $request, $id)
    {
        $payment = Payment::find($id);

        $sale = Penjualan::find($payment->sale_id);
        $sale->paid_amount = ($sale->paid_amount - $payment->amount) + $request->input('jmlPembayaranEdit');

        $balance = $sale->paid_amount - $sale->grandtotal;
        if ($balance == 0) {
            $sale->sale_status = 'selesai';
            $sale->payment_status  = 'lunas';
        } else {
            $sale->sale_status = 'proses';
            $sale->payment_status  = 'sebagian';
        }

        $sale->save();

        $payment->payment_date = $request->input('tglPembayaranEdit');
        $payment->amount       = $request->input('jmlPembayaranEdit');
        $payment->save();

        return redirect()->route('pembayaransale.list', $payment->sale_id);
    }

    public function payment_destroy($id)
    {
        $payment = Payment::find($id);
        $sale = Penjualan::find($payment->sale_id);

        $sale->paid_amount = ($sale->paid_amount - $payment->amount);
        $balance = $sale->paid_amount - $sale->grandtotal;

        if ($balance == 0) {
            $sale->sale_status = 'selesai';
            $sale->payment_status  = 'lunas';
        } else {
            $sale->sale_status = 'proses';
            $sale->payment_status  = 'sebagian';
        }

        $sale->save();

        $payment->delete();

        return redirect()->route('pembayaransale.list', $payment->sale_id);
    }
}
