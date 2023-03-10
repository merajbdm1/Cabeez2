<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\SideBar;

class SideBarSetting extends Controller
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
        $viewSideBar=new SideBar();
        


        $viewside=$viewSideBar->paginate(10);
        // $checksidebar=$viewSideBar->all();
       
        //     return view('admin.layout.common.sidebar', ['checksidebar'=>$checksidebar]);

       
        // dd($viewside);
        return view('admin.sideBarSetting.sidebarlist', ['viewside'=>$viewside,'datasession' => $datasession]);
   
     
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

        return view('admin.sideBarSetting.addsidebar', ['datasession' => $datasession]);
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

            'sidebar_name'=>'required',

        ]);
        $sidebar=new SideBar();
        $sidebar->sidebar_name=$request->sidebar_name;
        $checksidebar= $sidebar->save();
        if($checksidebar){
            return redirect('add_sidebar')->with('success','Sidebar added successfully');
              
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


        $editsidebar=new SideBar();

        $editsidebar=$editsidebar->find($id);
        

        return view('admin.sideBarSetting.editaddsidebar', ['editsidebar'=>$editsidebar,'datasession' => $datasession]);
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

        $validate=$request->validate([

            'sidebar_name'=>'',

        ]);

        $sidebar=new SideBar();
        $sidebar->sidebar_name=$request->sidebar_name;

        $checksidebar= $sidebar->where('_id', $id)->update($validate);
        if($checksidebar){
            return redirect('sidebar_edit/'.$id)->with('success','Sidebar Updated successfully');
              
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
        
        $deletesidebar=new SideBar();

        $sidebaradestroy=$deletesidebar->where('_id', $id)->delete();

        if($sidebaradestroy){
            return redirect('sidebar_setting')->with('success','Sidebar Deleted Successfully');
        }
    }
}
