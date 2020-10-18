<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Driver;
use App\Models\Shipping;
use App\Models\SalaryDriver;



class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drivers = Driver::all();
        return view('drivers/daftar_driver', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('drivers/tambah_driver');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'name'        => $request->input('namaDriver'),
            'phone'       => $request->input('phoneDriver'),
        ];
        Driver::create($data);
        return redirect()->route('driver.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        $histories = $driver->histories()->orderBy('send_at', 'DESC')->get();

        return view('drivers.detail-driver', compact('driver', 'histories'));
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
        $driver = Driver::find($id);

        return view('drivers.edit_driver', compact('driver'));
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
        $driver = Driver::find($id);

        $driver->name = $request->input('namaDriverEdit');
        $driver->phone = $request->input('phoneDriverEdit');

        $driver->save();

        return redirect()->route('driver.index');
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
        $driver = Driver::find($id);

        $driver->delete();

        return redirect()->route('driver.index');
    }

    public function paidSalary(Driver $driver){
        $pengiriman = Shipping::where('driver_id',$driver->id)->where('has_paid_driver',false)->get();
        
        $salary = 0; 
        foreach ($pengiriman as $delivery) {
            $salary+= $delivery->vehicle->price;
        }

        $salaryDriver   = SalaryDriver::create([
            'driver_id' => $driver->id,
            'amount'    => $salary,
        ]);

        foreach($pengiriman as $delivery){
            $delivery->has_paid_driver = true;
            $delivery->salary_id   = $salaryDriver->id;
            $delivery->save();
        }
        dd('sukses');

    }
}
