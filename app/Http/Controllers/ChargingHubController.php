<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chargingHub;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class ChargingHubController extends Controller
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
        $charginhhub =new ChargingHub();
        $charginglist=$charginhhub->paginate(10);
        return view('admin.charginghub.view_charging_list',['charginglist'=>$charginglist,'datasession'=>$datasession]);
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

        return view('admin.charginghub.add_charging_hub',['datasession'=>$datasession]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'address'=>'required|string',
            'hub_name'=>'required|string',
            'hub_address'=>'required|string',
            'hub_status'=>'required|boolean',

        ]);
       $charging_hub=new ChargingHub();

       $charging_hub->address=$request->address;
       $charging_hub->hub_name=$request->hub_name;
       $charging_hub->hub_address=$request->hub_address;
       $charging_hub->hub_status=$request->hub_status;
       $check_hub= $charging_hub->save();
        if($check_hub){
            return redirect('add_hub')->with('success', 'Charging Hub added successfully');
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
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');
        }


        $editcharginghub=new chargingHub();

        $editcharge=$editcharginghub->find($id);
        

        return view('admin.charginghub.edit_charging_hub', ['editcharge'=>$editcharge,'datasession' => $datasession]);
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
            'address' => '',
            'hub_name' => '',
            'hub_address' => '',
            'hub_status' => '',
          

        ]);
        
        $updatehub = new chargingHub();
        $updatehub->address = $request->input('address');
        $updatehub->hub_name = $request->input('hub_name');

        $updatehub->hub_address = $request->input('hub_address');
        $updatehub->hub_status = $request->input('hub_status');

        $updatehub->where('_id', $id)->update($validated);
        //  $promoCode = VehicleCategory::where('_id', $id)->update($storeData);
        
        return redirect('charging_hub_edit/'.$id)->with('success', 'Charging Hub Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleteFare = chargingHub::where('_id', $id)->first();
        $checkdelete=$deleteFare->delete();
       
        return back()->with('success', 'Hub Deleted successfully!');  
    }
}
