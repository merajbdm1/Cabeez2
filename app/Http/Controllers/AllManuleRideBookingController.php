<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\MenualRideBooking;
use App\Models\admin\VehicleCategory;
use App\Models\Rides;
use GuzzleHttp\Client;
use App\Models\admin\Driver;
class AllManuleRideBookingController extends Controller
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

            $all_vehicle_cat = VehicleCategory::all();
            $dff = Rides::all();
           
            $all_driver = Driver::all();
            
            return view('admin.pages.manual_ride_booking.all_manual_ride_booking',['datasession' => $datasession,'all_vehicle_cat'=>$all_vehicle_cat,'dff'=>$dff,'all_driver'=>$all_driver]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $client = new Client();

            $response = $client->request('POST', 'https://outpost.mapmyindia.com/api/security/oauth/token', [
                'form_params' => [
                    'grant_type' => 'client_credentials',
                    // 'client_id' => '33OkryzDZsJ5zN81E9FCF9vruFDY_8wEJySBHTVN2YroM6YVpgCRG8GjfY_w_wHLGWA24P-wObVzK2I7yH0AtQ==',
                    'client_id' => '33OkryzDZsJ5zN81E9FCF9vruFDY_8wEJySBHTVN2YroM6YVpgCRG8GjfY_w_wHLGWA24P-wObVzK2I7yH0AtQ==',

                    // 'client_secret' => 'lrFxI-iSEg_7x4WFo74p0-leBomnlnqQTpyHrd7f--g-2lk3ZpOOZwBvabvkCEVBSC1yny1ymG7pZN0FkXFrzi8og6fFRBF7',

                    'client_secret' => 'lrFxI-iSEg_7x4WFo74p0-leBomnlnqQTpyHrd7f--g-2lk3ZpOOZwBvabvkCEVBSC1yny1ymG7pZN0FkXFrzi8og6fFRBF7',
                ]
            ]);

            $body = $response->getBody();
            $data = json_decode($body);
            return  $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
        $menual_ride=$request->validate([
           
            'start_date'=>'',
            'end_date'=>'',
            'pickup_time'=>'',
            'drop2'=>'string',
            'driver_id'=>'',
            'pickup2'=>'string',
            'category_id'=>'',
            'pickup_address'=>'',
            'pick_up_postcode'=>'string',
            'pick_up_latitude'=>'float',
            'pick_up_longitude'=>'float',
            'drop_off_address'=>'string',
            'drop_off_postcode'=>'string',
            'drop_off_latitude'=>'float',
            'drop_off_longitude'=>'float',
            'accept_latitude'=>'float',
            'accept_longitude'=>'float',
            'start_latitude'=>'float',
            'start_longitude'=>'float',
            'end_latitude'=>'float',
            'end_longitude'=>'float',
        

        ]);
        // dd($menual_ride);   

        $department = new Rides;
        $department->create($menual_ride);    

        // $user = Rides::create($menual_ride)->with('success_message', 'Menual Ride Booking Added Successfully!');
        return back()->with('success_message', 'Menual Ride Booking Added Successfully!');
        // dd($user);
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

        $all_vehicle_cat = VehicleCategory::all();
        $dff = Rides::all();

        $edit_menual_ride= Rides::where('_id', $id)->first();
        // dd($edit_menual_ride);
        // return $rider;
        $all_driver = Driver::all();
        return view('admin.pages.manual_ride_booking.edit_menual_ride',['datasession' => $datasession,'all_vehicle_cat'=>$all_vehicle_cat,'dff'=>$dff,'all_driver'=>$all_driver,'edit_menual_ride'=>$edit_menual_ride]);

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
    public function show2()
    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');

        }
        $all_vehicle_cat = VehicleCategory::all();
        $dff = Rides::all();
       
      
        // dd($dff);

        return view('admin.pages.manual_ride_booking.view_menual_ride_booking',['datasession' => $datasession,'all_vehicle_cat'=>$all_vehicle_cat,'dff'=>$dff]);
        // 
    }

    public function show3()
    {
    
        $dff = Rides::all();

        return response()->json( $dff);
        

        // 
    }
}
