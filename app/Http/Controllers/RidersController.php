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

        

        $ridersdata= new Riders();

        // $fromdate=$request->fromDate;
        // $toDate=$request->toDate;
       
        
        $fromdate =(isset($request->fromDate)) ? Carbon::createFromFormat('Y-m-d', $request->fromDate)->startOfDay() : null;
        $toDate = (isset($request->toDate)) ? Carbon::createFromFormat('Y-m-d', $request->toDate)->endOfDay() : null;

        // $fmdate=$_GET['fromDate'];

       // $post = isset($fromdate) &&  $toDate ? Riders::whereBetween('created_at', [$fromdate, $toDate]): $ridersdata;

        if($fromdate && $toDate){


            $post = isset($fromdate) ? Riders::whereBetween('created_at', [$fromdate, $toDate]) : $ridersdata ;
               
                $riders = $post->paginate(10);
        }
        else
        {   
            $drivername= $request->search;
                $ridersdata;
                $post = Riders::where('f_name','LIKE',$drivername);
                //$riders = Riders::paginate(10);
               
        }
        $riders = $post->paginate(10);
        // $serch = $_GET['search'];

       
        // return  $riders;
        //  return $riders;
        // dd($dates);
    //     $month = new Carbon();

    //     $fromDate=$request->fromDate;
    //     $toDate=$request->toDate;

    //    $ddcheck = Riders::whereDate('fromDate', '>=', $fromDate)->whereDate('toDate', '<=', $toDate)->get();

    //     dd($ddcheck);

      
        

     $ridersdata=  Riders::all();
        return view('admin.pages.riders.rider', ['riders' => $riders,'datasession' => $datasession]);

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
        $validated = $request->validate([
            'f_name' => 'required|string',
            'l_name' => '',
            'email' => 'required',
            'contact' => 'required',
            'status' => '',
            'profile_pic *' => '',


            // 'driver_email' => 'required|email|min:3|max:255',
            // 'vehicle_year' => 'required',
            // 'driver_vehicle_registration_number' => 'required|string|min:3|max:255',
            // 'driver_vehicle_make' => 'required|string',
            // 'driver_vehicle_model' => 'required|string',
            // 'driver_vehicle_category' => 'required|string',

        ]);

        if (isset(Riders::all()->last()->rider_id)) {
            $rider_id = Riders::all()->last()->rider_id;
            $rider_id++;
        } else {
            $rider_id = 1;
        }


        $rider = new Riders();
        $rider->rider_id = $rider_id;
        $rider->f_name = $request->input('f_name');
        $rider->l_name = $request->input('l_name');

        $rider->email = $request->input('email');
        $rider->contact = $request->input('contact');
        $rider->status = $request->input('status');


        if ($profile_pic = $request->file('profile_pic')) {
            $destinationPath = 'admin/uploads/Riders';
            $profileImage = rand(0000, 9999) . $profile_pic->getClientOriginalName();
            $profile_pic->move($destinationPath, $profileImage);
            $input['profile_pic'] = "$profileImage";
            $rider->profile_pic = $profileImage;
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
        $riders = Riders::all();
        $rider = Riders::where('_id', $id)->first();
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
            'f_name' => 'required|string',
            'l_name' => '',
            'email' => 'required',
            'contact' => 'required',
            'date_register' => '',
            'total_rides' => '',
            'status' => '',
            'profile_pic' => '',

        ]);
        $id = $request->input('id');
        $riders = new Riders();
        $riders->f_name = $request->input('f_name');
        $riders->l_name = $request->input('l_name');

        $riders->email = $request->input('email');
        $riders->contact = $request->input('contact');
        $riders->date_register = $request->input('date_register');
        $riders->total_rides = $request->input('total_rides');

        $riders->status = $request->input('status');
        $riders->profile_pic = $request->input('profile_pic');

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
