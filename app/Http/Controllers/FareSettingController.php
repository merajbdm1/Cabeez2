<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\Fare;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;
use App\Models\UserActivityModel;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\admin\VehicleCategory;
use Illuminate\Pagination\Paginator;

class FareSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // use withPagination;

    public function index(Request $request)

    {
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');

        }
            // $fareviewlist = new Fare();
            $fareview = Fare::paginate(10);


            // $fareview = $fareviewlist->paginate(6);
            // dd($fareviewlist);
            // dd($fareviewlist);
            // exit;

            // dd($selecv);exit;
           return view('admin.pages.setting.fare.fare_view_setting',["fareview"=>$fareview, "datasession"=>$datasession]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('loginId')){
           $datasession= User::where('_id', '=', Session::get('loginId'))->first();

        }else{
            return redirect('login');

        }

        $selectcategory=VehicleCategory::all();

        return view('admin.pages.setting.fare.add_fare_setting',["selectcategory"=>$selectcategory,"datasession" => $datasession]);
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
        $fare_process=new Fare();

        $validate= $request->validate([
        'category_id' => '',
        'base_fare' => 'required',
        'per_min_fare' => 'required',
        'per_km_fare_slab1' => 'required',
        'per_km_fare_slab2' => 'required',
        'per_km_fare_slab3' => 'required',
        'per_km_fare_slab4' => 'required',
        'per_km_fare_slab5' => 'required',
        'per_km_fare_slab6'=> 'required',
        'minimum_fare' => 'required',
        'per_min_fare' => 'required',
        'status' => '',

        ]);
        // dd($fare_process);
        $checkvehiclecate = $fare_process->category_id=$request->input('category_id');
        $farebasefare = $fare_process->base_fare=$request->input('base_fare');
        $per_min_fare=$fare_process->per_min_fare=$request->input('per_min_fare');
        $per_km_fare_slab1_fare_process=$fare_process->per_km_fare_slab1=$request->input('per_km_fare_slab1');
        $fare_process_per_km_fare_slab2=$fare_process->per_km_fare_slab2=$request->input('per_km_fare_slab2');
        $fare_process_per_km_fare_slab3=$fare_process->per_km_fare_slab3=$request->input('per_km_fare_slab3');
        $fare_process_per_km_fare_slab4=$fare_process->per_km_fare_slab4=$request->input('per_km_fare_slab4');
        $fare_process_per_km_fare_slab5=$fare_process->per_km_fare_slab5=$request->input('per_km_fare_slab5');
        $fare_process_per_km_fare_slab6= $fare_process->per_km_fare_slab6=$request->input('per_km_fare_slab6');
        $minimum_fare=$fare_process->minimum_fare=$request->input('minimum_fare');
        $per_min_fare= $fare_process->per_min_fare=$request->input('per_min_fare');
        $fare_process_status=$fare_process->status=$request->input('status');
        $checkfare=$fare_process->save();

        


        if($checkfare){
            print_r($checkfare);exit;
        }
        // $ip_adress=request()->ip();

        // $server_ip_address=$_SERVER['REMOTE_ADDR'];

        // $host_addr= gethostname();
        // $ip_addr = gethostbyname($host_addr);

        // if(Session::has('loginId')){
        //     $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        // }

        // if($checkfare){
        //     if($checkvehiclecate){
        //     $vehiclecate=[
        //         'log_type'=>'('.$checkvehiclecate.') '.' Vehicle Category * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($vehiclecate);

        // }
        // if($farebasefare){
        //     $base_fare=[
        //         'log_type'=>'('.$farebasefare.') '.' Base Fare * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare);

        // }
        // if($fare_process_time_factor_for_travel){
        //     $base_fare_time_travel=[
        //         'log_type'=>'('.$fare_process_time_factor_for_travel .') '.' Time Factor For Travel * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_time_travel);

        // }
        // if($rate_per_km_25_kms_fare_process){
        //     $base_fare_time_travel_25=[
        //         'log_type'=>'('.$rate_per_km_25_kms_fare_process.') '.'Rate Per km(< 25) * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_time_travel_25);

        // }
        // if($fare_process_rate_per_km_25_to_50_kms){
        //     $base_fare_time_travel_50=[
        //         'log_type'=>'('.$fare_process_rate_per_km_25_to_50_kms.') '.'Rate Per km(25 to 50 kms) * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_time_travel_50);

        // }
        // if($fare_process_rate_per_km_50_to_100_kms){
        //     $base_fare_time_travel_100=[
        //         'log_type'=>'('.$fare_process_rate_per_km_50_to_100_kms.') '.'Rate Per km(50 to 100 kms) * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_time_travel_100);

        // }

        // if($fare_process_rate_per_km_100_to_250_kms){
        //     $base_fare_time_travel_250=[
        //         'log_type'=>'('.$fare_process_rate_per_km_100_to_250_kms.') '.'Rate Per km(100 to 250 kms) * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_time_travel_250);

        // }
        // if($fare_process_rate_per_km_250_to_500_kms){
        //     $base_fare_time_travel_500=[
        //         'log_type'=>'('.$fare_process_rate_per_km_250_to_500_kms.') '.'Rate Per km(250 to 500 kms) * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_time_travel_500);

        // }
        // if($fare_process_rate_per_km_500_kms){
        //     $base_fare_time_travel_500_PLUS=[
        //         'log_type'=>'('.$fare_process_rate_per_km_500_kms.') '.'Rate Per km(500 + kms) * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_time_travel_500_PLUS);

        // }


        // if($fare_process_minimum_fare){
        //     $base_fare_MINI=[
        //         'log_type'=>'('.$fare_process_minimum_fare.') '.'Minimum Fare * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_MINI);

        // }

        // if($fare_process_km_for_min_fare){
        //     $base_fare_min_km=[
        //         'log_type'=>'('.$fare_process_km_for_min_fare.') '.'Km For Min Fare * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_min_km);

        // }
        // if($fare_process_status){
        //     $base_fare_status=[
        //         'log_type'=>'('.$fare_process_status.') '.'Status * Added',
        //         'done_by'=>$datasession->name,
        //         'ip_adress'=>$ip_adress,
        //         'server_ip_address' => $ip_addr,
        //         'data_table'=>'Fare Data Table'
        //     ];

        //     $asd=new UserActivityModel;
        //     $asd->create($base_fare_status);

        // }





        // dd($check);

        return back()->with('success_message', 'Fare settings saved successfully.');

        //    return view('add_fare_setting');

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
            $datasession= User::where('_id', '=', Session::get('loginId'))->first();

         }else{
             return redirect('login');

         }

        $editfareview=new Fare();
        $editfareview = Fare::where('_id',$id)->first();
        // $edit_promocode = PromoCode::where('_id', $id)->first();
        // dd($editfareview);
        return view('admin.pages.setting.fare.edit_fare_view_setting',['editfareview'=>$editfareview,'datasession'=>$datasession]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {


        $validate = $request->validate([
            'vehicle_category' => '',
            'base_fare' => '',
            'time_factor_for_travel' => '',
            'rate_per_km_25_kms' => '',
            'rate_per_km_25_to_50_kms' => '',
            'rate_per_km_50_to_100_kms' => '',
            'rate_per_km_100_to_250_kms' => '',
            'rate_per_km_250_to_500_kms' => '',
            'rate_per_km_500_kms'=> '',
            'minimum_fare' => '',
            'km_for_min_fare' => '',
            'status' => ''
            ]);

        // $id = $request->input('_id');
        $editfare = new Fare();
        // dd($editfare);

        $checkvehiclecate=$editfare->vehicle_category=$request->input('vehicle_category');
        $farebasefare= $editfare->base_fare=$request->input('base_fare');
        $fare_process_time_factor_for_travel=$editfare->time_factor_for_travel=$request->input('time_factor_for_travel');
        $rate_per_km_25_kms_fare_process=$editfare->rate_per_km_25_kms=$request->input('rate_per_km_25_kms');
        $fare_process_rate_per_km_25_to_50_kms=$editfare->rate_per_km_25_to_50_kms=$request->input('rate_per_km_25_to_50_kms');
        $fare_process_rate_per_km_50_to_100_kms=$editfare->rate_per_km_50_to_100_kms=$request->input('rate_per_km_50_to_100_kms');
        $fare_process_rate_per_km_100_to_250_kms=$editfare->rate_per_km_100_to_250_kms=$request->input('rate_per_km_100_to_250_kms');
        $fare_process_rate_per_km_250_to_500_kms=$editfare->rate_per_km_250_to_500_kms=$request->input('rate_per_km_250_to_500_kms');
        $fare_process_rate_per_km_500_kms=$editfare->rate_per_km_500_kms=$request->input('rate_per_km_500_kms');
        $fare_process_minimum_fare=$editfare->minimum_fare=$request->input('minimum_fare');
        $fare_process_km_for_min_fare=$editfare->km_for_min_fare=$request->input('km_for_min_fare');
        $fare_process_status=$editfare->status=$request->input('status');

        $checkupdate= $editfare->where('_id', $id)->update($validate);
        $ip_adress=request()->ip();

        $server_ip_address=$_SERVER['REMOTE_ADDR'];

        $host_addr= gethostname();
        $ip_addr = gethostbyname($host_addr);

        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }

        if($checkupdate){
            if($checkvehiclecate){
            $vehiclecate=[
                'log_type'=>'('.$checkvehiclecate.')'.'Vehicle Category * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($vehiclecate);

        }
        if($farebasefare){
            $base_fare=[
                'log_type'=>'('.$farebasefare.')'.'Base Fare * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare);

        }
        if($fare_process_time_factor_for_travel){
            $base_fare_time_travel=[
                'log_type'=>'('.$fare_process_time_factor_for_travel.')'.'Time Factor For Travel * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_time_travel);

        }
        if($rate_per_km_25_kms_fare_process){
            $base_fare_time_travel_25=[
                'log_type'=>'('.$rate_per_km_25_kms_fare_process.')'.'Rate Per km(< 25) * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_time_travel_25);

        }
        if($fare_process_rate_per_km_25_to_50_kms){
            $base_fare_time_travel_50=[
                'log_type'=>'('.$fare_process_rate_per_km_25_to_50_kms.')'.'Rate Per km(25 to 50 kms) * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_time_travel_50);

        }
        if($fare_process_rate_per_km_50_to_100_kms){
            $base_fare_time_travel_100=[
                'log_type'=>'('.$fare_process_rate_per_km_50_to_100_kms.')'.'Rate Per km(50 to 100 kms) * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_time_travel_100);

        }

        if($fare_process_rate_per_km_100_to_250_kms){
            $base_fare_time_travel_250=[
                'log_type'=>'('.$fare_process_rate_per_km_100_to_250_kms.')'.'Rate Per km(100 to 250 kms) * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_time_travel_250);

        }
        if($fare_process_rate_per_km_250_to_500_kms){
            $base_fare_time_travel_500=[
                'log_type'=>'('.$fare_process_rate_per_km_250_to_500_kms.')'.'Rate Per km(250 to 500 kms) * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_time_travel_500);

        }
        if($fare_process_rate_per_km_500_kms){
            $base_fare_time_travel_500_PLUS=[
                'log_type'=>'('.$fare_process_rate_per_km_500_kms.')'.'Rate Per km(500 + kms) * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_time_travel_500_PLUS);

        }


        if($fare_process_minimum_fare){
            $base_fare_MINI=[
                'log_type'=>'('.$fare_process_minimum_fare.')'.'Minimum Fare * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_MINI);

        }

        if($fare_process_km_for_min_fare){
            $base_fare_min_km=[
                'log_type'=>'('.$fare_process_km_for_min_fare.')'.'Km For Min Fare * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_min_km);

        }
        if($fare_process_status){
            $base_fare_status=[
                'log_type'=>'('.$fare_process_status.')'.'Status * Updated',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asd=new UserActivityModel;
            $asd->create($base_fare_status);

        }

        //return redirect('edit_fare_view_setting/'.$id)->with('success_message', 'Fare Updated Successfully!');
        return redirect('edit_fare_view_setting/'.$id)->with('success', 'User List Updated Successfully!');

         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        // dd($id);

        $vehiclecategory=Fare::find($id);
        // dd();
        $ip_adress=request()->ip();

        //$server_ip_address=$_SERVER['REMOTE_ADDR'];

        $host_addr= gethostname();
        $ip_addr = gethostbyname($host_addr);

        $deleteFare = Fare::where('_id', $id)->first();
        $checkdelete=$deleteFare->delete();

        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();

        }

        if($checkdelete){
            $deletefarebase=[
                'log_type'=>'('.$vehiclecategory->vehicle_category.')'. ' Vehicle Category Deleted',
                'done_by'=>$datasession->name,
                'ip_adress'=>$ip_adress,
                'server_ip_address' => $ip_addr,
                'data_table'=>'Fare Data Table'
            ];

            $asdfr=new UserActivityModel;
            $asdfr->create($deletefarebase);

        }
        return back()->with('success_message', 'Fare Deleted successfully!');
    }
}
