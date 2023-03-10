<?php

namespace App\Http\Controllers;

use App\Models\Rides;
use Illuminate\Http\Request;

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
}
