<?php

namespace App\Http\Controllers;
use App\Models\admin\VehicleMake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use DB;
class VehicleMakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');

        }
        $vehicleMake = VehicleMake::all();
       
        return view('admin.pages.setting.vehicle.vehicle_make',['vehicleMake'=>$vehicleMake,'datasession'=>$datasession]);

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'required', 
		]);

        // db.Employee.insert({_id:1, "EmployeeName" : "Smith"})
	
        $vehicleMake = new VehicleMake;
        $vehicleMake->_id = 1;
        $vehicleMake->name = $request->input('name');
        $vehicleMake->status = $request->input('status');
        $vehicleMake->save();
        return back()->with('VehicleMakeSuccess','Vehicle Make Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\VehicleMake  $vehicleMake
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleMake $vehicleMake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\VehicleMake  $vehicleMake
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');

        }
        $vehicleMake = VehicleMake::all();
        // dd($edit_driver)
        $edit_vehicleMake = VehicleMake::where('_id', $id)->first();
            
        // dd($imageName);
        return view('admin.pages.setting.vehicle.vehicle_make', ['vehicleMake' => $vehicleMake, 'edit_vehicleMake' => $edit_vehicleMake,'datasession' => $datasession]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\VehicleMake  $vehicleMake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeData = $request->validate([

            'name' => 'required|string',
            'status' => 'required|boolean'

        ]);
        $vehicleMake = new VehicleMake;
        $vehicleMake = VehicleMake::where('_id', $id)->update($storeData);
        return redirect('admin/vehicle/make')->with('VehicleMakeSuccess', 'Vehicle Make Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\VehicleMake  $vehicleMake
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleMake = VehicleMake::where('_id', $id)->delete();
        return back()->with('VehicleMakeSuccess', 'Vehicle Make Deleted Successfully!');
    }
}
