<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Sales;



class SalesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salers = Sales::all();
        return view('supplier/daftar_sales', compact('salers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('supplier/tambah_sales', compact('suppliers'));
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
            'supplier_id' => $request->input('supplierTambah'),
            'name'        => $request->input('namaSales'),
            'phone'       => $request->input('phoneSales'),
        ];
        Sales::create($data);
        return redirect()->route('sales.index');
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
        $suppliers = Supplier::all();
        $sales = Sales::find($id);

        return view('supplier.edit_sales', compact('suppliers', 'sales'));
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

        $sales = Sales::find($id);

        $sales->supplier_id = $request->input('supplierEdit');
        $sales->name = $request->input('namaSalesEdit');
        $sales->phone = $request->input('phoneSalesEdit');

        $sales->save();

        return redirect()->route('sales.index');
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
        $sales = Sales::find($id);

        $sales->delete();

        return redirect()->route('sales.index');
    }

    public function getSales($supplier_id){
        $sales = Sales::where('supplier_id',$supplier_id)->get();
        return $sales;
    }
}
