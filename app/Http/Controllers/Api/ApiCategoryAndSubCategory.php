<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\VehicleCategory;
use App\Models\admin\VehicleModel;
use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Carbon;

class ApiCategoryAndSubCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {



        $vehP=new VehicleCategory();
        // $id=$request->input('_id');
        $showparentonly=$vehP->where('parent_id',0)->where('status','active')->get();

        if($showparentonly == true){
        return response()->json([
            'status' => 200,
            'message' => 'Parent category founded successfully',
            'data' => $showparentonly,
            'image_url' => url(asset('admin/uploads/vehicleImage')),
        ],200);
    }else{
        return response()->json([
            'status' => 404,
            'message' => 'Parent id does not exist',

        ],404);
    }
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

    public function showChildCategory(Request $request)
    {
        $vehP=new VehicleCategory();
        $vehmode=new VehicleModel();
        $id=$request->input('parent_id');
        $showparentonly=$vehP->where('parent_id',$id)->where('status','active')->get();

        if($showparentonly == true){
        return response()->json([
            'status' => 200,
            'message' => 'Child category founded successfully',
            'data' => $showparentonly,
            'image_url' => url(asset('admin/uploads/vehicleImage')),
        ],200);
    }else{
        return response()->json([
            'status' => 404,
            'message' => 'Parent id does not exist',


        ],404);
    }
    }

    public function searchmodelwithCategory(Request $request)
    {

        $vehmode=new VehicleModel();
        $id=$request->input('category_id');
        $showparentonly=$vehmode->where('category_id',$id)->where('status','active')->get();

        if($showparentonly == true){
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Model founded successfully',
            'data' => $showparentonly,
            'image_url' => url(asset('admin/uploads/vehicleImage')),
        ],200);
    }else{
        return response()->json([
            'status' => 404,
            'message' => 'Parent id does not exist',

        ],404);
    }
    }

}
