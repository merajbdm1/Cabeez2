<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riders;
use Illuminate\Validation\Validator;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Countable;

class ApiRider extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rider=new Riders();
        $getData = $rider->all();

        return response()->json(
            [
                "data" => [
                    "type" => "Rider List",
                    "message" => "Success",
                    "data" => $getData,
                ],
            ]
        );


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $ridercreate=new Riders();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $mobile_number=$request->input('phone_number');

        $checkmobileno=Riders::where('phone_number',$mobile_number)->first();

        if($checkmobileno == true){

                $currentDateTime = Carbon::now();
                $newDateTime =$currentDateTime->addSeconds(180);
                $mob_number=Riders::where('phone_number',$mobile_number)->update(['otp'=>rand(1000,9999),'expire_at'=>date($newDateTime)]);
                $updated_otp=Riders::where('phone_number',$mobile_number)->pluck('otp')->first();

                $datanewOTP = array(
                        "_id" =>$checkmobileno['_id'],
                        "phone_number" =>$checkmobileno['phone_number'],
                        "otp" =>$updated_otp
                    );
                    return response()->json([
                        'status' => 200,
                        'message' => 'New Otp Generated',
                        'data' => $datanewOTP
                    ],200);
            }
         else{

            $validated = Validator($request->all(),
            [
            // 'first_name' => '',
            // 'last_name'=>'',
            // 'email'=>'required|email',
            'phone_number'=>'required|min:10|max:10',
            // 'photo'=>'',
            // 'address',
            // 'latitude',
            // 'longitude',
            // 'verify_token',
            // 'customer_type',
            // 'referral_code',
            // 'is_referred',
            // 'referred_by',
            // 'referred_by_type',
            // 'status',
            // 'access_token',
            // 'device_id',
            // 'device_type',
            // 'device_info',
            // 'razorpay_customer_id',
            // 'razorpay_account_id',
            // 'razorpay_account_status',
            // 'api_log',
            // 'last_login',
            // 'avg_rating',
            // 'total_referral',
            // 'referral_earning',
            // 'bonus_earning',
            // 'total_earning',
            // 'earning_paid',
            // 'earning_balance',
            // 'build_version'
            ],
            [
            // 'email.required'=> 'Your Email is required',
            // 'email.email'=> 'Your Email should be a valid email address',
            'phone_number.required'=> 'Your phone number is required',
            'phone_number.min'=> 'Your phone number should be Minimum 10 character',
            'phone_number.max'=> 'Your phone number should not be Miximum 10 character'
             ]
             );

            //  echo "run";exit;
            if ($validated->fails())
            {

                // echo "run";exit;
               return $validated->errors();
                // echo "run";exit;
            }
            //      if($photo = $request->file('photo')) {
            //     $destinationPath = 'admin/uploads/Driver';
            //     $profileImage = rand(0000, 9999) . $photo->getClientOriginalName();
            //     $photo->move($destinationPath, $profileImage);

            // }

            $rider= new Riders();
            $currentDateTime = Carbon::now();
            $newDateTime =$currentDateTime->addSeconds(180);
            $data = [
                // 'first_name'=>$request->first_name,
                // 'last_name'=>$request->last_name,
                // 'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'expire_at' =>date($newDateTime),
                'otp'=>rand(1000,9999),
                // 'photo'=>$profileImage,
                // 'address'=>$request->address,
                // 'latitude'=>$request->latitude,
                // 'longitude'=>$request->longitude,
                // 'verify_token'=>$request->verify_token,
                // 'customer_type'=>$request->customer_type,
                // 'referral_code'=>$request->referral_code,
                // 'is_referred'=>$request->is_referred,
                // 'referred_by'=>$request->referred_by,

                // 'referred_by_type'=>$request->referred_by_type,
                // 'status'=>$request->status,
                // 'access_token'=>$request->access_token,
                // 'device_id'=>$request->device_id,
                // 'device_type'=>$request->device_type,
                // 'device_info'=>$request->device_info,
                // 'razorpay_customer_id'=>$request->razorpay_customer_id,
                // 'razorpay_account_id'=>$request->razorpay_account_id,
                // 'razorpay_account_status'=>$request->razorpay_account_status,
                // 'api_log'=>$request->api_log,
                // 'last_login'=>$request->last_login,
                // 'avg_rating'=>$request->avg_rating,
                // 'total_referral'=>$request->total_referral,
                // 'referral_earning'=>$request->referral_earning,
                // 'bonus_earning'=>$request->bonus_earning,
                // 'total_earning'=>$request->total_earning,
                // 'earning_paid'=>$request->earning_paid,
                // 'earning_balance'=>$request->earning_balance,
                // 'build_version'=>$request->build_version,
            ];
            // print_r($data);exit;

          $datata= $rider->create($data);
            return response()->json([
                'status' => 200,
                'message' => 'New Rider Register successfully',
                'data' => $datata,
                // 'image_url' => url(asset('admin/uploads/Driver')),
            ],200);



    }

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



    public function login(Request $request){

        $validated = Validator($request->all(),
            [
            'phone_number'=>'required',
            'otp'=>'required'
            ],
            [
            'phone_number.min'=> 'Your phone number should be Minimum 10 character',
            'phone_number.max'=> 'Your phone number should not be Miximum 10 character',
            'otp.required'=> 'Please Enter Your OTP'

             ]
            );

         if ($validated->fails())
         {
             return $validated->errors();
         }

        else{

        $mobile_number=$request->input('phone_number');
        $otp=$request->input('otp');
        $now = Carbon::now();

        if($mobile_number && $otp){

            $checkridermobile=new Riders();
            $userData=$checkridermobile->where('phone_number',$mobile_number)->first();

            if( $userData ){
                $dbOtp = $userData['otp'];
                if ( $dbOtp == $otp ) {
                    if($userData && $now->isBefore($userData->expire_at)){
                    $data = array(
                        "_id" =>$userData['_id'],
                        "first_name" =>$userData['first_name'],
                        "last_name" =>$userData['last_name'],
                        "email" =>$userData['email'],
                        "phone_number" =>$userData['phone_number']

                      );
                      return response()->json([
                        'status' => 200,
                        'message' => 'Rider Login Successfully',
                        
                        'data' => $data
                    ],200);
                 }else{
                    return response()->json([
                        'status' => 422,
                        'message' => 'Otp has been expired',

                    ],422);
                }

            }else {

                $message  = ( 'Otp is not valid' );
               return response()->json(array(
                    'status'      =>  422,
                    'message'   =>  $message
                ), 422);
            }

          }
        else
        {
            return response()->json([
                'status' => 422,
                'message' => 'Your phone number is not registered',

            ],422);
        }

    }


    }
    }

    public function UpdateProfile(Request $request){

        $phone_number=$request->input('phone_number');

        $validated = Validator($request->all(),
        [
        'first_name' => '',
        'last_name'=>'',
        'email'=>'required|email',
        // 'phone_number'=>'required|min:10|max:10',
        'photo'=>'',
        'address',
        'latitude',
        'longitude',
        'verify_token',
        'customer_type',
        'referral_code',
        'is_referred',
        'referred_by',
        'referred_by_type',
        'status',
        'access_token',
        'device_id',
        'device_type',
        'device_info',
        'razorpay_customer_id',
        'razorpay_account_id',
        'razorpay_account_status',
        'api_log',
        'last_login',
        'avg_rating',
        'total_referral',
        'referral_earning',
        'bonus_earning',
        'total_earning',
        'earning_paid',
        'earning_balance',
        'build_version'
        ],
        [
        'email.required'=> 'Your Email is required',
        'email.email'=> 'Your Email should be a valid email address',
        // 'phone_number.required'=> 'Your phone number is required',
        // 'phone_number.min'=> 'Your phone number should be Minimum 10 character',
        // 'phone_number.max'=> 'Your phone number should not be Miximum 10 character'
         ]
         );


        if ($validated->fails())
        {

           return $validated->errors();

        }
             if($photo = $request->file('photo')) {
            $destinationPath = 'admin/uploads/Driver';
            $profileImage = rand(0000, 9999) . $photo->getClientOriginalName();
            $photo->move($destinationPath, $profileImage);

        }


        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            // 'expire_at' =>date($newDateTime),
            // 'otp'=>rand(1000,9999),
            'photo'=>(isset($profileImage))?$profileImage:null,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'verify_token'=>$request->verify_token,
            'customer_type'=>$request->customer_type,
            'referral_code'=>$request->referral_code,
            'is_referred'=>$request->is_referred,
            'referred_by'=>$request->referred_by,

            'referred_by_type'=>$request->referred_by_type,
            'status'=>$request->status,
            'access_token'=>$request->access_token,
            'device_id'=>$request->device_id,
            'device_type'=>$request->device_type,
            'device_info'=>$request->device_info,
            'razorpay_customer_id'=>$request->razorpay_customer_id,
            'razorpay_account_id'=>$request->razorpay_account_id,
            'razorpay_account_status'=>$request->razorpay_account_status,
            'api_log'=>$request->api_log,
            'last_login'=>$request->last_login,
            'avg_rating'=>$request->avg_rating,
            'total_referral'=>$request->total_referral,
            'referral_earning'=>$request->referral_earning,
            'bonus_earning'=>$request->bonus_earning,
            'total_earning'=>$request->total_earning,
            'earning_paid'=>$request->earning_paid,
            'earning_balance'=>$request->earning_balance,
            'build_version'=>$request->build_version,
        ];
        // print_r($data);exit;
      $rider=new Riders();
      $datata =$rider->where('phone_number',$phone_number)->update($data);
      $dataiop=$rider->where('phone_number',$phone_number)->first();
        return response()->json([
            'status' => 200,
            'message' => 'Rider Updated successfully',
            'data' => $dataiop,
            // 'image_url' => url(asset('admin/uploads/Driver')),
        ],200);

        }


    }




