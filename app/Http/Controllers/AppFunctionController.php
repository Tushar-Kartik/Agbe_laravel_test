<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AppFunctionController extends Controller
{
    public function show_form(){
        $countries = DB::table('country')->pluck('country_name','country_id');
        $states = DB::table('state')->pluck('state_name','state_id');
        $cities = DB::table('city')->pluck('city_name','city_id');
        return view('register',compact('countries','states','cities'));
    }

    public function getStates(Request $request)
    {
        $states = DB::table('state')
                    ->where('country_id', $request->country_id)
                    ->pluck('state_name', 'state_id');
        return response()->json($states);
    }

    public function getCities(Request $request)
    {
        $cities = DB::table('city')
                    ->where('state_id',$request->state_id)
                    ->pluck('city_name','city_id');
        return response()->json($cities);
    }

    // th
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'fname'     => 'required|string|max:255',
    //         'lname'     => 'required|string|max:255',
    //         'dob'       => 'required|date',
    //         'email'     => 'required|string|email|max:255|unique:users',
    //         'mobile'    => 'required|string|max:15',
    //         'password'  => 'required|string|min:8|confirmed',
    //         'country'   => 'required|exists:country,country_id',
    //         'state'     => 'required|exists:state,state_id',
    //         'city'      => 'required|string|max:255',
    //         'locality'  => 'required|string|max:255',
    //         'pincode'   => 'required|string|max:10',
    //     ]);
    
    //     try {
    //         User::create([
    //             'first_name' => $request->fname,
    //             'last_name' => $request->lname,
    //             'dob' => $request->dob,
    //             'email' => $request->email,
    //             'mobile_number' => $request->mobile,
    //             'password' => Hash::make($request->password),
    //             'country_id' => $request->country,
    //             'state_id' => $request->state,
    //             'city_id' => $request->city,
    //             'locality' => $request->locality,
    //             'pincode' => $request->pincode,
    //         ]);
    
    //         return redirect('/register')->with('success', 'User registered successfully!');
    //     } catch (\Exception $e) {
    //         return redirect('/register')->with('error', 'Failed to register user: ' . $e->getMessage());
    //     }    
    // }

}
