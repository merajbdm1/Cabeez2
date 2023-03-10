<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Session::has('loginId')){
        User::where('_id', '=', Session::get('loginId'))->first();
       
    }else{
        return redirect('login');

    }
    return redirect('login');
   // return view('admin.pages.index');
});



Route::get('rider',function(){
    return view('admin.pages.rider');
});

require_once 'meraj_route.php';
require_once 'ranjan_route.php';
require_once 'ankit_route.php';
require_once 'shahbaz_route.php';



