<?php

namespace App\Http\Controllers;

use App\Models\admin\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\UserActivityModel;
use App\Models\admin\VehicleCategory;
use Illuminate\Support\Carbon;
use App\Models\admin\VehicleMake;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $viewdriver = new Driver();
        $keyword = $request->input('fname');
        $lastname=$request->input('lname');
        $email=$request->input('email');
        $mobile_number=$request->input('phone_number');
        $onoff = $request->input('is_available');
        // $intonoff = (int)$onoff;
        $intonoff = (int)$onoff;
        $categor_id = $request->input('category_id');
        $intonoffCAT = (int)$categor_id;


            $fromDateTo=request('fromDate');
            $toDateTo=request('ToDate');

        //  dd($fromDateTo);
            $fromDate =(isset($fromDateTo)) ? Carbon::createFromFormat('Y-m-d', $fromDateTo)->startOfDay() : null;

            $toDate = (isset($toDateTo)) ? Carbon::createFromFormat('Y-m-d', $toDateTo)->endOfDay() : null;

            $strfrmDateSingle = strval($fromDate);


            $strtoDateSingle = strval($toDate);
            //dd($strtoDateSingle);
        // $intonoff = (int)$onoff;

        // dd($fromDateTo);

        if($keyword || $lastname || $email || $mobile_number ){
            $driver = $viewdriver->orwhere('first_name', 'LIKE', "%".$keyword ."%")
            ->orWhere('last_name', 'LIKE', "%".$lastname."%")
            ->orwhere('email', 'LIKE', "%".$email."%")
            ->orwhere('phone_number', 'LIKE', "%".$mobile_number."%")
            // ->orwhere('is_available',$intonoff)
            // ->orwhere('category_id', $intonoffCAT)
            // ->wherebetween('created_at',[$strfrmDateSingle,$strtoDateSingle])
            ->paginate(25);

        }
        elseif ($intonoffCAT) {
            $driver = $viewdriver->orwhere('category_id', $intonoffCAT)
            ->paginate(25);
        }
        elseif ($intonoff) {
            $driver = $viewdriver->orwhere('is_available', $intonoff)
            ->paginate(25);
        }
        elseif ($strfrmDateSingle && $strtoDateSingle) {
            $driver = $viewdriver->orwherebetween('created_at',[$strfrmDateSingle,$strtoDateSingle])->paginate(25);
        }
        else{
        $driver = $viewdriver->where('document_status', 'verified')
        ->paginate(25);

        //   echo "<pre>";  print_r($driver);exit;

        }


        $driver_veh_cat=new VehicleCategory();
        $vehicle_driv=$driver_veh_cat->all();

        // dd($vehicle_driv);
        return view('admin.pages.driver.view-driver', ['driver' => $driver, "datasession" => $datasession,'vehicle_driv'=>$vehicle_driv]);
    }

    //public function fetch_data(Request $request){

        // if (Session::has('loginId')) {
        //     $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        // } else {
        //     return redirect('login');
        // }


        // if($request->ajax())
        // {
        //     $viewdriver = new Driver();
        //     $driver = $viewdriver->where('status', 'active')->paginate(25);
        //     return view('admin.pages.driver.fetch_driver_data', compact('driver'))->render();
        // }


        // dd($driver);

        //}




    public function add()
    {
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $driver = Driver::all();
        $driver_veh_cat=new VehicleCategory();
        $vehicle_driv=$driver_veh_cat->all();
        return view('admin.pages.driver.add-driver', ['vehicle_driv'=>$vehicle_driv,'driver' => $driver, 'datasession' => $datasession]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'driver_mobile_no' => 'required',
            'email' => 'required|email|min:3|max:255',
            'vehicle_year' => 'required',
            'driver_vehicle_registration_number' => 'required|string|min:3|max:255',
            'driver_vehicle_make' => 'required|string',
            'driver_vehicle_model' => 'required|string',
            'driver_vehicle_category' => 'required|string',
            'driver_puc_expiry_date' => 'required|date',
            'date_of_birth' => 'required|date',
            'blood_group' => 'required|string',
            'driver_emergency_number' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'address' => 'required|string',
            'driver_profile_picture' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_upload_commercial_insurance' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_license_front' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_license_back' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_aadhaar_front' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_aadhaar_back' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_rental_agreement_front' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_rental_agreement_back' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'pan_card' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_vehicle_registration_image' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'driver_status' => '',
            'driver_ride_type' => '',
            'mondaystartend' => '',
            'tuesdaystartend' => '',
            'wednesdaystartend' => '',
            'thursdaystartend' => '',
            'fridaystartend' => '',
            'saturdaystartend' => '',


        ]);

        $driver = new Driver;
        // dd($driver);
        $driver->driver_first_name = $request->input('driver_first_name');
        $driver->driver_last_name = $request->input('driver_last_name');
        $driver->driver_mobile_no = $request->input('driver_mobile_no');
        $driver->driver_email = $request->input('driver_email');
        $driver->vehicle_year = $request->input('vehicle_year');
        $driver->driver_vehicle_registration_number = $request->input('driver_vehicle_registration_number');
        $driver->driver_vehicle_make = $request->input('driver_vehicle_make');
        $driver->driver_vehicle_model = $request->input('driver_vehicle_model');
        $driver->driver_vehicle_category = $request->input('driver_vehicle_category');
        $driver->driver_puc_expiry_date = $request->input('driver_puc_expiry_date');
        $driver->driver_dob = $request->input('driver_dob');
        $driver->driver_blood_group = $request->input('driver_blood_group');
        $driver->driver_emergency_number = $request->input('driver_emergency_number');
        $driver->driver_state = $request->input('driver_state');
        $driver->driver_city = $request->input('driver_city');
        $driver->driver_postal_code = $request->input('driver_postal_code');
        $driver->driver_address = $request->input('driver_address');
        $checkdd = $driver->driver_status = $request->input('driver_status');


        $driver->driver_ride_type = $request->input('driver_ride_type');
        $driver->mondaystartend = $request->input('mondaystartend');
        $driver->tuesdaystartend = $request->input('tuesdaystartend');
        $driver->wednesdaystartend = $request->input('wednesdaystartend');
        $driver->thursdaystartend = $request->input('thursdaystartend');
        $driver->fridaystartend = $request->input('fridaystartend');
        $driver->saturdaystartend = $request->input('saturdaystartend');


        if ($driver_profile_picture = $request->file('driver_profile_picture')) {
            $destinationPath = 'admin/uploads/Driver';
            $profileImage = rand(0000, 9999) . $driver_profile_picture->getClientOriginalName();
            $driver_profile_picture->move($destinationPath, $profileImage);
            $input['driver_profile_picture'] = "$profileImage";
            $driver->driver_profile_picture = $profileImage;
        }




        if ($driver_upload_commercial_insurance = $request->file('driver_upload_commercial_insurance')) {
            $destinationPath = 'admin/uploads/Driver';
            $document = rand(0000, 9999) . $driver_upload_commercial_insurance->getClientOriginalName();
            $driver_upload_commercial_insurance->move($destinationPath, $document);
            $input['driver_upload_commercial_insurance'] = "$document";
            $driver->driver_upload_commercial_insurance = $document;
        }

        if ($driver_license_front = $request->file('driver_license_front')) {
            $destinationPath = 'admin/uploads/Driver';
            $document2 = rand(0000, 9999) . $driver_license_front->getClientOriginalName();
            $driver_license_front->move($destinationPath, $document2);
            $input['driver_license_front'] = "$document2";
            $driver->driver_license_front = $document2;
        }

        if ($driver_license_back = $request->file('driver_license_back')) {
            $destinationPath = 'admin/uploads/Driver';
            $document3 = rand(0000, 9999) . $driver_license_back->getClientOriginalName();
            $driver_license_back->move($destinationPath, $document3);
            $input['driver_license_back'] = "$document3";
            $driver->driver_license_back = $document3;
        }

        if ($driver_aadhaar_front = $request->file('driver_aadhaar_front')) {
            $destinationPath = 'admin/uploads/Driver';
            $document4 = rand(0000, 9999) . $driver_aadhaar_front->getClientOriginalName();
            $driver_aadhaar_front->move($destinationPath, $document4);
            $input['driver_aadhaar_front'] = "$document4";
            $driver->driver_aadhaar_front = $document4;
        }
        if ($driver_aadhaar_back = $request->file('driver_aadhaar_back')) {
            $destinationPath = 'admin/uploads/Driver';
            $document5 = rand(0000, 9999) . $driver_aadhaar_back->getClientOriginalName();
            $driver_aadhaar_back->move($destinationPath, $document5);
            $input['driver_aadhaar_back'] = "$document5";
            $driver->driver_aadhaar_back = $document5;
        }

        if ($driver_rental_agreement_front = $request->file('driver_rental_agreement_front')) {
            $destinationPath = 'admin/uploads/Driver';
            $document6 = rand(0000, 9999) . $driver_rental_agreement_front->getClientOriginalName();
            $driver_rental_agreement_front->move($destinationPath, $document6);
            $input['driver_rental_agreement_front'] = "$document6";
            $driver->driver_rental_agreement_front = $document6;
        }

        if ($driver_rental_agreement_back = $request->file('driver_rental_agreement_back')) {
            $destinationPath = 'admin/uploads/Driver';
            $document7 = rand(0000, 9999) . $driver_rental_agreement_back->getClientOriginalName();
            $driver_rental_agreement_back->move($destinationPath, $document7);
            $input['driver_rental_agreement_back'] = "$document7";
            $driver->driver_rental_agreement_back = $document7;
        }

        if ($driver_pan_card = $request->file('driver_pan_card')) {
            $destinationPath = 'admin/uploads/Driver';
            $document8 = rand(0000, 9999) . $driver_pan_card->getClientOriginalName();
            $driver_pan_card->move($destinationPath, $document8);
            $input['driver_pan_card'] = "$document8";
            $driver->driver_pan_card = $document8;
        }

        if ($driver_vehicle_registration_image = $request->file('driver_vehicle_registration_image')) {
            $destinationPath = 'admin/uploads/Driver';
            $document9 = rand(0000, 9999) . $driver_vehicle_registration_image->getClientOriginalName();
            $driver_vehicle_registration_image->move($destinationPath, $document9);
            $input['driver_vehicle_registration_image'] = "$document9";
            $driver->driver_vehicle_registration_image = $document9;
        }
        // dd($image);


        $driver->save();
        return back()->with('DriverDetailSuccess', 'Driver Details Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver, $id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }


        $preview_driver = Driver::where('_id', $id)->first();

        // dd($imageName);
        return view('admin.pages.driver.preview_list_driver', ['datasession' => $datasession, 'preview_driver' => $preview_driver]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $driver = Driver::all();
        // dd($edit_driver)
        $edit_driver = Driver::where('_id', $id)->first();
        $driver_veh_cat=new VehicleCategory();
        $vehicle_driv=$driver_veh_cat->all();

        $driver_veh_cat=new VehicleCategory();
        $vehicle_driv=$driver_veh_cat->all();
        $driver_veh_make=new VehicleMake();
        $vehicle_drive_make=$driver_veh_make->all();

        // dd($edit_driver);
        return view('admin.pages.driver.edit-driver', ['vehicle_drive_make'=>$vehicle_drive_make,'vehicle_driv'=>$vehicle_driv,'datasession' => $datasession, 'driver' => $driver, 'edit_driver' => $edit_driver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $storeData = $request->validate([

            'driver_first_name' => 'required|string|min:3|max:255',
            'driver_last_name' => 'required|string|min:3|max:255',
            'driver_mobile_no' => 'required',
            'driver_email' => 'required|email|min:3|max:255',
            'vehicle_year' => 'required',
            'driver_vehicle_registration_number' => 'required|string|min:3|max:255',
            'driver_vehicle_make' => 'required|string',
            'driver_vehicle_model' => 'required|string',
            'driver_vehicle_category' => 'required|string',
            'driver_puc_expiry_date' => 'required|date',
            'driver_dob' => 'required|date',
            'driver_blood_group' => 'required|string',
            'driver_emergency_number' => 'required',
            'driver_state' => 'required|string',
            'driver_city' => 'required|string',
            'driver_postal_code' => 'required|string',
            'driver_address' => 'required|string',
            'driver_status' => 'required|boolean',
            'driver_status' => '',
            'driver_ride_type' => '',
            'mondaystartend' => '',
            'tuesdaystartend' => '',
            'wednesdaystartend' => '',
            'thursdaystartend' => '',
            'fridaystartend' => '',
            'saturdaystartend' => '',

        ]);
        // $update_driver = Driver::where('_id', $id)->first();
        //     $imageName = $update_driver->driver_upload_commercial_insurance;
        //     dd($imageName);
        //     $image_name = $imageName;
        //   $image_path = 'admin/uploads/DriverImage/'.$image_name;
        //   if(File::exists($image_path)) {
        //     File::delete($image_path);
        //   }


        if ($request->hasfile('driver_profile_picture')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_profile_picture->extension();
            $request->driver_profile_picture->move('admin/uploads/Driver', $imageName);
            $request->driver_profile_picture = $imageName;
            $storeData['driver_profile_picture'] = $imageName;
        }

        if ($request->hasfile('driver_upload_commercial_insurance')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_upload_commercial_insurance->extension();

            $request->driver_upload_commercial_insurance->move('admin/uploads/Driver', $imageName);
            $request->driver_upload_commercial_insurance = $imageName;
            $storeData['driver_upload_commercial_insurance'] = $imageName;
        }
        if ($request->hasfile('driver_license_front')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_license_front->extension();

            $request->driver_license_front->move('admin/uploads/Driver', $imageName);
            $request->driver_license_front = $imageName;
            $storeData['driver_license_front'] = $imageName;
        }
        if ($request->hasfile('driver_license_back')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_license_back->extension();

            $request->driver_license_back->move('admin/uploads/Driver', $imageName);
            $request->driver_license_back = $imageName;
            $storeData['driver_license_back'] = $imageName;
        }
        if ($request->hasfile('driver_aadhaar_front')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_aadhaar_front->extension();

            $request->driver_aadhaar_front->move('admin/uploads/Driver', $imageName);
            $request->driver_aadhaar_front = $imageName;
            $storeData['driver_aadhaar_front'] = $imageName;
        }
        if ($request->hasfile('driver_aadhaar_back')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_aadhaar_back->extension();

            $request->driver_aadhaar_back->move('admin/uploads/Driver', $imageName);
            $request->driver_aadhaar_back = $imageName;
            $storeData['driver_aadhaar_back'] = $imageName;
        }
        if ($request->hasfile('driver_rental_agreement_front')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_rental_agreement_front->extension();

            $request->driver_rental_agreement_front->move('admin/uploads/Driver', $imageName);
            $request->driver_rental_agreement_front = $imageName;
            $storeData['driver_rental_agreement_front'] = $imageName;
        }
        if ($request->hasfile('driver_rental_agreement_back')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_rental_agreement_back->extension();

            $request->driver_rental_agreement_back->move('admin/uploads/Driver', $imageName);
            $request->driver_rental_agreement_back = $imageName;
            $storeData['driver_rental_agreement_back'] = $imageName;
        }

        if ($request->hasfile('driver_pan_card')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_pan_card->extension();

            $request->driver_pan_card->move('admin/uploads/Driver', $imageName);
            $request->driver_pan_card = $imageName;
            $storeData['driver_pan_card'] = $imageName;
        }


        if ($request->hasfile('driver_vehicle_registration_image')) {
            $imageName = rand(0000, 9999) . '.' . $request->driver_vehicle_registration_image->extension();

            $request->driver_vehicle_registration_image->move('admin/uploads/Driver', $imageName);
            $request->driver_vehicle_registration_image = $imageName;
            $storeData['driver_vehicle_registration_image'] = $imageName;
        }

        $driver = new Driver;
        $driver = Driver::where('_id', $id)->update($storeData);
        return redirect('admin/driver')->with('DriverDetailSuccess', 'Driver Details Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::all();
        $driver = Driver::where('_id', $id)->delete();
        return back()->with('DriverDetailSuccess', 'Driver Details Deleted successfully!');
    }

    public function ride_history($id)
    {

        if (Session::has('loginId')) {
            $datasession = User::where('_id', '=', Session::get('loginId'))->first();
        } else {
            return redirect('login');
        }
        $driver = Driver::all();
        // dd($edit_driver)
        $edit_driver = Driver::where('_id', $id)->first();

        // dd($imageName);
        return view('admin.pages.rides_history', ['datasession' => $datasession]);
    }

    public function update_status(Request $request) {

    //    echo $request->is_shift_started;
    //    echo $request->_id;
        if($request->status == 'active') {
            $shift_status = 'inactive';
        }
        else {
            $shift_status = 'active';
        }
         DB::table('drivers')
            ->where('_id',$request->_id)
            ->update(['status' => $shift_status]);
            $shift_status_updated = Driver::where('_id', $request->_id)->get();
            return response()->json( collect(['shift_status_updated' => $shift_status_updated,])->toJson());
    }

    // public function all_driver()
    // {
    //     $output = '';
    //     $viewdriver = new Driver();
    //     $driver = $viewdriver->where('status', 'active')->paginate(10);
    //     // dd($driver);

    //     if (count($driver) > 0) {

    //         $i = 1;
    //         foreach ($driver as $datas) {


    //             $output .= '

    //           <tr>
    //           <td>' . $i++ . '</td>
    //           <td>' . $datas->first_name . '</td>
    //           <td>' . $datas->last_name . '</td>
    //           <td><a href="booknow_view/' . $datas->_id . '" class="btn btn-primary" ><i class="fas fa-eye"></i></a></td>
    //           </tr>
    //             ';
    //         }

    //         return response()->json($output);
    //     }
    //     if (count($driver) == false ) {
    //         $i = 1;
    //         foreach ($driver as $datas) {


    //             $output .= '

    //           <tr>
    //           <td>' . $i++ . '</td>
    //           <td>' . $datas->first_name . '</td>
    //           <td>' . $datas->last_name . '</td>
    //           <td><a href="booknow_view/' . $datas->_id . '" class="btn btn-primary" ><i class="fas fa-eye"></i></a></td>
    //           </tr>
    //             ';
    //         }

    //         return response()->json($output);
    //     }



    // }




    // public function search(Request $request)
    // {



    //     if ($request->ajax())
    //     {


        //    echo  $request->lname;

           // $output = '';
            // $sort_by = $request->get('sortby');
            // $sort_type = $request->get('sorttype');
            // $query = $request->get('query');
            // $query = str_replace(" ", "%", $query);

            // $data = Driver::where('first_name', 'like', '%' . $request->fname . '%')
            // ->orwhere('last_name', 'like', '%'. $request->lname. '%')
            // ->orwhere('email', 'like', '%'. $request->email.'%')
            // ->orwhere('phone_number', 'like', '%'. $request->phone_number. '%')
            // ->paginate(25);
            // if (count($data) > 0) {
            //     $i = 1;
            //     foreach ($data as $datas) {


            //         $output .= '
            //         <tr>
            //           <td>' . $i++ . '</td>
            //           <td>' . $datas->first_name .'</td>
            //           <td>' . $datas->last_name .'</td>
            //           <td>' . $datas->email .'</td>
            //           <td>' . $datas->phone_number .'</td>
            //           <td>Action</td>
            //         </tr>
            //             ';
            //     }

            //     return response()->json($output);
            // }

            // else if($_GET['fname']==''){
            //     $viewdriver = new Driver();
            //     $driver = $viewdriver->where('status', 'active')->paginate(25);
            //     if (count($driver) > 0) {
            //         $i = 1;
            //         foreach ($driver as $drivers) {


            //             $output .= '
            //             <tr>
            //               <td>' . $i++ . '</td>
            //               <td>' . $drivers->first_name .'</td>
            //               <td>' . $drivers->last_name .'</td>
            //               <td>' . $drivers->email .'</td>
            //               <td>' . $drivers->phone_number .'</td>
            //               <td>Action</td>
            //             </tr>
            //                 ';
            //         }

            //         return response()->json($output);
            //     }
            //  }

            //  else{

                // $viewdriver = new Driver();
                // $driver = $viewdriver->where('status', 'active')->paginate(25);

                // $i = 1;
                // foreach ($driver as $datas) {


                //     $output .= '

                //     <tr>
                //       <td>' . $i++ . '</td>
                //       <td>' . $datas->first_name . '</td>
                //       <td>' . $datas->last_name . '</td>
                //       <td>Action</td>
                //       </tr>
                //         ';
                // }

               // $output .= '

        //             <tr>

        //               <td colspan="4" class="text-center">No Data Found</td>
        //               </tr>
        //                 ';


        //         return response()->json($output);

        //      }


        // }


  //  }
                    // public function is_shifted_started(Request $request,$id){

                    //     $storeData = $request->validate([
                    //         'is_shift_started' => '',

                    //     ]);

                    //     $driver = new Driver;
                    //     $driver = Driver::where('_id', $id)->update($storeData);
                    //     return response()->json(['success'=>'Location status changed']);

                    // }


}
