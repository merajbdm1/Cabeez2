<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Riders;
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


        return view('admin.pages.group_coupon.view_group_coupon', ["datasession" => $datasession]);
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

        $reidervieww=new Riders();
        $viewrider=$reidervieww->paginate(25);

        return view('admin.pages.group_coupon.add_group', ["viewrider"=>$viewrider,"datasession" => $datasession]);
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
        //
    }

    /**
     * Update the specified resource in storage.
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
        //
    }
}
