<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\admin\Driver;
use Illuminate\Support\Carbon;
use App\Models\admin\VehicleCategory;
class DriverRequestController extends Controller
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
        $viewdriver = new Driver();

        $keyword = $request->input('fname');
        // dd($keyword);
        $lastname=$request->input('lname');
        $email=$request->input('email');
        $mobile_number=$request->input('phone_number');
        $onoff = $request->input('is_available');
        // $intonoff = (int)$onoff;
        $intonoff = (int)$onoff;

        // $intonoffCAT = (int)$categor_id;


            $fromDateTo=request('fromDate');
            $toDateTo=request('ToDate');

        //  dd($fromDateTo);
            $fromDate =(isset($fromDateTo)) ? Carbon::createFromFormat('Y-m-d', $fromDateTo)->startOfDay() : null;

            $toDate = (isset($toDateTo)) ? Carbon::createFromFormat('Y-m-d', $toDateTo)->endOfDay() : null;

            $strfrmDateSingle = strval($fromDate);


            $strtoDateSingle = strval($toDate);
            //dd($strtoDateSingle);
        // $intonoff = (int)$onoff;

        // dd($fromDateTo);

        if($keyword || $lastname || $email || $mobile_number || $intonoff){
            $driver = $viewdriver->where('first_name', 'LIKE', "%".$keyword ."%")
            ->orWhere('last_name', 'LIKE', "%".$lastname."%")
            ->orwhere('email', 'LIKE', "%".$email."%")
            ->orwhere('phone_number', 'LIKE', "%".$mobile_number."%")
            ->orwhere('is_available',$intonoff)
            ->where('status', 'inactive')
            // ->orwhere('category_id', $intonoffCAT)
            // ->wherebetween('created_at',[$strfrmDateSingle,$strtoDateSingle])
            ->paginate(25);

        }
        elseif ($strfrmDateSingle && $strtoDateSingle) {
            $driver = $viewdriver->orwherebetween('created_at',[$strfrmDateSingle,$strtoDateSingle])->where('status', 'inactive')->paginate(25);
        }
        else{
        $driver = $viewdriver->where('status', 'inactive')->paginate(25);
        }
        $driver_veh_cat=new VehicleCategory();
        $vehicle_driv=$driver_veh_cat->all();


        $driver=Driver::where('status','inactive')->paginate(25);

        return view('admin.pages.driverrequest.view_driver_request', ['driver' => $driver,"datasession" => $datasession ,'vehicle_driv'=>$vehicle_driv]);
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
}
