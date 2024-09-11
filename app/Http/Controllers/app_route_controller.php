<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class app_route_controller extends Controller
{
    //
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    // public function display_page(){
    //     return view('display_data');
    // }  //not used now
}
