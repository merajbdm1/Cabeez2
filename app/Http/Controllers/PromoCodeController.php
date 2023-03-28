<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class PromoCodeController extends Controller
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
        $promocode = PromoCode::all();

        // dd($promocode);
        return view('admin.pages.coupon.promo', ['promocode' => $promocode,'datasession' => $datasession]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');

        }

        // dd($promocode);
        return view('admin.pages.coupon.add_promocode', ['datasession' => $datasession]);

    }
    //$request->all()->save();
    //dd($request->all());


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
            'code' => '',
            'code_type'=>'',
            'code_rule'=>'',
            // 'driver_last_name' => 'required|string|min:3|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'title' => 'required',
            'discount' => 'required',
            'discount_type' => 'required',
            'limit_per_user' => 'required',
            'max_discount'=>'required',
            'term_condition'=>'required',
            'usage_limit'=>'required',

            // 'driver_email' => 'required|email|min:3|max:255',
            // 'vehicle_year' => 'required',
            // 'driver_vehicle_registration_number' => 'required|string|min:3|max:255',
            // 'driver_vehicle_make' => 'required|string',
            // 'driver_vehicle_model' => 'required|string',
            // 'driver_vehicle_category' => 'required|string',

        ]);
        $promoCode = new PromoCode();
        $promoCode->code = $request->input('code');
        $promoCode->title = $request->input('title');

        $promoCode->discount_type = $request->input('discount_type');
        $promoCode->discount = $request->input('discount');
        $promoCode->max_discount = $request->input('max_discount');
        $promoCode->limit_per_user = $request->input('limit_per_user');

        $promoCode->start_date = $request->input('start_date');
        $promoCode->end_date = $request->input('end_date');
        $promoCode->status = $request->input('status');
        $promoCode->term_condition = $request->input('term_condition');
        $promoCode->max_discount = $request->input('max_discount');
        $promoCode->usage_limit = $request->input('usage_limit');
        $promoCode->code_rule = $request->input('code_rule');


        $promoCode->save();
        return back()->with('PromocodeSuccess', 'Promo code Details Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');

        }
        $promocode = PromoCode::all();
        $edit_promocode = PromoCode::where('_id', $id)->first();
        // $edit_promocode =  json_decode(json_encode($edit_promocode), true);
        // $edit_promocode = $edit_promocode[0];
        //dd($edit_promocode);
        return view('admin.pages.coupon.edit_promocode', ['promocode' => $promocode, 'edit_promocode' => $edit_promocode, '_id' => $id,'datasession' => $datasession]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // return $request;
        $validated = $request->validate([
            'code' => '',
            'code_type'=>'',
            'code_rule'=>'',
            // 'driver_last_name' => 'required|string|min:3|max:255',
            'start_date' => '',
            'end_date' => '',
            'title' => '',
            'discount' => '',
            'discount_type' => '',
            'limit_per_user' => '',
            'max_discount'=>'',
            'term_condition'=>'',
            'usage_limit'=>'',
            // 'driver_email' => 'required|email|min:3|max:255',
            // 'vehicle_year' => 'required',
            // 'driver_vehicle_registration_number' => 'required|string|min:3|max:255',
            // 'driver_vehicle_make' => 'required|string',
            // 'driver_vehicle_model' => 'required|string',
            // 'driver_vehicle_category' => 'required|string',

        ]);
        // $id = $request->input('_id');


        //  dd($promoCode);exit();
        $promoCode = new PromoCode();
        $promoCode->code = $request->input('code');
        $promoCode->title = $request->input('title');

        $promoCode->discount_type = $request->input('discount_type');
        $promoCode->discount = $request->input('discount');
        $promoCode->max_discount = $request->input('max_discount');
        $promoCode->limit_per_user = $request->input('limit_per_user');

        $promoCode->start_date = $request->input('start_date');
        $promoCode->end_date = $request->input('end_date');
        $promoCode->status = $request->input('status');
        $promoCode->term_condition = $request->input('term_condition');
        $promoCode->max_discount = $request->input('max_discount');
        $promoCode->usage_limit = $request->input('usage_limit');
        $promoCode->code_rule = $request->input('code_rule');

        PromoCode::where('_id', $id)->update($validated);
        // $promoCode->where('_id'.$id)->update($validated);
        //  $promoCode = VehicleCategory::where('_id', $id)->update($storeData);
        // return redirect('admin/edit_driver/'.$id)->with('EditDriverDetailSuccess', 'Driver Details Updated Successfully!');
        return redirect('edit_promocode/'.$id)->with('PromocodeSuccess', 'Promo Code Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $driver = PromoCode::all();
        $driver = PromoCode::where('_id', $id)->delete();
        return back()->with('PromocodeSuccess', 'Promo Code Updated Successfully!');



    }
}
