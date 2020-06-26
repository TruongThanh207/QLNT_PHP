<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\InforRegister;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getlogin(){
    	return view('Login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('getlogin');
    }
    public function postlogin(Request $Request){
    	$data = [
        'username' => $Request['username'],
        'password' => $Request['password'],
    ];

        if(isset($Request->cmnd)){
                $s = InforRegister::Where('CMND',  $Request->cmnd)->first();
                if(isset($s))
                {
                    return redirect()->route('khachthue', ['cmnd'=>$Request->cmnd]);
                }
                else
                {
                    return redirect()->route('getlogin');
                }
        }
    	if(Auth::attempt($data))
    	{
    		return redirect()->route('gethome');

    	}
    	else
    	{
            
    		return redirect()->route('getlogin')->with("er", "Wrong username or password");
    	}
        
    }
    public function getemployee(){
        $data = User::all();
        return view('HomePage.Employee', ['title'=>'User Management', 'data'=>$data]);
    }
    public function getaddemployee(){
        return view('HomePage.AddEmployee', ['title'=>'']);
    }
    public function postaddemployee(Request $Request)
    {
            $us = new User();
            $us->name = $Request->Name;
            $us->username = $Request->Username;
            $us->password = bcrypt($Request->password);
            $us->tel = $Request->tel;
            $us->email = $Request->Email;
            $us->role = $Request->role;

        if($Request->hasFile('myfile'))
        {
            $file = $Request->file('myfile');

            $extension = $file->getClientOriginalExtension();
            if($extension!='jpg'&& $extension!='png'&&$extension!='jpeg')
            {
                return redirect()->route('getaddemployee')->with('Error', 'Bạn chỉ được chọn file ảnh!');
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4)."_".$name;
            
            while(file_exists("asset/images".$img))
            {
                $img = Str::random(4)."_".$name;
            }
            
            $file->move("asset/images", $img);
            $us->img = $img;
        }
        else{
            $us->img = "";
        }   
        $us->save();
        return redirect()->route('getaddemployee')->with('success', 'Thêm thành công!');
    }
    public function geteditprofile ($id)
    {
        $us = User::find($id);
        return view('HomePage.EditProfile', ['title'=>'', 'data'=>$us]);
    }
    public function getdetailemployee($id)
    {
        $us = User::find($id);
        return view('HomePage.DetailEmployee', ['title'=>'', 'data'=>$us]);
    }
    public function posteditemployee(Request $Request, $id)
    {
        $users = User::find($id);
       
        if($Request->Password == "")
        {

        }
        else{
            $users->password = bcrypt($Request->Password);
        }
        $users->role = $Request->role;
        if($Request->hasFile('myfile'))
        {
            $file = $Request->file('myfile');

            $extension = $file->getClientOriginalExtension();
            if($extension!='jpg'&& $extension!='png'&&$extension!='jpeg')
            {
                return redirect()->route('getdetailemployee', ['id'=>$id])->with('Error', 'Bạn chỉ được chọn file ảnh!');
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4)."_".$name;
            
            while(file_exists("asset/images".$img))
            {
                $img = Str::random(4)."_".$name;
            }
            
            $file->move("asset/images", $img);
            $users->img = $img;
        }
        $users->save();
        return redirect()->route('getdetailemployee',['id'=>$id])->with('success', 'Sửa thành công!');
    }
    public function xoaemployee($id)
    {
        $us = User::find($id)->delete();
        return redirect()->route('getemployee')->with('success', 'Xóa thành công!');
    }
}
