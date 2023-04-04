<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Riders;
use App\Models\PromoCode;
use App\Models\GroupPromocode;
use App\Models\groupSaveRiderMobileByPromocodeId;
class GroupPromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $view_groupcode=new GroupPromocode();
        $vi_prom=$view_groupcode->all();

        return view('admin.pages.group_coupon.view_group_coupon', ["vi_prom"=>$vi_prom,"datasession" => $datasession]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        $riders= new Riders();
        $viewrider=$riders->all();


        $promoc=new PromoCode();

        $viewpromo=$promoc->all();

        return view('admin.pages.group_coupon.add_group', ["viewpromo"=>$viewpromo,"viewrider"=>$viewrider,"datasession" => $datasession]);
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
        $storeprromo=new GroupPromocode();
        $storeprromo->group_name=$request->input('group_name');
        $storeprromo->promocode_id=$request->input('promocode_id');
        // $storeprromo->rider_mobile=$request->input('rider_mobile');
        $storeprromo->save();
        return back()->with('DriverDetailSuccess', 'Group Created Successfully!');

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
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $storeprromo=new GroupPromocode();
        $editgroup=$storeprromo->where('_id',$id)->first(); //By id all edit details in edit form
        // $editgrpophonre=$editgroup->rider_mobile;
        // $ccc = $editgroup->rider_mobile;
        // $ccc=$editgrpophonre;

        // echo "<pre>";var_dump($ccc);exit;


        // echo "<pre>";print_r($editgroup);exit();
        // $editgroup = $viewph->where('rider_mobile');
        // dd($editgroup);
        $promoc=new PromoCode();

        $viewrprmo=$promoc->all();//all promocode id matches give to name in edit form

        // dd($viewrprmo->_id);exit;

        $provierider=new Riders();

        $viewrider=$provierider->all();
        $pphone_no=$provierider->pluck('phone_number')->toArray(); //all phone from riders table


            // echo "<pre>";var_dump(($ccc));exit;
        //     dd($editgrpophonre);exit;

         // $bbb=array($pphone_no);
            // echo "<pre>";var_dump(($bbb));exit;
            //     dd($editgrpophonre);exit;
        // $riderphonemateched=array($pphone_no);

        // dd($pphone_no);exit;

            // $result=array_intersect($ccc,$pphone_no);

        // $uniquedata=array_diff($pphone_no,$ccc);

        // foreach($uniquedata as $key=>$value){
        //         print_r($value);exit;
        // }


            // dd($viewrider);
        // echo "<pre>";print_r($viewrider);exit();
        // if(!$result){

        // }


        // dd($pphone_no);exit;
        // $findphone=$viewrider->pluck('phone_number');
        // dd($findphone);exit;
        return view('admin.pages.group_coupon.edit_group', ["editgroup"=>$editgroup,"viewrider"=>$viewrider,"viewrprmo"=>$viewrprmo,"pphone_no"=>$pphone_no,"datasession" => $datasession]);
    }

    /**
     * Update the specified resource in storage.s
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gpcode = GroupPromocode::where('_id', $id)->first();
        $gpcode->delete();
        return redirect('view_group_promocode')->with('RiderDetailSuccess', 'Group Deleted Successfully!');
    }

    // public function deleteitmesleecred($id){
    //     if (Session::has('loginId')) {
    //         $datasession = User::where('_id', '=', Session::get('loginId'))->first();
    //     } else {
    //         return redirect('login');
    //     }
    //      GroupPromocode::where('rider_mobile',$documen_id)->delete();

    //      return redirect('edit_group_code/'.$id);
    // }

    public function deleteitemrider_mobile($id,$mno_id){
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        $ridertable =new Riders();
        // echo "<pre>"; print_r($ridertable);exit;
        $findval=$ridertable->pluck('phone_number');

        // $findmob=$findval;
                // echo "<pre>";var_dump($findval);exit;

            //  echo "<pre>";echo $findval;exit;



        $mm = array($mno_id);
        // print_r($mm);exit;
        // var_dump($mm);exit;
        //    echo"<pre>";  print_r($mm);exit;
        $rider = GroupPromocode::find($id);
        $matched_array = array();
       $data = $rider->pluck('rider_mobile',$mno_id)->first();

       $matched_array = array_intersect($mm,$data);
        if($matched_array ==true){
            echo 'matched';
        }else{
            echo 'unmatched';
        }exit;
        // print_r($matched_array);exit;

        // print_r($data);exit;

    //    var_dump($data);exit;


    //    echo "<pre>";echo $ranjan;exit;



        // foreach($findval as $key=>$findas){
        //     if($findas == $mm){
        //         echo "matched";
        //     }else{
        //         echo "unmatched";
        //     }
        //     exit;
        // }
        // echo $ffuio;exit;
        //  echo "<pre>";echo $mm;exit;



    //    echo "<pre>"; echo $mm;exit;
    //    echo "<pre>";var_dump($data);



    //    echo $data;exit;
       // dd($data);

        // $checkmono=array($mno_id);

        // foreach($checkmono as $chej){
        //     $ff= $chej."<br/>";
        // }

        // echo $chej;exit;

        // echo "<pre>";var_dump($checkdata);exit;

        // $chekmno=array($mno_id);

        // dd($data);

        // if($ff == $checkdata){
        //     echo "matched";
        // }else{
        //     echo "unmatched";
        // }exit;


        // if (($key = array_search($chej,$checkdata)) === 1) {
        //     echo"<pre>";print_r($key);exit;
        //     array_splice($data, $key, 1);
        // }

        // if (!empty($data[0]) == true) {
        //     $key = array_search($mno_id, $data[0]);
        //     if ($key !== 0) {
        //         unset($data[0][$key]);
        //     }
        // }
        // $rider->rider_mobile = $data;

        // $rider->save();
        //  $mmm= GroupPromocode::where('rider_mobile',$rider)->delete();
        // print_r($mmm);
        // echo '<br />';
        // print_r($id);
        //  exit;
        // $rider = GroupPromocode::find($id);
        // dd($rider);
        //    echo"<pre>"; print_r($rider);exit;
        return back();
        // return response()->json(['message' => 'Data deleted successfully']);
        //  return redirect('edit_group_code/'.$id);


    }



    public function addgroupmake(Request $request){
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        // return $request;

        return redirect('add_group');

    }

    // public function addgroupnumber(Request $request,$id,$num) {
    //     // dd($num);
    //     $storeprromo =new GroupPromocode();
    //     // $checkwhere = $storeprromo->where('_id',$id)->first();
    //     $checkwhere = GroupPromocode::where('_id','=',$id)->get();
    //     print_r($checkwhere);
    //     exit();
    //     $storeprromo->selected_number=$num;
    //     $storeprromo->save();
    //     return back()->with('DriverDetailSuccess', 'Number Added Successfully');

    // }

    public function editMakeGroup(Request $request,$id){
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        // echo $id;exit;

        $validated = $request->validate([
            'group_name' => '',
            'promocode_id'=>'',

        ]);
        $storeprromo=new GroupPromocode();
        $storeprromo->group_name=$request->input('group_name');
        $storeprromo->promocode_id=$request->input('promocode_id');
        // $storeprromo->rider_mobile=$request->input('rider_mobile');
        $storeprromo->where('_id',$id)->update($validated);
        return redirect('edit_group_code/'.$id)->with('RiderDetailSuccess', 'Group Updated Successfully!');
        //  $promoCode = VehicleCategory::where('_id', $id)->update($storeData);



    }


    public function editaddeditGroup($id){

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }

        $riderkl=new Riders();
        $viewrider=$riderkl->all();

        $gppromocode=new GroupPromocode();
        $gppromid=$gppromocode->where('_id',$id)->first();




        $gpridermobile=$gppromid->_id;
            //    echo "<pre>"; var_dump($gpridermobile);exit;


        $gppmcodebyid=new groupSaveRiderMobileByPromocodeId();



        $viewrider_mobiel=$gppmcodebyid->where('gp_pm_id',$gpridermobile)->pluck('rider_mobile');




        $gpmcodeidridermobile=$viewrider_mobiel;


        // echo "<pre>"; print_r($gpmcodeidridermobile);exit;
        // return $gpmcodeidridermobile;

        // $gpmobilekiolp=$gpmcodeidridermobile->rider_mobile;



    //     if($gpridermobile == $gpmobilekiolp){
    //         echo "rider";
    //     }else{
    //         echo "ridsadsadsade";
    //     }exit;


    //    echo "<pre>"; print_r($viewrider_mobiel);exit();

        return view('admin.pages.group_coupon.edit_AddEditGroup', ["gpmcodeidridermobile"=>$gpmcodeidridermobile,"gpridermobile"=>$gpridermobile,"gppromid"=>$gppromid,"viewrider"=>$viewrider,"datasession" => $datasession]);

    }


    public function groupPhonenNumber(Request $request,$id){

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $storeprromo=new groupSaveRiderMobileByPromocodeId();
        $idphone=$storeprromo->where('gp_pm_id',$id)->first();

        // return $idphone;
        // echo "<pre>";
        // print_r($idphone);exit;

        // $validated = $request->validate([
        //     'rider_mobile' => '',

        // ]);

        $rider_mobile=$request->input('rider_mobile');
        $storeprromo->where('gp_pm_id',$id)->update([
            'rider_mobile'=> $rider_mobile,
        ],['upsert' => true]);

        return redirect('edit_addEdit_group/'.$id)->with('RiderDetailSuccess', 'Group Phone Updated Successfully!');


    }
    public function deleterider_mobile($mno_id,$gpridermobile){


          $storeprromo=new groupSaveRiderMobileByPromocodeId();
        $idphone=$storeprromo->where('gp_pm_id',$gpridermobile)->first();

       dd($idphone);

    }



}
