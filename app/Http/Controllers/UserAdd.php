<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserAdd extends Controller
{
    function save(Request $req){    // This function takes the entered fields from the form as a request
                                    // Then inserts the data in the users table in the database
        $user = new User;           // Creates an instance of the model
        $user->name = $req->name;   // Assignes the values from the form to the fields of the database table
        $user->hour_rate = $req->hour_rate;
        $user->currency = $req->currency;
 
    }

   function getUsers(){             //This data retrieves the data from the database users table
        
        $data['data'] = DB::table('users')->get();

        if(count($data) > 0){
            return view('useradd')->with('data', $data);
        } else {
            return view('useradd');
        }
    }
    
}
