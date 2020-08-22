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

        return view('pengiriman/daftar_pengiriman', compact('shippings'));
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
            'prioritas'               => '02',
        ];

        $idItem = $request->input('idItem');
        $qtySend = $request->input('jmlDikirim');
        
        $shipping = Shipping::create($data);
        $shippingItem = [];
        
        foreach ( $idItem as $i => $item) {
            $shippingItem[] = [
                "pengiriman_id"      => $shipping->id,
                "penjualan_item_id"  => $item,
                "quantity"           => $qtySend[$i],
            ];
        }

        PengirimanItem::insert($shippingItem);

        return json_encode("insert success");
    }
}
