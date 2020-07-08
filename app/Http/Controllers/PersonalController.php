<?php

namespace App\Http\Controllers;
use App\Room;
use App\InforRegister;
use App\Person;
use App\Debit;
use App\Service;
use App\Bill;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function postaddpersonal($id, Request $Request)
    {
        if($Request->flag==0)
        {

        	$person = new Person();
        	$person->code = $person->Render_Code();
        	$person->name = $Request->fullname;
        	$person->phone = $Request->tel;
        	$person->state =$Request->quequan;
        	$person->vehicle =$Request->xe;
        	$person->gioitinh = $Request->gender;
            $person->registercode = $id;
        	$person->save();

            $infor = InforRegister::where('code', $id)->first();
        	return redirect()->route('detailroom',['id'=>$infor->roomcode])->with('success', 'Thêm Thành Công!');
        }
        else
        {
            $ps = Person::where('code', $Request->codeperson)->update([
                   'name' => $Request->fullname,
                   'phone' => $Request->tel,
                   'state' =>$Request->quequan,
                   'vehicle' =>$Request->xe,
                   'gioitinh' => $Request->gender
            ]);
            $infor = InforRegister::where('code', $id)->first();
            return redirect()->route('detailroom',['id'=>$infor->roomcode])->with('success', 'Cập Nhật Thành Công!');
        }

    }
    //------> get value checkbox
    // public function a(Request $Request){
    //     $us[] = [   '2'=>$Request->internet, 
    //                 '1'=>$Request->cap
    //             ];
    //     return dd($Request->internet);
    // }

    public function getkhachthue($cmnd){
        $infor = InforRegister::where('CMND', $cmnd)->first();
        //$bill = Bill::where('')

        $bill = Bill::where('roomcode', $infor->roomcode)
                        ->where('CMND',$cmnd)->orderBy('code', 'DESC')->first();
        $ngaythanhtoanbill=null; 
                  $month_bill = null;     
        if(isset($bill))
        {
            $ngaythanhtoanbill = date('m',strtotime($bill->daynow));
             $month_bill = date('Y/m/d',strtotime($bill->daynow));
        }
        $room = Room::where('code', $infor->roomcode)->first();

        $date = date('d/m/Y');
        $daydk = date('d', strtotime($infor->registerday));

        $monthdk = date('m', strtotime($infor->registerday));
        
      
        $debit = null;
        $debit = Debit::where('registercode', $infor->code)->first();

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

        $dayinfor = strtotime($infor->registerday);
        $times = date("Y/m/d");
        $datechot = strtotime($times);
        $sec =$datechot - $dayinfor;
        $day =$sec/86400;

        $service = Service::all();

        $day_now = date('d',strtotime($times));

        $month_now = date('m',strtotime($times));
        $year_now = date('Y',strtotime($times));
        $month = $month_now-$monthdk;

        $day_first = $year_now."/".$month_now."/1";
        $x =strtotime(date($day_first));
        $sec_first = $x-$dayinfor;
        $day1 =$sec_first/86400;

        $ngaydebit = null;
        if($debit==null)
        {
            $debit = new Debit();
            $debit->money =0; 
        }
        else
        {
            $ngaydebit = date('m', strtotime($debit->time));
        }

        $s = Bill::where('cmnd',$cmnd)->paginate(5);

        return view('HomePage.KhachThue.infor',[
            'data'=>$s, 
            'cmnd'=>$cmnd, 
            'date' =>$date,
            'month'=>$month,
            'monthnow'=>$month_now,
            'infor'=>$infor,
            'room'=>$room,
            'debit'=>$debit,
            'countper'=>$countper,
            'day'=>$day,
            'service'=>$service,
            'countxe'=>$count,
            'daynow'=>$day_now,
            'monthdk'=>$monthdk,
            'daydk'=>$daydk,
            'day1'=>$day1,
            'times'=>$times,
            'day_bill'=>$ngaythanhtoanbill,
            'ngaydebit'=>$ngaydebit,
            'month_bill'=>$month_bill

        ]);
        
    }
}
