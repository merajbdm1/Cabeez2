<?php

namespace App\Http\Controllers;

use App\Models\Riders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Carbon;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Date;

class RidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)


    {

        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');
        }
          $riders= new Riders();
            $viewrid=$riders->get();


        return view('admin.pages.riders.rider', ['viewrid' => $viewrid,'datasession' => $datasession]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');
        }
        return view('admin.pages.riders.create', ['datasession' => $datasession]);
    }

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
            'first_name' => 'required|string',
            'last_name' => '',
            'email' => 'required',
            'phone_number' => 'required',
            'status' => '',
            'photo *' => '',

            // 'driver_email' => 'required|email|min:3|max:255',
            // 'vehicle_year' => 'required',
            // 'driver_vehicle_registration_number' => 'required|string|min:3|max:255',
            // 'driver_vehicle_make' => 'required|string',
            // 'driver_vehicle_model' => 'required|string',
            // 'driver_vehicle_category' => 'required|string',

        ]);

        // if (isset(Riders::all()->last()->rider_id)) {
        //     $rider_id = Riders::all()->last()->rider_id;
        //     $rider_id++;
        // } else {
        //     $rider_id = 1;
        // }


        $rider = new Riders();
        $rider->first_name = $request->input('first_name');
        $rider->last_name = $request->input('last_name');

        $rider->email = $request->input('email');
        $rider->phone_number = $request->input('phone_number');
        $rider->status = $request->input('status');


        if ($photo = $request->file('photo')) {
            $destinationPath = 'admin/uploads/Riders';
            $profileImage = rand(0000, 9999) . $photo->getClientOriginalName();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
            $rider->photo = $profileImage;
        }


        $rider->save();
        return redirect('admin/riders')->with('RiderDetailSuccess', 'Rider Details Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riders  $riders
     * @return \Illuminate\Http\Response
     */
    public function show(Riders $riders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riders  $riders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');
        }
        // $riders = Riders::all();
        $rider = Riders::where('_id', $id)->first();

        // return $rider;
        return view('admin.pages.riders.edit', ['rider' => $rider, '_id' => $id,'datasession'=>$datasession]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Riders  $riders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => '',
            'email' => 'required',
            'phone_number' => 'required',
            'status' => '',
            'photo' => '',

        ]);
        $id = $request->input('id');
        $riders = new Riders();
        $riders->first_name = $request->input('first_name');
        $riders->last_name = $request->input('last_name');

        $riders->email = $request->input('email');
        $riders->phone_number = $request->input('phone_number');
        $riders->status = $request->input('status');
        $riders->photo = $request->input('photo');

        $riders->where('_id', $id)->update($validated);
        //  $promoCode = VehicleCategory::where('_id', $id)->update($storeData);
        return redirect('admin/riders')->with('RiderDetailSuccess', 'Riders Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riders  $riders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rider = Riders::where('_id', $id)->first();
        $rider->delete();
        return redirect('admin/riders')->with('RiderDetailSuccess', 'Rider Deleted Successfully!');
    }
}
