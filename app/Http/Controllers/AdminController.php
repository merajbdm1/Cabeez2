<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AdminController extends Controller
{

    public function login_form(Request $request){
        // dd(Session::get('_id'));
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');

        }

        return view('admin.auth.login');

    }
    public function register_form(){
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');

        }


        return view('admin.auth.register_form');
    }

    public function register_post(Request $request){
       
         $validated=$request->validate([

            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|unique:admins',
            'mobile' => 'required|string|max:10|min:10',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|min:6|same:password'
        ]);

        $storeadmin=new Admin();
        $storeadmin->name=$request->input('name');
        $storeadmin->email=$request->input('email');
        $storeadmin->mobile=$request->input('mobile');
        $storeadmin->password=Hash::make($request->input('password'));
        $storeadmin->save();


        Auth::login($storeadmin);

        return redirect('admin_register')->with('success', 'Successfully registered!');
        // if($checkadmin){
        //     return redirect('admin_register')->with('success', 'Successfully registered!');
        // }
        // else{
        //     return redirect('admin_register')->with('danger', 'Something went wrong!');
        // }


    }
    public function admin_login_post(Request $request){


        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');

        }

    //     $request->validate([
    //         'email'=>'required',
    //         'password'=>'required'
    //     ]);

    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     if (Auth::attempt(['email'=>$email,'password'=>$password])) {
    //         $user = Admin::where('email',$email)->first();
    //         Auth::login($user);
    //         return view('admin.pages.index',['user'=>$user]);
    //     }else{
    //         return back()->withErrors(['admin_login']);
    //     }

    // }
    

        $validated=$request->validate([
            'email' => '',
            'password' => '',
          
        ]);

          
        $check=Admin::where('email', '=', $request->input('email'))->first();
        // dd($check);
        if($check){
                if(Hash::check($request->password, $check->password))
                {

                  
                 $request->session()->put('loginId',$check->id);
                //    dd($checkse);
                 
                   $datasession=array();
                   if(Session::has('loginId')){
                       $datasession = Admin::where('_id', '=', Session::get('loginId'))->first();
                    //    dd($datasession->id);
                   }
                   return view('admin.pages.index',['datasession' => $datasession]);
                }
                else{
                    return back()->with('fail','password does not matched');
                }
            
              }else{
                return back()->with('fail','Email is not registred');
              }
            }
        

    // public function dashboard(){

    //     $datasession=array();
    //     if(Session::has('loginId')){
    //         $datasession = Admin::where('_id', '=', Session::get('loginId'))->first();
    //         // dd($datasession);
    //     }
    //     // $datasession = "rgd";
    //     return view('admin.pages.index',['datasession'=>$datasession]);
    // }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('admin_login');


        // if(Session::has('loginId')){
        //     Session::pull('loginId');
        // }
        return redirect('admin_login');
        

    }
}
