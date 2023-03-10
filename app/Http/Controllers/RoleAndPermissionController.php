<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\AllDataTableRolesAndPermission;
class RoleAndPermissionController extends Controller
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
        $viewPermission=new AllDataTableRolesAndPermission();
        
        $viewAllPermission=$viewPermission->paginate(10);
        // dd($viewAllPermission);
        return view('admin.RolesAndPermission.roles_and_permission_list',['viewAllPermission'=>$viewAllPermission,'datasession'=>$datasession]);

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

        return view('admin.RolesAndPermission.add_role_permission',['datasession'=>$datasession]);     

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $allpermission=new AllDataTableRolesAndPermission();
        

       $validate= $request->validate([
        'role_name' => 'required|unique:_all__data__roles__and__permissions,role_name',
        'driver_permissions'=>'',
        'riders_permissions'=>'',
        'rides_persmissions'=>'',
        'promocode_permissions'=>'',
        'reports_permissions'=>'',
        'manual_ride_booking_permissions'=>'',
        'rider_reviews_permissions'=>'',
        'driver_reviews_permissions'=>'',
        'vehicle_categories_permissions'=>'',
        'vehicle_make_permissions'=>'',
        'vehicle_model_permissions'=>'',
        ]);

       $role_name='role_name';
       $allpermission->role_name=$request->role_name;

       $driver_permission='driver_permission';
       $allpermission->driver_permissions=$request->driver_permissions;

       $rider_permission='riders_permission';
       $allpermission->riders_permissions=$request->riders_permissions;

       $rides_persmissions='rides_persmissions';
       $allpermission->rides_persmissions=$request->rides_persmissions;

       $promocode_permissions='promocode_permissions';
       $allpermission->promocode_permissions=$request->promocode_permissions;

       $reports_permissions='reports_permissions';
       $allpermission->reports_permissions=$request->reports_permissions;

       $manual_ride_booking_permissions='manual_ride_booking_permissions';
       $allpermission->manual_ride_booking_permissions=$request->manual_ride_booking_permissions;

       $rider_reviews_permissions='rider_reviews_permissions';
       $allpermission->rider_reviews_permissions=$request->rider_reviews_permissions;

       $driver_reviews_permissions='driver_reviews_permissions';
       $allpermission->driver_reviews_permissions=$request->driver_reviews_permissions;

       $vehicle_categories_permissions='vehicle_categories_permissions';
       $allpermission->vehicle_categories_permissions=$request->vehicle_categories_permissions;

       $vehicle_make_permissions='vehicle_make_permissions';
       $allpermission->vehicle_make_permissions=$request->vehicle_make_permissions;

       $vehicle_model_permissions='vehicle_model_permissions';
       $allpermission->vehicle_model_permissions=$request->vehicle_model_permissions;
       $checkpermission=$allpermission->save();

        if($checkpermission){
            return redirect('add_role_permission')->with('success','Permission added Successfully.');
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
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');
        }
        $viewPermissionpp=new AllDataTableRolesAndPermission();
        $viewAllRole=$viewPermissionpp->find($id);


        return view('admin.RolesAndPermission.view_permission_list',['viewAllRole'=>$viewAllRole,'datasession'=>$datasession]);
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
        $viewPermission=new AllDataTableRolesAndPermission();
        $editviewRole=$viewPermission->find($id);
        //return view('edit', ['users' => $users,'hobbies' => explode(',', $user->hobbies)]);
    //    dd($editviewRole);
        return view('admin.RolesAndPermission.Edit_roles_and_permission_list',['editviewRole'=>$editviewRole,'datasession'=>$datasession]);
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
        $updateallpermission=new AllDataTableRolesAndPermission();
        

        $validate= $request->validate([
            'role_name' => '',
            'driver_permissions'=>'',
            'riders_permissions'=>'',
            'rides_persmissions'=>'',
            'promocode_permissions'=>'',
            'reports_permissions'=>'',
            'manual_ride_booking_permissions'=>'',
            'rider_reviews_permissions'=>'',
            'driver_reviews_permissions'=>'',
            'vehicle_categories_permissions'=>'',
            'vehicle_make_permissions'=>'',
            'vehicle_model_permissions'=>'',
            ]);
    
           $role_name='role_name';
           $updateallpermission->role_name=$request->role_name;
    
           $driver_permission='driver_permission';
           $updateallpermission->driver_permissions=$request->driver_permissions;
    
           $rider_permission='riders_permission';
           $updateallpermission->riders_permissions=$request->riders_permissions;
    
           $rides_persmissions='rides_persmissions';
           $updateallpermission->rides_persmissions=$request->rides_persmissions;
    
           $promocode_permissions='promocode_permissions';
           $updateallpermission->promocode_permissions=$request->promocode_permissions;
    
           $reports_permissions='reports_permissions';
           $updateallpermission->reports_permissions=$request->reports_permissions;
    
           $manual_ride_booking_permissions='manual_ride_booking_permissions';
           $updateallpermission->manual_ride_booking_permissions=$request->manual_ride_booking_permissions;
    
           $rider_reviews_permissions='rider_reviews_permissions';
           $updateallpermission->rider_reviews_permissions=$request->rider_reviews_permissions;
    
           $driver_reviews_permissions='driver_reviews_permissions';
           $updateallpermission->driver_reviews_permissions=$request->driver_reviews_permissions;
    
           $vehicle_categories_permissions='vehicle_categories_permissions';
           $updateallpermission->vehicle_categories_permissions=$request->vehicle_categories_permissions;
    
           $vehicle_make_permissions='vehicle_make_permissions';
           $updateallpermission->vehicle_make_permissions=$request->vehicle_make_permissions;
    
           $vehicle_model_permissions='vehicle_model_permissions';
           $updateallpermission->vehicle_model_permissions=$request->vehicle_model_permissions;
       $checkupdateroleandpermission = $updateallpermission->where('_id', $id)->update($validate);

        if($checkupdateroleandpermission){
            return redirect('driver_permission_edit/'.$id)->with('success','Role and permission updated Successfully.');
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
        //
    }
}
