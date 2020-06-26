<?php

namespace App\Http\Controllers;
use App\Room;
use App\InforRegister;
use App\Person;
use App\Debit;
use App\Service;
use App\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function gethome(){
    	$room = Room::paginate(3);
    	return view('HomePage.Home', ['title'=> 'Room Management', 'data'=>$room]);
    }
    public function xoaroom(Request $Request)
    {
    	$us = Room::where('code', $Request->code)->delete();
    	return redirect()->route('gethome')->with('success', 'Xóa Thành Công!');
		
    }
    public function postroom(Request $Request)
    {
       if($Request->flag == 0)
        {
            $us = new Room();
            $us->code = $us->Render_Code();
            $us->status = 0;
            if($Request->description==null)
            {
                 $us->description = 'Không Có';
            }
            else
            {
                 $us->description = $Request->description;
            }
            $us->price = $Request->price;
            $us->save();
            return redirect()->route('gethome')->with('success', 'Thêm Thành Công!');
        } 
        else
        {
            //dd($Request->macode);
            if($Request->description==null)
            {
                $val = 'Không Có';
            }                 
            else
            {
                $val = $Request->description;
            }
            $us = Room::where('code',$Request->macode)->update([
                    'price' => $Request->price,
                    'description' =>$val
            ]);
            //$us->save();
            return redirect()->route('gethome')->with('success', 'Cập Nhật Thành Công!');
        }
    }
    public function inforregister(Request $Request)
    {
        $this->validate($Request,
            [
                'CMND'=>'min:9'
            ],
            [
                'CMND.min'=>'Vui Lòng Xem Lại Số CMND!'
            ]
        );
        $infor = InforRegister::where('CMND', $Request->CMND)->first();
        if(!$infor)
        {
            $us = new InforRegister();
            $us->code = $us->Render_Code();
            $us->registerday = date("Y/m/d", strtotime($Request->ngaydk));
            $us->roomcode = $Request->room_code;
            $us->nguoidaidien = $Request->nguoidaidien;
            $us->CMND = $Request->CMND;
            $us->save();
            $room = Room::where('code', $Request->room_code)->update([
                    'status'=>1
            ]);
            return redirect()->route('gethome')->with('success', 'Đăng Kí Thành Công!'); 
        }
        else
        {
         
            return redirect()->route('gethome')->with('error', 'Vui lòng kiểm tra lại số cmnd!'); 
        }
       

    }
    public function detailroom($id)
    {

        $infor = InforRegister::where('roomcode', $id)->first();
        $feedback = Feedback::where('registercode', $infor->code)->get();
        $room = Room::where('code', $id)->first();
        $person = Person::where('registercode', $infor->code)->get();
        $count = 0;
        $countper = 0;
        if($person!=null)
        {
            foreach($person as $countxe)
            {
                $count += $countxe->vehicle;
                $countper++;
            }
        }
        $debit = Debit::where('registercode', $infor->code)->first();
        $service = Service::all();

        
        $dayinfor = strtotime($infor->registerday);
        $s = date("Y/m/d");
        $datechot = strtotime($s);
        $sec = $datechot - $dayinfor;
        $day = $sec/86400;

        $day_now = date('d',strtotime($s));
        $month_now = date('m',strtotime($s));
        $year_now = date('Y',strtotime($s));

        $day_first = $year_now."/".$month_now."/1";
        $x =strtotime(date($day_first));
        $sec_first = $x-$dayinfor;
        $day1 =$sec_first/86400;
       

        $monthdk = date('m', strtotime($infor->registerday));
        $daydk = date('d', strtotime($infor->registerday));

        $monthnow = date('m', strtotime("2020/6/1"));
        $month = $monthnow-$monthdk;
        $date = date('d-m-Y');
        if($debit==null)
        {
            $debit = new Debit();
            $debit->money =0;
        }
        return view('HomePage.DetailRoom', [
                'title'=>'', 
                'person'=>$person,
                'room'=>$room,
                'infor'=>$infor,
                'debit'=>$debit,
                'service'=>$service,
                'countxe'=>$count,
                'countper'=>$countper,
                'date'=>$date,
                'day'=>$day,
                'month' => $month,
                'daynow'=>$day_now,
                'monthdk'=>$monthdk,
                'daydk'=>$daydk,
                'day1'=>$day1,
                'feedback'=>$feedback
        ]);
    }
    public function gettraphong(Request $Request)
    {
        $getinfor = InforRegister::where('code', $Request->code)->first();
        $room = Room::where('code', $getinfor->roomcode)->update([
                'status'=> 0
        ]);
        $infor = InforRegister::where('code', $Request->code)->delete();
       
        // $infor->delete();
        return redirect()->route('gethome')->with('success','Đã Trả Phòng Thành Công!');
    }
    public function ghino($id, Request $Request)
    {
         $debit = Debit::where('registercode', $id)->first();
         if($debit==null)
         {
                $debit = new Debit();
                $debit->code = $debit->Render_Code();
                $debit->money = $Request->codemoney;
                $debit->registercode=$id;
                $debit->save(); 
            return redirect()->route('gethome')->with('success','Đã Ghi Nợ!');
         }
         else
         {
            $debit = Debit::where('registercode', $id)->update([
                    'money'=>$Request->codemoney
            ]);
            return redirect()->route('gethome')->with('success','Đã Ghi Nợ!');
         }
        
    }
     public function xoano(Request $Request)
    {
        $debit = Debit::where('registercode', $Request->codeno)->delete();
        return redirect()->route('gethome')->with('success','Đã Xóa Nợ!');
    }
    public function fixfeedback($id)
    {
        $s = Feedback::where('code', $id)->update([
            'status'=>1
        ]);
        $feedback =Feedback::where('code', $id)->first();

        $infor = InforRegister::where('code', $feedback->registercode)->first();

        return redirect()->route('detailroom', ['id'=>$infor->roomcode]);
    }
    public function xoaperson(Request $Request)
    {
        $person = Person::where('code', $Request->code)->first();

        $id = $person->registercode;
       
        $s = Person::where('code', $Request->code)->delete();


        $infor = InforRegister::where('code', $id)->first();

        return redirect()->route('detailroom', ['id'=>$infor->roomcode])->with('success','Xóa Thành Công!');
    }
}
