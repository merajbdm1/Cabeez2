<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }


    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => '',
            'password' => '',
        ]);
        $check=User::where('email', '=', $request->input('email'))->first();

        if($check){
            if(Hash::check($request->password, $check->password))
            {

         $ido=$request->session()->put('loginId',$check->id);
         $request->session()->put('name',$check->name);
         $request->session()->put('email',$check->email);
         $request->session()->put('role',$check->role);
         $request->session()->put('status',$check->status);

                   $datasession=array();
                   if(Session::has('loginId')){
                       $datasession = User::where('_id', '=', Session::get('loginId'))->first();
                   }
                   return view('admin.pages.index',["datasession" => $datasession]);
                }
                else{
                    return back()->with('fail','password does not matched');
                }

              }else{
                return back()->with('fail','Email is not registred');
              }

        return redirect("login")->with('fail', 'Oops! You are trying invalid credentials.');

    }



    public function registration()
    {

        return view('admin.auth.registration');


    }


    public function customRegistration(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);

        $data = $request->all();


        $check = $this->create($data);

        return redirect()->back()->with('success','You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'status' => '0'
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.pages.index');
        }

        return redirect("login")->with('success','You are not allowed to access');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function dashboardcard(){
                 $datasession=array();
                   if(Session::has('loginId')){
                       $datasession = User::where('_id', '=', Session::get('loginId'))->first();
                   }
                   return view('admin.pages.index',["datasession" => $datasession]);

    }
}
