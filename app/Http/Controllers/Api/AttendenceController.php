<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AttendenceController extends Controller
{
    public function index(Request $request){

        // dd("fgjlx");
      
        if(Session::has('loginId')){
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
           
        }else{
            return redirect('login');

        }

        
        return view('admin.attendance.list_attendance',['datasession' => $datasession]);


    }

    // $data = [
    //     'date' => $request->date,
    //     'login'=> $request->login,
    //     'logout'=> $request->logout
    // ];



    // $Attendence = new Attendance();

    // $validated = Validator($request->all(),
    //     [
    //     'date' => 'required',
    //     'login'=>'required',
    //     'logout'=>'required',
    //     ]);

    //     if ($validated->fails())
    //     {
    //     // echo "run";exit;
    //        return $validated->errors();
    //         //
    //     }
    //     $date = $request->input('date');
    //     $login = $request->input('login');
    //     $logout = $request->input('logout');

    //     $data = [
    //     'date' => $date,
    //     'login' => $login,
    //     'logout' => $logout,
    //     ];

    //     $datasave=$Attendence->create($data);
    //     // $data2= $collection->insertOne($data);

    //     if($datasave){
    //         // echo "done";exit;
    //         return response()->json([
    //             'status' => '201', 
    //             'data'=>$datasave,
    //             'message' => 'Data inserted successfully',
          
    //         ],200);
    //       }
    //       else{
    //         return response()->json([
    //             'status' => '422', 
    //             'error' => true,
    //             'message' => 'data could not be inserted',
                
    //         ]);
    //       }
}
