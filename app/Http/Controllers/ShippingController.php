<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shipping;
use App\Models\Driver;
use App\Models\Penjualan;
use App\Models\PenjualanItem;
use App\Models\PengirimanItem;

class ShippingController extends Controller
{
    //
    public function index()
    {
        //
        $shippings = Shipping::all();
        $drivers   = Driver::all();
        return view('pengiriman/daftar_pengiriman', compact('shippings', 'drivers'));
    }
    public function cetak_invoice($id)
    {
        $shipping = Shipping::find($id);
        $shippingItem = PengirimanItem::where('pengiriman_id', $id)->get();

        return view('pengiriman/cetak_invoice', compact('shipping', 'shippingItem'));
    }
    public function create($id)
    {
        //
        $penjualan = Penjualan::find($id);

        $penjualanItem = PenjualanItem::where('penjualan_id', $id)->get();

        $drivers = Driver::all();
        return view('pengiriman/tambah_pengiriman', compact('penjualan', 'penjualanItem', 'drivers'));
    }


    public function store(Request $request)
    {


        $data = [
            'penjualan_id'            => $request->input('id_penjualan'),
            'driver_id'               => $request->input('driver'),
            'tanggal_pengiriman'      => $request->input('tglPengiriman'),
            'prioritas'               => $request->input('prioritas'),
            'status'                  => 'pending',

        ];

        $idItem = $request->input('idItem');
        $qtySend = $request->input('jmlDikirim');
        $shippingItem = [];

        foreach ($idItem as $i => $item) {
            if ($qtySend[$i] > 0) {
                $shippingItem[] = [
                    "penjualan_item_id"  => $item,
                    "quantity"           => $qtySend[$i],
                ];
            }
        }

        if (count($shippingItem) == 0) {
            return response(422);
        }

        $shipping = Shipping::create($data);

        foreach ($shippingItem as $i => $item) {
            $shippingItem[$i]["pengiriman_id"] = $shipping->id;
        }

        $pengirimanItem = PengirimanItem::insert($shippingItem);

        foreach ($shippingItem as $item) {
            $penjualanItem = PenjualanItem::find($item["penjualan_item_id"]);
            $penjualanItem->quantity_sent = $penjualanItem->quantity_sent + $item["quantity"];
            $penjualanItem->save();
        }


        return json_encode("insert success");
    }


    public function show(Shipping $pengiriman)
    {
        $penjualan = $pengiriman->penjualan;
        $drivers = Driver::all();
        return view('pengiriman/detail_pengiriman', compact('pengiriman', 'penjualan', 'drivers'));
    }

    public function edit(Shipping $pengiriman)
    {
        $penjualan = $pengiriman->penjualan;
        $drivers = Driver::all();
        return view('pengiriman/edit_pengiriman', compact('pengiriman', 'penjualan', 'drivers'));
    }

    public function update(Request $request, Shipping $pengiriman)
    {
        //edit pengiriman
        $pengiriman->penjualan_id            = $request->input('id_penjualan');
        $pengiriman->tanggal_pengiriman      = $request->input('tglPengiriman');
        $pengiriman->prioritas               = $request->input('prioritas');

        $driver_id = $request->input('driver');

        //cek jika sudah melakaukan pemilihan driver
        if (isset($driver_id)) {
            $pengiriman->driver_id   = $driver_id;
        }

        //mempersiapkan data baru untuk pengiriman item, skema update delete
        $idItem = $request->input('idItem');
        $qtySend = $request->input('jmlDikirim');
        $shippingItem = [];

        foreach ($idItem as $i => $item) {
            if ($qtySend[$i] > 0) {
                $shippingItem[] = [
                    "pengiriman_id"      => $pengiriman->id,
                    "penjualan_item_id"  => $item,
                    "quantity"           => $qtySend[$i],
                ];
            }
        }

        //cek jika semua qty send 0 maka tidak ada barang yang dikirim dan error
        if (count($shippingItem) == 0) {
            return response(422);
        }

        $pengiriman->save(); //save hasil editan pengiriman


        //delete pengiriman item lama 
        $pengirimanItem = $pengiriman->items;

        foreach ($pengirimanItem as $item) {
            $penjualanItem = $item->PenjualanItem;
            $penjualanItem->quantity_sent = $penjualanItem->quantity_sent - $item->quantity;
            $penjualanItem->save();

            $item->delete();
        }

        // insert pengiriman item baru
        $pengirimanItem = PengirimanItem::insert($shippingItem);

        foreach ($shippingItem as $item) {
            $penjualanItem = PenjualanItem::find($item["penjualan_item_id"]);
            $penjualanItem->quantity_sent = $penjualanItem->quantity_sent + $item["quantity"];
            $penjualanItem->save();
        }


        return json_encode("insert success");
    }

    public function sendShipping(Request $request, Shipping  $pengiriman)
    {
        if ($pengiriman->status == "dikirim") {
            $response = [
                'success' => false,
                'message' => "Pengiriman sudah dikirim sebelumnya",
            ];
            return response()->json($response);
        }

        $driver_id = $request->input('driver');
        
        if(!$driver_id){
            $response = [
                'success' => false,
                'message' => "Supir tidak boleh kosong",
            ];
            return response()->json($response);
        }
        $pengiriman->driver_id = $driver_id;
        $pengiriman->status    = 'dikirim';
        $pengiriman->save();

        $response = [
            'success' => true,
            'message' => "Pengiriman berhasil",
        ];
        return response()->json($response);
    }

    public function destroy(Shipping $pengiriman)
    {
        $items = $pengiriman->items;

        foreach ($items as $item) {
            $penjualanItem = $item->PenjualanItem;
            $penjualanItem->quantity_sent = $penjualanItem->quantity_sent - $item->quantity;
            $penjualanItem->save();
            $item->delete();
        }

        $pengiriman->delete();

        $response = [
            'success' => true,
            'message' => "Hapus pengiriman berhasil",
        ];
        return response()->json($response);
    }
}
