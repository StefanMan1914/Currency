<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {             
        
        $data['data'] = DB::table('users')->get();

        if(count($data) > 0){
            return view('home')->with('data', $data);
        } else {
            return view('home');
        }
});
Route::get('home', 'App\Http\Controllers\Home@getUsers');

Route::post('gotoadd', function(){
    return view('useradd');
});

Route::view('useradd', 'useradd');  // Adding the route to access the form for creation of the user.
Route::post('submit', 'App\Http\Controllers\UserAdd@save')->name('save');
Route::get('useradd', 'App\Http\Controllers\UserAdd@getUsers');