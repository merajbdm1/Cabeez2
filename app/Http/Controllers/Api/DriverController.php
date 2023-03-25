<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Driver;
// use MongoDB\Client as MongoClient;

class DriverController extends Controller
{
    public function insert_driver_data(Request $request){
        // $client = new MongoClient();
       
     //   $collection = $client->cabe->drivers;
       
        
        $driver = new Driver;
       //print_r($driver);exit;
       
        $validated = Validator($request->all(),
            [
            'first_name' => 'required',
            'last_name'=>'required',
            'blood_group'=>'required',
            'puc_expiry_date'=>'required',
            'aadhar_number'=>'required',
            'commercial_insurance'=>'required',
            'pan_card'=>'required',
            'date_of_birth'=>'required',
            'phone_number'=>'required',
            'emergency_number_country_code'=>'required',
            'emergency_number'=>'required',
            'driver_vehicle_make'=>'required',
            'driver_vehicle_model'=>'required',
            'driver_vehicle_category'=>'required',
            // 'vehicle_year'=>'',
            'email'=>'required',
            'city'=>'required',
            'city'=>'required',
            'state'=>'required',
            'postal_code'=>'required',
            'aadhaar_image_back'=>'required',
            'aadhaar_image_front'=>'required',
            'pan_card_image'=>'required',
            'photo'=>'required',
            'license_photo_back'=>'required',
            'license_photo_front'=>'required',
            'registration_year'=>'required',
             'rc_book_front'=>'required',
            'rc_book_back'=>'required',
            ],
            [
            'first_name.required'=> 'Your name is required',
            'last_name.required'=> 'Your lname ia required',
            'photo.required'=> 'Your photo  is required',
            'photo2.required'=> 'Your photo  is required',
          
             ]
             );

            //  echo "run";exit;
            if ($validated->fails())
            {

                // echo "run";exit;
               return $validated->errors();
                //
            }
            $driverfirst = $request->input('first_name');
            $driverlaast = $request->input('last_name');
            $blood_group = $request->input('blood_group');
            $puc_expiry_date = $request->input('puc_expiry_date');
            $aadhar_number = $request->input('aadhar_number');
            $commercial_insurance = $request->input('commercial_insurance');
            $pan_card = $request->input('pan_card');
            $emergency_number_country_code = $request->input('emergency_number_country_code');
            $emergency_number = $request->input('emergency_number');
            $driver_vehicle_make = $request->input('driver_vehicle_make');
            $driver_vehicle_model = $request->input('driver_vehicle_model');
            $driver_vehicle_category = $request->input('driver_vehicle_category');
            $registration_year = $request->input('registration_year');
            $email = $request->input('email');
            $city = $request->input('city');
            $state = $request->input('state');
            $postal_code = $request->input('postal_code');
            $date_of_birth= $request->input('date_of_birth');
     

        // if ($photo = $request->file('photo')) {
        //     $destinationPath = 'admin/uploads/Driver';
        //     $profileImage = rand(0000, 9999) . $photo->getClientOriginalName();
        //     $photo->move($destinationPath, $profileImage);
        //     $input['photo'] = "$profileImage";
        //     $driver->photo = $profileImage;
        //     // echo $profileImage;
        //  }

        // foreach ($_FILES as $key => $file) {
        //     print_r($file);
        // }

       
        
        // $arrayAE=  (array) $files;
        // echo "<pre>";
        // print_r($arrayAE);
       

         $files = $request->files;
        foreach ($files as $key => $file) {
          
            $destinationPath = 'admin/uploads/Driver';
            $profileImage= rand(0000, 9999) . $file->getClientOriginalName();
            $file->move($destinationPath, $profileImage);
            $input[$key] = "$profileImage";
            $driver->$key = $profileImage;
           
        }

        // foreach ($_FILES as $key => $file) {
        //     print_r($file);
        //     // $mail->AddAttachment($file['tmp_name'], $file['name']);
        //     // $key = str_replace(array('_'), ' ',$key);
        //     // $message .= "<tr><td><strong> ".$key."</strong> </td><td>".$file['name']."</td></tr>";
        // }


        // print_r($profileImage);
        
        
        // $images=array();
        // if($files=$request->file('images')){
        //     foreach($files as $file){
        //         $name=$file->getClientOriginalName();
        //         $file->move('image',$name);
        //         $images[]=$name;
        //     }
        // }
         
        //  if ($photo2 = $request->file('photo2')) {
        //     $destinationPath = 'admin/uploads/Driver';
        //     $profileImage2 = rand(0000, 9999) . $photo2->getClientOriginalName();
        //     $photo2->move($destinationPath, $profileImage2);
        //     $input['photo2'] = "$profileImage2";
        //     $driver->photo2 = $profileImage2;
        //     // echo $profileImage2;
        // }

        
        function array_push_assoc($array, $key, $value){
            $array[$key] = $value;
            return $array;
         }

         $data = ['first_name' => $driverfirst,
         'last_name' => $driverlaast,
         'puc_expiry_date' => $puc_expiry_date,
         'aadhar_number' => $aadhar_number,
         'commercial_insurance' => $commercial_insurance,
         'pan_card' => $pan_card,
         'emergency_number_country_code' => $emergency_number_country_code,
         'emergency_number' => $emergency_number,
         'driver_vehicle_make' => $driver_vehicle_make,
         'driver_vehicle_model' => $driver_vehicle_model,
         'driver_vehicle_category' => $driver_vehicle_category,
         'registration_year' => $registration_year,
         'email' => $email,
         'city' => $city,
         'state' => $state,
         'date_of_birth' => $date_of_birth,
         'postal_code' => $postal_code,];

         
         foreach ($_FILES as $key => $file) {
             $col_name = $key;
             $filename = $file['0 ']; 
             $data = array_push_assoc($data,$col_name,$filename);
         }

      

        

    //   print_r($data);

        // print_r($data);exit;
           $datasave=$driver->create($data);
            // $data2= $collection->insertOne($data);
    
            if($datasave){
                // echo "done";exit;
                return response()->json([
                    'status' => '201', 
                    'data'=>$datasave,
                    'message' => 'Data inserted successfully',
                    'img_url'=>'http://192.168.0.25:8000/admin/uploads/Driver/',
                    // 'image_url' => url(asset('admin/uploads/Driver')),
                ],200);
              }
              else{
                return response()->json([
                    'status' => '422', 
                    'error' => true,
                    'message' => 'data could not be inserted',
                    
                ]);
              }
            }

            public function driver_data_get_id(Request $request){

                $dirverfdg = new Driver;
                $id=$request->input('_id');

                $all_data = $dirverfdg->where('_id',$id)->first();
                // print_r($all_data);exit;

                if($all_data){
                    // echo "done";exit;
                    return response()->json([
                        'status' => '201', 
                        'data'=>$all_data,
                        'message' => 'data found',
                        'img_url'=>'http://192.168.0.25:8000/admin/uploads/Driver/',
                        // 'image_url' => url(asset('admin/uploads/Driver')),
                    ],200);
                  }
                  else{
                    return response()->json([
                        'status' => '422', 
                        'error' => true,
                        'message' => 'data could not be found',
                        
                    ]);
                  }
                }
            

}









