<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Sales;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Unit;
use App\Models\Payment;




class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('pembelian/daftar_pembelian',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $sales     = Sales::all();
        return view('pembelian/tambah_pembelian',compact('suppliers','sales'));
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
            'purchase_date' => $request->input('tglPembelian'),
            'supplier_id'   => $request->input('supplier'),
            'sales_id'      => $request->input('sales'),
            'total'         => $request->input('grandTotal'),
            'payment_status' => $request->input('paymentStatus'),
            'paid_amount'    => $request->input('jmlBayar'),
        ];

        $data['purchase_status'] = $request->input('paymentStatus') == "lunas" ? "selesai" : "proses"; 

        $purchase = Purchase::create($data);
        
        $items = $request->input('dataItem');
        $purchaseItem = [];

        foreach ($items as $item) {
            $unit = Unit::firstOrCreate(['name_unit' => $item['unitItem'] ]);
            $purchaseItem[]= [
                "purchase_id"   => $purchase->id,
                "product_name"  => $item['nama'],
                "unit_id"       => $unit->id, 
                "quantity"      => $item['jumlahItem'],
                "unit_price"    => $item['hargaItem'],
                "total"         => $item['totalItem'],

            ];
        }

        PurchaseItem::insert($purchaseItem);
        
        return json_encode("insert success");
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function payment_show($id){
        $purchase = Purchase::find($id);

        $must_pay = $purchase->total - $purchase->paid_amount;

        return json_encode(compact('must_pay'));
    }

    public function payment_store($id,Request $request){
        $purchase = Purchase::find($id);

        $payPurchase = [
            'payment_date' =>$request->input('tglPembayaran'),
            'purchase_id' =>$id,
            'amount' =>$request->input('totalPembayaran'),
        ];
        
        Payment::create($payPurchase);

        $newPaidAmount = $purchase->paid_amount + $payPurchase['amount'];

        if($newPaidAmount == $purchase->total){
            $purchaseStatus = "selesai";
            $paymentStatus  = "lunas";
        }

        if($newPaidAmount >= 0 && $newPaidAmount < $purchase->total){
            $purchaseStatus = "proses";
            $paymentStatus  = "sebagian";
        }
        

        $purchase->purchase_status = $purchaseStatus;
        $purchase->payment_status  = $paymentStatus;
        $purchase->paid_amount = $newPaidAmount;
        $purchase->save();

        return redirect()->route('pembelian.index');

    }
    
    
}
