<?php

namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getservice(){
    	$us = Service::all();
    	return view('HomePage.Service', ['title'=>'Service Management', 'data'=>$us]);
    }
    public function postservice(Request $Request)
    {

			$val = $Request->macode;
			$us = Service::where('code', $val)->update([
				'price'=>$Request->price
			]);
			
			return redirect()->route('getservice')->with('success', 'Cập Nhật Thành Công!');
    }
    public function xoaservice(Request $Request)
    {
    	$us = Service::where('code', $Request->code)->delete();
    	return redirect()->route('getservice')->with('success', 'Xóa Thành Công!');
		
    }
}
