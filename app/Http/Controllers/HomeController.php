<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function gethome(){
    	return view('HomePage.Home');
    }
}
