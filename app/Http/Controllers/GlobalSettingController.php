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
            // dd($GlobalSetting);exit;

        $restmapkey=$GlobalSetting->pluck('rest_map_sdk_key','_id')->first();
        $map_my_india_client_key=$GlobalSetting->pluck('map_my_india_client_key','_id')->first();
        $map_my_india_secret_key=$GlobalSetting->pluck('map_my_india_secret_key','_id')->first();
        $night_fare_start_time=$GlobalSetting->pluck('night_fare_start_time','_id')->first();
        $night_fare_end_time=$GlobalSetting->pluck('night_fare_end_time','_id')->first();
        $night_fare_multiplyaer=$GlobalSetting->pluck('night_fare_multiplyaer','_id')->first();
        // dd($night_fare_end_time);exit;
        return view('admin.pages.setting.global.viewGlobalsetting', ["night_fare_multiplyaer"=>$night_fare_multiplyaer,"night_fare_end_time"=>$night_fare_end_time,"night_fare_start_time"=>$night_fare_start_time,"map_my_india_client_key"=>$map_my_india_client_key,"map_my_india_secret_key"=>$map_my_india_secret_key,"restmapkey"=>$restmapkey,"datasession" => $datasession]);
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


        // return $request;
        $validated = $request->validate([
            'description' =>'',
            'status' => '',

        ]);


        $rider = new GlobalSetting();
        // dd($rider);exit;

        $rider->description = $request->input('description');
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
        // return $request;
        $validated = $request->validate([

            'description' => '',
            'status' => '',


        ]);
        // $id = $request->input('_id');


        //  dd($promoCode);exit();
        $promoCode = new GlobalSetting();
        $promoCode->description = $request->input('description');
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

    public function editsmkey($id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $clientapikey = GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $clientapikey = GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $secretkey = GlobalSetting::pluck('map_my_india_secret_key','_id')->first();
        $ng_start_time=GlobalSetting::pluck('night_fare_start_time','_id')->first();
        $ng_end_time=GlobalSetting::pluck('night_fare_end_time','_id')->first();
        $night_fare_multiplyaer=GlobalSetting::pluck('night_fare_multiplyaer','_id')->first();

        // return $night_fare_multiplyaer;
        return view('admin.pages.setting.global.edit_restmapsdkkey', ["night_fare_multiplyaer"=>$night_fare_multiplyaer,"ng_end_time"=>$ng_end_time,"ng_start_time"=>$ng_start_time,"secretkey"=>$secretkey,"edimapsdkkey"=>$edimapsdkkey,"clientapikey"=>$clientapikey,"datasession" => $datasession]);
    }

    public function updatemapsdkkey(Request $request,$edimapsdkkey)
    {


        $validated = $request->validate([

            'rest_map_sdk_key' => '',
            'status' => '',


        ]);

        GlobalSetting::where('rest_map_sdk_key', $edimapsdkkey)->update($validated);

        // $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();

        // return $edimapsdkkey;
        return redirect('view_global');

    }
    public function edit_client_key($id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $restmapkey= GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $clientapikey = GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $secretkey = GlobalSetting::pluck('map_my_india_secret_key','_id')->first();
        $ng_start_time=GlobalSetting::pluck('night_fare_start_time','_id')->first();
        $ng_end_time=GlobalSetting::pluck('night_fare_end_time','_id')->first();
        $night_fare_multiplyaer=GlobalSetting::pluck('night_fare_multiplyaer','_id')->first();


        // return $clientapikey;
        return view('admin.pages.setting.global.edit_client_api_key', ["night_fare_multiplyaer"=>$night_fare_multiplyaer,"ng_end_time"=>$ng_end_time,"ng_start_time"=>$ng_start_time,"secretkey"=>$secretkey,"restmapkey"=>$restmapkey,"edimapsdkkey"=>$edimapsdkkey,"clientapikey"=>$clientapikey,"datasession" => $datasession]);
    }

    public function updateCleintApiKey(Request $request,$clientapikey)
    {

        $validated = $request->validate([

            'map_my_india_client_key' => '',
            'status' => '',


        ]);
        GlobalSetting::where('map_my_india_client_key', $clientapikey)->update($validated);

        // $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();

        // return $edimapsdkkey;
        return redirect('view_global');

    }

    public function edit_secret_key($id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $restmapkey= GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $clientapikey = GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $secretkey = GlobalSetting::pluck('map_my_india_secret_key','_id')->first();
        $map_my_india_client_key=GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $ng_start_time=GlobalSetting::pluck('night_fare_start_time','_id')->first();
        $ng_end_time=GlobalSetting::pluck('night_fare_end_time','_id')->first();
        $night_fare_multiplyaer=GlobalSetting::pluck('night_fare_multiplyaer','_id')->first();

        // return $clientapikey;
        return view('admin.pages.setting.global.edit_secretkey', ["night_fare_multiplyaer"=>$night_fare_multiplyaer,"ng_end_time"=>$ng_end_time,"ng_start_time"=>$ng_start_time,"map_my_india_client_key"=>$map_my_india_client_key,"clientapikey"=>$clientapikey,"restmapkey"=>$restmapkey,"edimapsdkkey"=>$edimapsdkkey,"secretkey"=>$secretkey,"datasession" => $datasession]);
    }


    public function updateSecretKey(Request $request,$secretapikey)
    {

        $validated = $request->validate([

            'map_my_india_secret_key' => '',
            'status' => '',


        ]);
        GlobalSetting::where('map_my_india_secret_key', $secretapikey)->update($validated);

        // $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();

        // return $edimapsdkkey;
        return redirect('view_global');

    }

    public function ng_start_time($id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $restmapkey= GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $clientapikey = GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $secretkey = GlobalSetting::pluck('map_my_india_secret_key','_id')->first();
        $map_my_india_client_key=GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $ng_start_time=GlobalSetting::pluck('night_fare_start_time','_id')->first();
        $ng_end_time=GlobalSetting::pluck('night_fare_end_time','_id')->first();
        $night_fare_multiplyaer=GlobalSetting::pluck('night_fare_multiplyaer','_id')->first();

        // return $clientapikey;
        return view('admin.pages.setting.global.edit_ng_start_time', ["night_fare_multiplyaer"=>$night_fare_multiplyaer,"ng_end_time"=>$ng_end_time,"ng_start_time"=>$ng_start_time,"map_my_india_client_key"=>$map_my_india_client_key,"clientapikey"=>$clientapikey,"restmapkey"=>$restmapkey,"edimapsdkkey"=>$edimapsdkkey,"secretkey"=>$secretkey,"datasession" => $datasession]);
    }



    public function update_ng_start_time(Request $request,$ng_start_time)
    {

        $validated = $request->validate([

            'night_fare_start_time' => '',
            'status' => '',


        ]);
        GlobalSetting::where('night_fare_start_time', $ng_start_time)->update($validated);

        // $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();

        // return $edimapsdkkey;
        return redirect('view_global');

    }

    public function ng_end_time($id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $restmapkey= GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $clientapikey = GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $secretkey = GlobalSetting::pluck('map_my_india_secret_key','_id')->first();
        $map_my_india_client_key=GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $ng_start_time=GlobalSetting::pluck('night_fare_start_time','_id')->first();
        $ng_end_time=GlobalSetting::pluck('night_fare_end_time','_id')->first();
        $night_fare_multiplyaer=GlobalSetting::pluck('night_fare_multiplyaer','_id')->first();
        // return $clientapikey;
        return view('admin.pages.setting.global.edit_ng_end_time', ["night_fare_multiplyaer"=>$night_fare_multiplyaer,"ng_end_time"=>$ng_end_time,"ng_start_time"=>$ng_start_time,"map_my_india_client_key"=>$map_my_india_client_key,"clientapikey"=>$clientapikey,"restmapkey"=>$restmapkey,"edimapsdkkey"=>$edimapsdkkey,"secretkey"=>$secretkey,"datasession" => $datasession]);
    }

    public function  update_ng_end_time(Request $request,$ng_end_time)
    {

        $validated = $request->validate([

            'night_fare_end_time' => '',
            'status' => '',


        ]);
        GlobalSetting::where('night_fare_end_time', $ng_end_time)->update($validated);

        // $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();

        // return $edimapsdkkey;
        return redirect('view_global');

    }


    public function nightPlayer($id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $restmapkey= GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();
        $clientapikey = GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $secretkey = GlobalSetting::pluck('map_my_india_secret_key','_id')->first();
        $map_my_india_client_key=GlobalSetting::pluck('map_my_india_client_key','_id')->first();
        $ng_start_time=GlobalSetting::pluck('night_fare_start_time','_id')->first();
        $ng_end_time=GlobalSetting::pluck('night_fare_end_time','_id')->first();
        $night_fare_multiplyaer=GlobalSetting::pluck('night_fare_multiplyaer','_id')->first();
        // return $clientapikey;
        return view('admin.pages.setting.global.edit_night_Player', ["night_fare_multiplyaer"=>$night_fare_multiplyaer,"ng_end_time"=>$ng_end_time,"ng_start_time"=>$ng_start_time,"map_my_india_client_key"=>$map_my_india_client_key,"clientapikey"=>$clientapikey,"restmapkey"=>$restmapkey,"edimapsdkkey"=>$edimapsdkkey,"secretkey"=>$secretkey,"datasession" => $datasession]);
    }



    public function  update_night_player(Request $request,$night_fare_multiplyaer)
    {

        $validated = $request->validate([

            'night_fare_multiplyaer' => '',
            'status' => '',


        ]);
        GlobalSetting::where('night_fare_multiplyaer', $night_fare_multiplyaer)->update($validated);

        // $edimapsdkkey = GlobalSetting::pluck('rest_map_sdk_key','_id')->first();

        // return $edimapsdkkey;
        return redirect('view_global');

    }





}
