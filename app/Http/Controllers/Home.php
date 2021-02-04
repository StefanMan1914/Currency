<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Home extends Controller
{
    function getUsers(){             
        
        $data['data'] = DB::table('users')->get();

        if(count($data) > 0){
            return view('home')->with('data', $data);
        } else {
            return view('home');
        }
    }
}
