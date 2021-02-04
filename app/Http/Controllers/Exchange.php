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

        $usd_to_gbp; //Initialising variables to hold the conversion rates from fixer
        $gbp_to_usd;
        $eur_to_gbp;
        $eur_to_usd;
        $usd_to_eur;
        $gbp_to_eur;
        

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
            }else if($exchange_type == "fixer"){  //API call to Fixer with base EUR --- Other bases are restricted  
                $resp = Http::get('http://data.fixer.io/api/latest?access_key=f5cb8b8af7ed7d19e80f304792550501');
                $rates1 = json_decode($resp, true);
                $rates = $rates1['rates'];
                $eur_to_usd = $rates['USD'];    //Saving the conversion rates values to the variables for the calculation of the other rates
                $eur_to_gbp = $rates['GBP'];    //Since the free account in fixer limits the base currency choice
                $gbp_to_eur = 1/$eur_to_gbp;    //Getting the GBP to EUR conversion rate and vice versa
                $usd_to_eur = 1/$eur_to_usd;
                                                //Since we have the values for the rates with euro we can use that ratio to find the 
                                                //conversion rate for USD and GBP as well
                $usd_to_gbp = $usd_to_eur/$gbp_to_eur;
                $gbp_to_usd = $gbp_to_eur/$usd_to_eur;

                if($currecny_type == "GBP"){
                    if($user_currency == "EUR"){
                        $final_hour_rate = $user_hour_rate * $eur_to_gbp;
                    }else if($user_currency== "USD"){
                        $final_hour_rate = $user_hour_rate * $usd_to_gbp;
                    }
                }else if($currecny_type == "EUR"){
                    if($user_currency == "GBP"){
                        $final_hour_rate = $user_hour_rate * $gbp_to_eur;
                    }else if($user_currency== "USD"){
                        $final_hour_rate = $user_hour_rate * $usd_to_eur;
                    }
                }else if($currecny_type == "USD"){
                    if($user_currency == "EUR"){
                        $final_hour_rate = $user_hour_rate * $eur_to_usd;
                    }else if($user_currency== "GBP"){
                        $final_hour_rate = $user_hour_rate * $gbp_to_usd;
                    }
                }
            }
        }
        $final_hour_rate = round($final_hour_rate, 2);
        $resp = array( //Creating an array to hold the final data
            'User Name:' => $user_name,
            'Final Hour Rate' => $final_hour_rate,
            'Currency' => $currecny_type
        );
        
        
        return response()->json($resp); //Display the final data as a json
    }
}
