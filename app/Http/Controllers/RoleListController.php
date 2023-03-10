<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\AllDataTableRolesAndPermission;

class RoleListController extends Controller
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

        $userData=new User();
        $viewrole=$userData->where('status','0')->paginate(10);


        // $viewrole=$userData->paginate(10);
    //    dd($viewrole);
       
       
        // dd($selectroletoPermission);
        return view('admin.Roles.rolelist',['datasession'=>$datasession,'viewrole'=>$viewrole]);
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
        $selectrole=new AllDataTableRolesAndPermission();
        $selectroletoPermission=$selectrole->all();
        return view('admin.Roles.add_role',['selectroletoPermission'=>$selectroletoPermission,'datasession'=>$datasession]);
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userdata=new User();
        // dd($userdata);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
           

        ]);
        $userdata->name=$request->input('name');
        $userdata->email=$request->input('email');
        $userdata->password=Hash::make($request->input('password'));
        $userdata->role=$request->input('role');
        $userdata->status=$request->status;

        $check=$userdata->save();
        if($check){
        return redirect('add_role')->with('success','Roles added successfully');
        }
        else{
        return redirect('add_role')->with('fail','Roles failed to be added successfully');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');
        }
        
         //  $AllDataTableRolesAndPermission=new AllDataTableRolesAndPermission();
           
         $alldatarolelist=AllDataTableRolesAndPermission::all();

        //  $alldatarolelistuser=User::get();

        $editrolelist = User::where('_id',$id)->first();
        
        //   dd($editrolelist);

        return view('admin.Roles.user_role_edit',['editrolelist'=>$editrolelist,'datasession'=>$datasession,'alldatarolelist'=>$alldatarolelist]);


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

        $validate = $request->validate([
            'name' => '',
            'email' => '',
            'password' => '',
            'role' => '',
            
            ]);

        // $id = $request->input('_id');
        $editUserList = new User();
        // dd($editfare);

        $editUserList->name = $request->input('name');
        $editUserList->email = $request->input('email');
        $checkupdatepassword=$editUserList->password = Hash::make($request->input('password'));

       // dd($checkupdatepassword);
        $editUserList->role = $request->input('role');
        $editcheckupdate = $editUserList->where('_id', $id)->update($validate);      

          if($editcheckupdate)
          {
                return redirect('user_role_edit/'.$id)->with('success', 'User Role Updated Successfully!');
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
