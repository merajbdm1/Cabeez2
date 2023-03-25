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
use App\Models\admin\VehicleModel;
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

        $veh_make=new VehicleMake();
        $veh_make=$veh_make->all();

        $veh_model=new VehicleModel();
        $veh_modelop=$veh_model->all();

        return view('admin.pages.driver.add-driver', ['veh_modelop'=>$veh_modelop,'veh_make'=>$veh_make,'vehicle_driv'=>$vehicle_driv,'driver' => $driver, 'datasession' => $datasession]);
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
        // dd($request);

        $validated = $request->validate([
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'phone_number' => 'required',
            'email' => 'required|email|min:3|max:255',
            'vehicle_year' => 'required',
            'car_registration_number' => 'required|string|min:3|max:255',
            'brand_id' => 'required|string',
            'model_id' => 'required|string',
            'category_id' => 'required|string',
            'puc_expiry_date' => 'required|date',
            'date_of_birth' => 'required|date',
            'blood_group' => 'required|string',
            'emergency_number' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'address' => 'required|string',
            'photo' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'commercial_insurance' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'license_photo_front' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'license_photo_back' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'aadhaar_image_front' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'aadhaar_image_back' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'rental_agreement_front' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'rental_agreement_back' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'pan_card' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'registration_photo' => 'required|mimes:jpg,png,jpeg,mp4,svg|max:2048',
            'document_status' => '',
            'status'=>'',
            'mondaystartend' => '',
            'tuesdaystartend' => '',
            'wednesdaystartend' => '',
            'thursdaystartend' => '',
            'fridaystartend' => '',
            'saturdaystartend' => '',


        ]);

        $driver = new Driver;
        // dd($driver);
        $driver->first_name = $request->input('first_name');
        $driver->last_name = $request->input('last_name');
        $driver->phone_number = $request->input('phone_number');
        $driver->email = $request->input('email');
        $driver->vehicle_year = $request->input('vehicle_year');
        $driver->car_registration_number = $request->input('car_registration_number');
        $driver->brand_id = $request->input('brand_id');
        $driver->model_id = $request->input('model_id');
        $driver->category_id = $request->input('category_id');
        $driver->puc_expiry_date = $request->input('puc_expiry_date');
        $driver->date_of_birth = $request->input('date_of_birth');
        $driver->blood_group = $request->input('blood_group');
        $driver->emergency_number = $request->input('emergency_number');
        $driver->state = $request->input('state');
        $driver->city = $request->input('city');
        $driver->postal_code = $request->input('postal_code');
        $driver->address = $request->input('address');
        $driver->document_status = $request->input('document_status');
        $driver->status = $request->input('status');


        $driver->mondaystartend = $request->input('mondaystartend');
        $driver->tuesdaystartend = $request->input('tuesdaystartend');
        $driver->wednesdaystartend = $request->input('wednesdaystartend');
        $driver->thursdaystartend = $request->input('thursdaystartend');
        $driver->fridaystartend = $request->input('fridaystartend');
        $driver->saturdaystartend = $request->input('saturdaystartend');


        if ($photo = $request->file('photo')) {
            $destinationPath = 'admin/uploads/Driver';
            $profileImage = rand(0000, 9999) . $photo->getClientOriginalName();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
            $driver->photo = $profileImage;
        }




        if ($commercial_insurance = $request->file('commercial_insurance')) {
            $destinationPath = 'admin/uploads/Driver';
            $document = rand(0000, 9999) . $commercial_insurance->getClientOriginalName();
            $commercial_insurance->move($destinationPath, $document);
            $input['commercial_insurance'] = "$document";
            $driver->commercial_insurance = $document;
        }

        if ($license_photo_front = $request->file('license_photo_front')) {
            $destinationPath = 'admin/uploads/Driver';
            $document2 = rand(0000, 9999) . $license_photo_front->getClientOriginalName();
            $license_photo_front->move($destinationPath, $document2);
            $input['license_photo_front'] = "$document2";
            $driver->license_photo_front = $document2;
        }

        if ($license_photo_back = $request->file('license_photo_back')) {
            $destinationPath = 'admin/uploads/Driver';
            $document3 = rand(0000, 9999) . $license_photo_back->getClientOriginalName();
            $license_photo_back->move($destinationPath, $document3);
            $input['license_photo_back'] = "$document3";
            $driver->license_photo_back = $document3;
        }

        if ($aadhaar_image_front = $request->file('aadhaar_image_front')) {
            $destinationPath = 'admin/uploads/Driver';
            $document4 = rand(0000, 9999) . $aadhaar_image_front->getClientOriginalName();
            $aadhaar_image_front->move($destinationPath, $document4);
            $input['aadhaar_image_front'] = "$document4";
            $driver->aadhaar_image_front = $document4;
        }

        if ($aadhaar_image_back = $request->file('aadhaar_image_back')) {
            $destinationPath = 'admin/uploads/Driver';
            $document5 = rand(0000, 9999) . $aadhaar_image_back->getClientOriginalName();
            $aadhaar_image_back->move($destinationPath, $document5);
            $input['aadhaar_image_back'] = "$document5";
            $driver->aadhaar_image_back = $document5;
        }

        if ($rental_agreement_front = $request->file('rental_agreement_front')) {
            $destinationPath = 'admin/uploads/Driver';
            $document6 = rand(0000, 9999) . $rental_agreement_front->getClientOriginalName();
            $rental_agreement_front->move($destinationPath, $document6);
            $input['rental_agreement_front'] = "$document6";
            $driver->rental_agreement_front = $document6;
        }

        if ($rental_agreement_back = $request->file('rental_agreement_back')) {
            $destinationPath = 'admin/uploads/Driver';
            $document7 = rand(0000, 9999) . $rental_agreement_back->getClientOriginalName();
            $rental_agreement_back->move($destinationPath, $document7);
            $input['rental_agreement_back'] = "$document7";
            $driver->rental_agreement_back = $document7;
        }

        if ($pan_card = $request->file('pan_card')) {
            $destinationPath = 'admin/uploads/Driver';
            $document8 = rand(0000, 9999) . $pan_card->getClientOriginalName();
            $pan_card->move($destinationPath, $document8);
            $input['pan_card'] = "$document8";
            $driver->pan_card = $document8;
        }

        if ($registration_photo = $request->file('registration_photo')) {
            $destinationPath = 'admin/uploads/Driver';
            $document9 = rand(0000, 9999) . $registration_photo->getClientOriginalName();
            $registration_photo->move($destinationPath, $document9);
            $input['registration_photo'] = "$document9";
            $driver->registration_photo = $document9;
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

        $driver_veh_make=new VehicleMake();
        $vehicle_drive_make=$driver_veh_make->all();

        $driver_veh_model=new VehicleModel();
        $editvehiclemodel=$driver_veh_model->all();
       // echo "<pre>";print_r($editvehicle);exit;

        // dd($edit_driver);
        return view('admin.pages.driver.edit-driver', ['editvehiclemodel'=>$editvehiclemodel,'vehicle_drive_make'=>$vehicle_drive_make,'vehicle_driv'=>$vehicle_driv,'datasession' => $datasession, 'driver' => $driver, 'edit_driver' => $edit_driver]);
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

        // return $request;
        $storeData = $request->validate([

            'first_name' => '',
            'last_name' => '',
            'phone_number' => '',
            'email' => '',
            'vehicle_year' => '',
            'car_registration_number' => '',
            'brand_id' => '',
            'model_id' => '',
            'category_id' => '',
            'puc_expiry_date' => '',
            'date_of_birth' => '',
            'blood_group' => '',
            'emergency_number' => '',
            'state' => '',
            'city' => '',
            'postal_code' => '',
            'address' => '',
            'photo' => '',
            'commercial_insurance' => '',
            'license_photo_front' => '',
            'license_photo_back' => '',
            'aadhaar_image_front' => '',
            'aadhaar_image_back' => '',
            'rental_agreement_front' => '',
            'rental_agreement_back' => '',
            'pan_card' => '',
            'registration_photo' => '',
            'document_status' => '',
            'status'=>'',
            'mondaystartend' => '',
            'tuesdaystartend' => '',
            'wednesdaystartend' => '',
            'thursdaystartend' => '',
            'fridaystartend' => '',
            'saturdaystartend' => '',

        ]);


       //echo "<pre>"; print_r($storeData);exit(); echo "</pre>";
        // $update_driver = Driver::where('_id', $id)->first();
        //     $imageName = $update_driver->driver_upload_commercial_insurance;
        //     dd($imageName);
        //     $image_name = $imageName;
        //   $image_path = 'admin/uploads/DriverImage/'.$image_name;
        //   if(File::exists($image_path)) {
        //     File::delete($image_path);
        //   }


        if ($request->hasfile('photo')) {
            $imageName = rand(0000, 9999) . '.' . $request->photo->extension();
            $request->photo->move('admin/uploads/Driver', $imageName);
            $request->photo = $imageName;
            $storeData['photo'] = $imageName;
        }

        if ($request->hasfile('commercial_insurance')) {
            $imageName = rand(0000, 9999) . '.' . $request->commercial_insurance->extension();

            $request->commercial_insurance->move('admin/uploads/Driver', $imageName);
            $request->commercial_insurance = $imageName;
            $storeData['commercial_insurance'] = $imageName;
        }
        if ($request->hasfile('license_photo_front')) {
            $imageName = rand(0000, 9999) . '.' . $request->license_photo_front->extension();

            $request->license_photo_front->move('admin/uploads/Driver', $imageName);
            $request->license_photo_front = $imageName;
            $storeData['license_photo_front'] = $imageName;
        }
        if ($request->hasfile('license_photo_back')) {
            $imageName = rand(0000, 9999) . '.' . $request->license_photo_back->extension();

            $request->license_photo_back->move('admin/uploads/Driver', $imageName);
            $request->license_photo_back = $imageName;
            $storeData['license_photo_back'] = $imageName;
        }
        if ($request->hasfile('aadhaar_image_front')) {
            $imageName = rand(0000, 9999) . '.' . $request->aadhaar_image_front->extension();

            $request->aadhaar_image_front->move('admin/uploads/Driver', $imageName);
            $request->aadhaar_image_front = $imageName;
            $storeData['aadhaar_image_front'] = $imageName;
        }
        if ($request->hasfile('aadhaar_image_back')) {
            $imageName = rand(0000, 9999) . '.' . $request->aadhaar_image_back->extension();

            $request->aadhaar_image_back->move('admin/uploads/Driver', $imageName);
            $request->aadhaar_image_back = $imageName;
            $storeData['aadhaar_image_back'] = $imageName;
        }
        if ($request->hasfile('rental_agreement_front')) {
            $imageName = rand(0000, 9999) . '.' . $request->rental_agreement_front->extension();

            $request->rental_agreement_front->move('admin/uploads/Driver', $imageName);
            $request->rental_agreement_front = $imageName;
            $storeData['rental_agreement_front'] = $imageName;
        }
        if ($request->hasfile('rental_agreement_back')) {
            $imageName = rand(0000, 9999) . '.' . $request->rental_agreement_back->extension();

            $request->rental_agreement_back->move('admin/uploads/Driver', $imageName);
            $request->rental_agreement_back = $imageName;
            $storeData['rental_agreement_back'] = $imageName;
        }

        if ($request->hasfile('pan_card')) {
            $imageName = rand(0000, 9999) . '.' .$request->pan_card->extension();

            $request->pan_card->move('admin/uploads/Driver', $imageName);
            $request->pan_card = $imageName;
            $storeData['pan_card'] = $imageName;
        }


        if ($request->hasfile('registration_photo')) {
            $imageName = rand(0000, 9999) . '.' . $request->registration_photo->extension();

            $request->registration_photo->move('admin/uploads/Driver', $imageName);
            $request->registration_photo = $imageName;
            $storeData['registration_photo'] = $imageName;
        }

        $driver = new Driver;
        $driverview = Driver::where('_id', $id)->update($storeData);
        // echo "<pre>";print_r($driverview);exit();
        return redirect('admin/edit_driver/'.$id)->with('EditDriverDetailSuccess', 'Driver Details Updated Successfully!');
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
