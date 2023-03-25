<?php

namespace App\Http\Controllers;
use App\Models\admin\VehicleModel;
use App\Models\admin\VehicleCategory;
use App\Models\admin\VehicleMake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class VehicleModelController extends Controller
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
        $vehicleCategory = VehicleCategory::all();
        $vehicleMake = VehicleMake::all();
        $vehicleModel = VehicleModel::all();
        // $hdfk = $vehicleModel->make()->get();
        // dd($hdfk);
        // $vehicleModel = VehicleModel::get();
        // $thisis=$vehicleModel->make->all();
        //   dd($vehicleModel);exit;

        return view('admin.pages.setting.vehicle.vehicle_model',['vehicleModel'=>$vehicleModel,'vehicleMake'=>$vehicleMake,'vehicleCategory'=>$vehicleCategory,'datasession'=>$datasession]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return $request;
        $validated = $request->validate([
            'make_model_name' => 'required|string',
            'vehicle_make_id' => 'required',
            'vehicle_category_id' => 'required',
            'active' => 'required|boolean',
            'type' => '',


		]);

        // dd($validated);exit;

        $vehicleModel = new VehicleModel;

        $vehicleModel->make_model_name = $request->input('make_model_name');
        $vehicleModel->vehicle_make_id = $request->input('vehicle_make_id');
        $vehicleModel->vehicle_category_id = $request->input('vehicle_category_id');
        $vehicleModel->active = $request->input('active');
        $vehicleModel->type = $request->input('type');
        $vehicleModel->save();
        return back()->with('VehicleModalSuccess','Vehicle Model Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');

        }
        $vehicleCategory = VehicleCategory::all();
        $vehicleMake = VehicleMake::all();
        $vehicleModel = VehicleModel::all();

        $edit_vehicleModel = VehicleModel::where('_id', $id)->first();
        $edit_vehicleCategory = VehicleCategory::where('_id',$id)->first();
        $edit_vehicleMake = VehicleMake::where('_id',$id)->first();
        // dd($edit_vehicleModel);
        return view('admin.pages.setting.vehicle.vehicle_model', ['vehicleModel' => $vehicleModel,'vehicleMake' => $vehicleMake,'vehicleCategory' => $vehicleCategory, 'edit_vehicleModel' => $edit_vehicleModel,'edit_vehicleCategory' => $edit_vehicleCategory,'edit_vehicleMake' => $edit_vehicleMake,'datasession' => $datasession]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //    return $request;
        $storeData = $request->validate([
            'make_model_name' => '',
            'vehicle_make_id' => '',
            'vehicle_category_id' => '',
            'active' => '',
            'type' => '',

        ]);
        // dd($storeData);

        $vehicleModel = new VehicleModel;
        $vehicleModel = VehicleModel::where('_id', $id)->update($storeData);
        return redirect('admin/vehicle/model')->with('VehicleModalSuccess', 'Vehicle Model Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleModel = VehicleModel::where('_id', $id)->delete();
        return back()->with('VehicleModalSuccess', 'Vehicle Model Deleted Successfully!');
    }
}
