<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserDisplay extends Controller
{
    function displayData(Request $req){ 
        //Sending the data to the view file to display the user information
        $data['user_name'] = $req->name_table;
        $data['user_hour_rate'] = $req->hour_rate_table;
        $data['user_currency'] = $req->currency_table;
        return view('displayuser')->with('data', $data);

}

}

