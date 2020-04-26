<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getlogin(){
    	return view('Login');
    }
    public function postlogin(Request $Request){
    	$data = [
        'username' => $Request['username'],
        'password' => $Request['password'],
    ];

    	if(Auth::attempt($data))
    	{
    		return redirect()->route('gethome');

    	}
    	else
    	{
    		return redirect()->route('getlogin')->with("er", "Loi");
    	}
    }
}
