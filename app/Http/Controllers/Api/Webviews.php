<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Webviews extends Controller
{
    public function privacy_policy(){
        
        return view('webviews.privacy_policy');
    }

    public function term_condition(){
        return view('webviews.term_condition');
    }

}
