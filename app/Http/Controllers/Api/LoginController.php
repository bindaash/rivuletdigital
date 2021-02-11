<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Laravel\Passport\Passport;


class LoginController extends Controller
{
    public function login (Request $request)
    {   //print_r(request()->all()); exit;
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        
        if(!Auth::attempt($login)){ 
            return response(['message' => 'Invalid login credentials']);
        }
        
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        //print_r($accessToken); exit;
        return response(['user'=> Auth::user(), 'access_token' => $accessToken]);

    }   
    
}
