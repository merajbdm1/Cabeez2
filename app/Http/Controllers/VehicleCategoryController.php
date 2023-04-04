<?php

namespace App\Http\Controllers;
use App\Models\admin\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class VehicleCategoryController extends Controller
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
       
        return view('admin.pages.setting.vehicle.vehicle_category',['vehicleCategory'=>$vehicleCategory,'datasession'=>$datasession]);

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
       
    
        // exit;
        $validated = $request->validate([
            
			'icon' => 'required|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|string|min:3|max:255',
            'parent_id' => '',
            'capacity' => 'required',
            'status' => 'required|boolean'
		]);
        // dd($validated);
        $request_parent_id = $request->input('parent_id');
        // dd( $request_parent_id);
        if($request_parent_id == null){
            $request_parent_id = 0;
        }
        // dd($request_parent_id);
  
        $vehicleCategory = new VehicleCategory;
        $vehicleCategory->capacity = $request->input('capacity');
        $vehicleCategory->parent_id = $request_parent_id;
        $vehicleCategory->name = $request->input('name');
        $vehicleCategory->status = $request->input('status');

      
        if ($icon = $request->file('icon')) {
            $destinationPath = 'admin/uploads/vehicleImage';
            $profileImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $profileImage);
            $input['icon'] = "$profileImage";
        }
        // dd($image);
        $vehicleCategory->icon = $profileImage;

        $vehicleCategory->save();
        return back()->with('VehicleCategorySuccess','Vehicle Category Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleCategory $vehicleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\VehicleCategory  $vehicleCategory
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
        $edit_vehicleCategory = VehicleCategory::where('_id', $id)->first();
        // dd($edit_vehicleCategory);
        return view('admin.pages.setting.vehicle.vehicle_category', ['vehicleCategory'=>$vehicleCategory,'edit_vehicleCategory'=> $edit_vehicleCategory,'datasession'=>$datasession]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {    
        $storeData = $request->validate([
            'icon' => 'required|mimes:jpg,png,jpeg|max:2048',
            'name' => 'required|string|min:3|max:255',
            'capacity' => 'required',
            'status' => 'required|boolean'

        ]);

        if ($request->hasfile('icon')) {
            $imageName = rand(0000, 9999) . '.' . $request->icon->extension();
            $request->icon->move('admin/uploads/vehicleImage', $imageName);
            $request->icon = $imageName;
            $storeData['icon'] = $imageName;
        }

        $vehicleCategory = new VehicleCategory;
        $vehicleCategory = VehicleCategory::where('_id', $id)->update($storeData);
        return redirect('admin/vehicle/category')->with('VehicleCategorySuccess', 'Vehicle Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleCategory = VehicleCategory::where('_id', $id)->delete();
        return back()->with('VehicleCategorySuccess', 'Vehicle Category Deleted Successfully!');
    }
}
