<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Exchange extends Controller
{
    function exchangeCurrency(Request $req){
        $user_name = $req->user_n;
        $user_currency = $req->user_c;
        $user_hour_rate = $req->user_hr;

        $final_hour_rate;

        $exchange_type = $req->exchange_type;   //Creating a function with nested if statements to compare the user currency to the one
        $currecny_type = $req->currency_type;   //selected for the conversion of the hour rate. If they are different then the exchange type
        if($user_currency == $currecny_type){   //is checked to see if the user has chosen the default one or Fixer.
            $final_hour_rate = $user_hour_rate;
        }else{
            if($exchange_type == "default"){    //Checking the exchange type and converting the currecies in relation to the task specifications
                if($currecny_type == "GBP"){
                    if($user_currency == "EUR"){
                        $final_hour_rate = $user_hour_rate * 0.9;
                    }else if($user_currency== "USD"){
                        $final_hour_rate = $user_hour_rate * 0.7;
                    }
                }else if($currecny_type == "EUR"){
                    if($user_currency == "GBP"){
                        $final_hour_rate = $user_hour_rate * 1.1;
                    }else if($user_currency== "USD"){
                        $final_hour_rate = $user_hour_rate * 0.8;
                    }
                }else if($currecny_type == "USD"){
                    if($user_currency == "EUR"){
                        $final_hour_rate = $user_hour_rate * 1.2;
                    }else if($user_currency== "GBP"){
                        $final_hour_rate = $user_hour_rate * 1.3;
                    }
                }
            }else if($exchange_type == "fixer"){
 
            }
        }
        $final_hour_rate = round($final_hour_rate, 2);
        $resp[] = [ //Creating an array to hold the final data
            'User Name:' => $user_name,
            'Final Hour Rate' => $final_hour_rate,
            'Currency' => $currecny_type
        ];

        
        return response()->json($resp); //Display the final data as a json
    }
}
