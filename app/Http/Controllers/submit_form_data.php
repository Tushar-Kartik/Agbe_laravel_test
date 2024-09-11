<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class submit_form_data extends Controller
{
    function store_data(Request $request){
        try {
            $data = new User;

            $data->first_name = $request->input('fname');
            $data->last_name = $request->input('lname');
            $data->email = $request->input('email');
            $data->dob = $request->input('dob');
            $data->mobile_number = $request->input('mobile');
            $data->password = $request->input('password');
            $data->country_id = $request->input('country');
            $data->state_id = $request->input('state');
            $data->city_id = $request->input('city');
            $data->locality = $request->input('locality');
            $data->pincode = $request->input('pincode');

            $data->save();

            return redirect('/login')->with('success', 'User registered successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to register user: ' . $e->getMessage());
        }
    }
}
