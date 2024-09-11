<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        $user = User::where('email',$request->email)->first();

        if($user && $request->password === $user->password){
            Auth::login($user);
            return  redirect('/displaypage')->with('success','login successfull');
        }else{
            return redirect()->back()->with('error','invalid email or password.');
        }
    }

    public function displayPage(){
        return view('display_data');
    }
}
