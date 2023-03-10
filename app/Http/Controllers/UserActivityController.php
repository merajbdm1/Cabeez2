<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserActivityModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserActivityController extends Controller
{
    public function activity_user_view(Request $request)
    {


        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        // $fromDate=$request->fromDate;
        // $toDate=$request->toDate;
        //$done_by=$request->done_by;

        // $fromDate = date('d-m-y', strtotime($request->get('fromDate')));

        // $toDate = date('d-m-y', strtotime($request->get('toDate')));

        // $fromDate = UserActivityModel::createFromFormat('d/m/Y', '01/01/2021');
        // $toDate = UserActivityModel::createFromFormat('d/m/Y', '06/01/2021');

        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        // $users = DB::table('user_activity_logs')->get();
        // dd($users);
        // foreach ($users as $user) {
        //     print_r($user['created_at']);
        //     echo "<br>";
        // }
        // dd($fromDate);
        // $useractivityshow=new UserActivityModel();

        // dd($useractivityshow);
        $useraact = UserActivityModel::where('done_by', 'LIKE', $request->done_by);

        // $useraact = UserActivityModel::where('done_by','LIKE',$request->done_by);

        //  return $useraact;
        // dd($useraact); 

        $useractivity = $useraact->paginate(10);

        // dd($useractivity);

        // $useractivity= UserActivityModel::all();
        //    dd($useractivity);
        return view('Activity_user_log/activity_log', ['useractivity' => $useractivity, "datasession" => $datasession]);
    }

    // public function activity_user_check()
    // {
    //     if (Session::get('name') != 'superadmin') {
    //         return Redirect::route('login');
    //     } else {
    //         return  Redirect::route('activity_user_log');
    //     }
    // }

    public function delete($id)
    {

        $deleteFare = UserActivityModel::where('_id', $id)->first();
        $deleteFare->delete();
        return back()->with('success_message', 'Activity Deleted Successfully!');
    }

    public function fetch_data(Request $request)
    {
        echo "1";


        //     if($request->ajax())
        //     {
        //         if($request->fromDate != '' && $request->toDate != '' )
        //         {
        //         $data=DB::table('user_activity_logs')->whereBetween('date',array($request->fromDate, $request->toDate))->get();

        //         }
        //         else{
        //             $data=DB::table('user_activity_logs')->orderBy('date', 'desc')->get();
        //         }
        //         echo json_encode($data);
        // }

    }
}
