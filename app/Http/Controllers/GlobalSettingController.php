<?php

namespace App\Http\Controllers;

use App\Models\GlobalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class GlobalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        $GlobalSetting=new GlobalSetting();
        $viewglobalsett=$GlobalSetting->all();

        return view('admin.pages.setting.global.viewGlobalsetting', ["viewglobalsett"=>$viewglobalsett,"datasession" => $datasession]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }



        return view('admin.pages.setting.global.addGlobalsetting', ["datasession" => $datasession]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|string',
            'client_secreat_key' => '',
            'api_map_sdk_key'=>'',
            'status' => '',

        ]);


        $rider = new GlobalSetting();
        $rider->client_id = $request->input('client_id');
        $rider->client_secreat_key = $request->input('client_secreat_key');
        $rider->status = $request->input('status');
        $rider->save();


        return back()->with('DriverDetailSuccess', 'Added Successfully!');
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

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        $ediglobalsett = GlobalSetting::where('_id', $id)->first();

        // return $rider;
        return view('admin.pages.setting.global.edit_globalsetting', ["ediglobalsett"=>$ediglobalsett,"datasession" => $datasession]);
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

        $validated = $request->validate([
            'client_id' => '',
            'client_secreat_key' => '',
            'api_map_sdk_key'=>'',
            'status' => '',


        ]);
        // $id = $request->input('_id');


        //  dd($promoCode);exit();
        $promoCode = new GlobalSetting();
        $promoCode->client_id = $request->input('client_id');
        $promoCode->client_secreat_key = $request->input('client_secreat_key');
        $promoCode->status = $request->input('status');

        GlobalSetting::where('_id', $id)->update($validated);
        // $promoCode->where('_id'.$id)->update($validated);
        //  $promoCode = VehicleCategory::where('_id', $id)->update($storeData);
        // return redirect('admin/edit_driver/'.$id)->with('EditDriverDetailSuccess', 'Driver Details Updated Successfully!');
        return redirect('edit_global_map/'.$id)->with('PromocodeSuccess', 'Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = GlobalSetting::all();
        $driver = GlobalSetting::where('_id', $id)->delete();
        return back()->with('DriverDetailSuccess', 'Deleted successfully!');

    }
}
