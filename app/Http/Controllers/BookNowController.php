<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Rides;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class BookNowController extends Controller
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

        $getitem=new Rides();

        $getbook = $getitem->paginate(25);
        // dd($getbook);

        return view('admin.BookNow.listbooknow', ['getbook'=>$getbook,'datasession' => $datasession]);
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


        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');
        }

        $showlist=new Rides();

        $showlistitem = $showlist->find($id);
        //dd($showlistitem);

        return view('admin.BookNow.preview_listbooknow', ['showlistitem'=>$showlistitem,'datasession' => $datasession]);

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

    public function product_search(Request $request)
    {
       
            // $employees = Rides::all();
            // return response()->json( collect(['employees' => $employees,])->toJson());
            $id = request('id');
            $intid = (int)$id;
            $ride_number = request('ride_number');

            $rider_id=request('rider_id');
            $intidrider_id = (int)$rider_id;

            $driver_id=request('driver_id');
            $intidriderrr_id = (int)$driver_id;

            $status=request('status');

            $payment_type=request('payment_type');
            $fromDateTo=request('fromDate');
            $toDateTo=request('ToDate');
    

            $fromDate =(isset($fromDateTo)) ? Carbon::createFromFormat('Y-m-d', $fromDateTo)->startOfDay() : null;

            $toDate = (isset($toDateTo)) ? Carbon::createFromFormat('Y-m-d', $toDateTo)->endOfDay() : null;
            
            $fromDateSingle = (isset($fromDateTo)) ? Carbon::createFromFormat('Y-m-d', $fromDateTo)->endOfDay() : null;
 
            $toDateSingle = (isset($toDateTo)) ? Carbon::createFromFormat('Y-m-d', $toDateTo)->startOfDay() : null;
            
            $strToDateSingle = strval($toDateSingle);
            $strFromDate = strval($fromDate);
   
            $strFromDateSingle = strval($fromDateSingle);

            $strToDate = strval($toDate);
            
          

          if($id!='' ){
            // $ride_number = $request->ride_number;
            $employees = DB::table('rides')
            ->where('id',$intid)
            ->get();
            return response()->json( collect(['employees' => $employees,])->toJson());
            }
            else if ($status!='' && $payment_type!='') {
                $employees = DB::table('rides')->Where('status',$status)->Where('payment_type',$payment_type)->get();
                return response()->json( collect(['employees' => $employees,])->toJson());
            }

            else if ($strFromDate!='' && $strToDate!='') {
                $employees = DB::table('rides')->whereBetween('booking_date',[$strFromDate,$strToDate])->get();
             
                return response()->json( collect(['employees' => $employees,])->toJson());
            }
            else if($ride_number!= '' || $intidrider_id!= '' || $intidriderrr_id!= '' || $status!= '' || $payment_type!= '' || $fromDateTo!='' || $toDateTo!='') {
      
                $employees = DB::table('rides')
                    ->orwhere('ride_number',$ride_number)
                    ->orWhere('rider_id',$intidrider_id)
                    ->orwhere('driver_id',$intidriderrr_id)
                    ->orWhere('status',$status)
                    ->orWhere('payment_type',$payment_type)
                    ->orwherebetween('booking_date',[$strFromDate,$strFromDateSingle])
                    ->orwherebetween('booking_date',[$strToDateSingle,$strToDate])
                    ->get();
                return response()->json( collect(['employees' => $employees,])->toJson());
            }
               
             else{

            $employees = Rides::where('is_pre_booking',1)->get();  
            $employees2 = Rides::where('is_pre_booking',0)->get(); 
            // return response()->json(['employees' => $employees]);
            return response()->json( collect(['employees' => $employees,'employees2' =>$employees2])->toJson());
            }
        
    //     if(Session::has('loginId')){
    //         $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
    //     }else{
    //         return redirect('login');
    //     }


    //     $employees = Rides::all();
        

    }
}
