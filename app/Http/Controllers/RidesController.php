<?php

namespace App\Http\Controllers;
use App\Models\Create_data;
use App\Models\Rides;
use Illuminate\Http\Request;
use MongoDB\Client as MongoClient;
class RidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.pages.rides.add_rides');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rides  $rides
     * @return \Illuminate\Http\Response
     */
    public function show(Rides $rides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rides  $rides
     * @return \Illuminate\Http\Response
     */
    public function edit(Rides $rides)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rides  $rides
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rides $rides)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rides  $rides
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rides $rides)
    {
        //
    }

    public function create_data(Request $request)
    {


        $client = new MongoClient();
        $collection = $client->cabe->create_datas;

      
        $data = [
            'thirdSos' => $request->thirdSos,
            'secondSos'=> $request->secondSos,
            'firstSos'=> $request->firstSos
        ];

    $data2= $collection->insertOne($data);

        return response()->json([
            'status' => '201', 
            'error' => 'false',
            'message' => 'Data inserted successfully',
            'Data_list' => $data2,
        ]);



      
       // $createdata =new Create_data();
       // $createdata->name=$rides->name; print_r($createdata);
        //$validatedData = $request->validate([
            // 'name' => 'required',
            // 'lname' => 'required',
           
       // ]);
        
      // print_r($validatedData);
        // create a new user
      //  $user = $createdata->insert($validatedData);
//print_r($user);
        // return the new user as JSON
      //  return response()->json($user, 201);


       
     


    }
}
