<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Driver;
use App\Models\Penjualan;
use App\Models\PenjualanItem;
use App\Models\PengirimanItem;
use Carbon\Carbon;
use PDF;

class ShippingController extends Controller
{
    //
    public function index()
    {
        //
        $shippings = Shipping::where('status', 'pending')->get();
        $drivers   = Driver::all();
        return view('pengiriman/daftar_pengiriman', compact('shippings', 'drivers'));
    }

    public function riwayat()
    {
        //
        $shippings = Shipping::where('status', 'dikirim')->orderBy('updated_at', 'desc')->get();
        $drivers   = Driver::all();
        return view('pengiriman/riwayat_pengiriman', compact('shippings', 'drivers'));
    }
    public function cetak_invoice($id)
    {
        $shipping = Shipping::find($id);
        $shippingItem = PengirimanItem::where('pengiriman_id', $id)->get();
        $customPaper = array(0,0,302,500);
        
        $pdf = PDF::loadview('pengiriman/print_invoice', compact('shipping', 'shippingItem'));
        $pdf->setPaper($customPaper);
	    return $pdf->stream();
    }
    public function create()
    {
        return view('pengiriman/tambah_pengiriman2');
    }

    public function store(Request $request)
    {

        $data = [
            'tanggal_pengiriman'    => $request->input('tglPengiriman'),
            'nama_pembeli'          => $request->input('namaPembeli'),
            'alamat_pembeli'        => $request->input('alamatPembeli'),
            'phone'                 => $request->input('phonePembeli'),
            'grandtotal'            => $request->input('grandTotal'),
            'prioritas'             => $request->input('prioritas'),
            'status'                => 'pending',
        ];

        

        $shipping = Shipping::create($data);

        $items = $request->input('dataItem');
        $shippingItem = [];

        foreach ($items as $item) {
            $unit = Unit::firstOrCreate(['name_unit' => $item['unitItem']]);
            $product = Product::firstOrCreate(['nama_produk' => $item['nama']]);
            $shippingItem[] = [
                "pengiriman_id"   => $shipping->id,
                "product_id"     => $product->id,
                "unit_id"        => $unit->id,
                "unit_price"     => $item['hargaItem'],
                "quantity"       => $item['jumlahItem'],
                "total"          => $item['totalItem'],
                "created_at"     => Carbon::now(),
                "updated_at"     => Carbon::now(),
            ];
        }

        PengirimanItem::insert($shippingItem);

        return json_encode("insert success");
    }


    public function show(Shipping $pengiriman)
    {
        $penjualan = $pengiriman->penjualan;
        $drivers = Driver::all();
        return view('pengiriman/detail_pengiriman', compact('pengiriman', 'penjualan', 'drivers'));
    }

    public function edit($id)
    {
        $pengiriman = Shipping::find($id);
        $drivers = Driver::all();
        return view('pengiriman/edit_pengiriman', compact('pengiriman', 'drivers'));
    }

    public function update(Request $request, $id)
    {
        $pengiriman = Shipping::find($id);
        $pengiriman->tanggal_pengiriman     = $request->input('tglPengiriman');
        $pengiriman->nama_pembeli           = $request->input('namaPembeli');
        $pengiriman->alamat_pembeli         = $request->input('alamatPembeli');
        $pengiriman->phone                  = $request->input('phonePembeli');
        $pengiriman->driver_id              = $request->input('driver');
        $pengiriman->uk_kendaraan           = $request->input('kendaraan');
        $pengiriman->grandtotal             = $request->input('grandTotal');
        $pengiriman->grandtotal             = $request->input('grandTotal');
        $pengiriman->prioritas              = $request->input('prioritas');
        $pengiriman->save();

        //delete item yang ada
        PengirimanItem::where('pengiriman_id', $pengiriman->id)->delete();

        $items = $request->input('dataItem');
        $pengirimanItem = [];

        //insert baru
        foreach ($items as $item) {
            $unit = Unit::firstOrCreate(['name_unit' => $item['unitItem']]);
            $product = Product::firstOrCreate(['nama_produk' => $item['nama']]);
            $pengirimanItem[] = [
                "pengiriman_id"   => $pengiriman->id,
                "product_id"     => $product->id,
                "unit_id"       => $unit->id,
                "quantity"      => $item['jumlahItem'],
                "unit_price"    => $item['hargaItem'],
                "total"         => $item['totalItem'],
                "created_at"     => Carbon::now(),
                "updated_at"     => Carbon::now(),
            ];
        }

        PengirimanItem::insert($pengirimanItem);

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
        $kendaraan = $request->input('kendaraan');

        if (!$driver_id) {
            $response = [
                'success' => false,
                'message' => "Driver tidak boleh kosong",
            ];
            return response()->json($response);
        }

        $pengiriman->driver_id    = $driver_id;
        $pengiriman->uk_kendaraan = $kendaraan;
        $pengiriman->status       = 'dikirim';
        $pengiriman->send_at      =  Carbon::now();
        $pengiriman->save();

        $response = [
            'success' => true,
            'message' => "Pengiriman berhasil",
        ];
        return response()->json($response);
    }

    public function destroy($id)
    {
        $pengirimanItem = PengirimanItem::where('pengiriman_id', $id);

        $pengirimanItem->delete();

        $pengiriman = Shipping::find($id);

        $pengiriman->delete();


        $response = [
            'success' => true,
            'message' => "Hapus pengiriman berhasil",
        ];
        return response()->json($response);
    }

    public function pdf_invoice($id)
    {
        $shipping = Shipping::find($id);
        $shippingItem = PengirimanItem::where('pengiriman_id', $id)->get();
        $customPaper = array(0,0,302,500);
        
        $pdf = PDF::loadview('pengiriman/print_invoice', compact('shipping', 'shippingItem'));
        $pdf->setPaper($customPaper);
	    return $pdf->stream();
    }
}
