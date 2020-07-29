<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Supplier;
use App\Models\Provinsi;
use App\Models\Kabupaten;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier/daftar_supplier', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier/tambah_supplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_prov = $request->input('provSupplier');
        $id_kab = $request->input('kotaSupplier');

        $prov = Provinsi::where('id_prov', $id_prov)->first();
        $kab = Kabupaten::where('id_kab', $id_kab)->first();

        $data = [
            'name'          => $request->input('namaSupplier'),
            'address'       => $request->input('alamatSupplier'),
            'city'          => $kab->nama,
            'province'      => $prov->nama,
            'phone'         => $request->input('phoneSupplier'),
        ];

        Supplier::create($data);

        return redirect()->route('supplier.index');
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
        $supplier = Supplier::find($id);
        $prov = Provinsi::where('nama', $supplier->province)->first();
        $kab = Kabupaten::where('nama', $supplier->city)->first();

        return view('supplier.edit_supplier', compact('supplier', 'prov', 'kab'));
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
        $id_prov = $request->input('provSupplierEdit');
        $id_kab = $request->input('kotaSupplierEdit');

        $supplier = Supplier::find($id);

        $prov = Provinsi::where('id_prov', $id_prov)->first();
        $kab = Kabupaten::where('id_kab', $id_kab)->first();

        $supplier->name = $request->input('namaSupplierEdit');
        $supplier->address = $request->input('alamatSupplierEdit');
        $supplier->city = $kab->nama;
        $supplier->province = $prov->nama;
        $supplier->phone = $request->input('phoneSupplierEdit');

        $supplier->save();

        return redirect()->route('supplier.index');
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
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect()->route('supplier.index');
    }
}
