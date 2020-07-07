<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Room;
use App\InforRegister;
use App\Person;
use App\Debit;
use App\Service;
use App\Bill;
use App\User;
use App\Feedback;
use Redirect;
use PDF;

class BillController extends Controller
{
    public function getbill(){
        $bill =Bill::paginate(5);
    	return view('HomePage.Bill', [
            'title'=>'Bill Management',
            'bill'=>$bill
    ]);
    }
    public function getbillbymonth(Request $Request)
    {
    	$infor = InforRegister::where('CMND', $Request->cmnd)->first();
    	
    		 $room = Room::where('code', $infor->roomcode)->first();
    		 $daydk = date('d', strtotime($infor->registerday));
    		 $monthdk = date('m', strtotime($infor->registerday));
    		 $debit = Debit::where('registercode', $infor->code)->first();

       		 $person = Person::where('registercode', $infor->code)->get();

       		 $dayinfor = strtotime($infor->registerday);
       		  $date = date('d/m/Y');
       

       
	        $monthnow = date('m', strtotime("2020/6/1"));
	        $month = $monthnow-$monthdk;

	       
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

	        
	        $s = date("Y/m/d");
	        $datechot = strtotime($s);
	        $sec =$datechot - $dayinfor;
	        $day =$sec/86400;

	        $service = Service::all();

	        $day_now = date('d',strtotime($s));

	        $month_now = date('m',strtotime($s));
	        $year_now = date('Y',strtotime($s));

	        $day_first = $year_now."/".$month_now."/1";
	        $x =strtotime(date($day_first));
	        $sec_first = $x-$dayinfor;
	        $day1 =$sec_first/86400;

	        if($debit==null)
	        {
	            $debit = new Debit();
	            $debit->money =0;
	        }

	        $us = Bill::where('CMND',$Request->cmnd)
	        			->whereMonth('daynow','=',$Request->month)->paginate(3);

	        return view('HomePage.KhachThue.infor',[ 
            'cmnd'=>$Request->cmnd, 
            'date' =>$date,
            'month'=>$month,
            'monthnow'=>$Request->month,
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
            'data'=>$us

        	]);
    }
    public function postphanhoi(Request $Request)
    {
        $feedback = new Feedback();
        $feedback->code = $feedback->Render_Code();
        $feedback->notes=$Request->textreponse;
        $feedback->status = 0;
        $feedback->registercode=$Request->code;
        $feedback->save();
    	return redirect()->route('khachthue', [$Request->cmndfeedback])->with('success','Phản hồi thành công!');
    }
    public function pdf(Request $Request)
    {
        if($Request->post_hoadon==1)
        {
             $s = date("Y/m/d");
             $month_now = date('m',strtotime($s));
             $year_now = date('Y',strtotime($s));
             $day_first = $year_now."/".$month_now."/01";
             $data = new Bill();
             $data->code = $data->Render_Code();
             $data->CMND = $Request->cmnd;
             $data->roomcode = $Request->roomcode;
             $data->electronic = $Request->dien==null?0:$Request->dien;
             $data->water = $Request->nuoc==null?0:$Request->nuoc;
             $data->daynow = $day_first;
             if($Request->internet!=null)
             {
                    $data->internet=1;
             }
             else
             {
                    $data->internet=0;
             }
            if($Request->thc!=null)
             {
                    $data->truyenhinhcap=1;
             }
             else
             {
                    $data->truyenhinhcap=0;
             }
             $data->debit = $Request->debitbill;
             $data->totalmoney = $Request->totalmoney;

              $data->save();

              $use = User::find($Request->use);
             
             $pdf = PDF::loadView('HomePage.Bill_pdf',[
                'title'=>'HÓA ĐƠN', 
                'data'=>$use,
                'debit'=> $Request->debitbill,
                'totalmoney'=> $Request->totalmoney,
                'xe'=>$Request->xe_count,
                'internet'=>$Request->internet,
                'truyenhinhcap'=>$Request->thc,
                'csdien'=>$Request->dien,
                'csnuoc'=>$Request->nuoc,
                'cmnd'=>$Request->cmnd,
                'room'=>$Request->roomcode,
                'day'=>date('Y-d-m',strtotime($Request->daynow)),
                'tienphong'=>$Request->roommney,
                'pricedien'=>$Request->price_dien,
                'pricenuoc'=>$Request->price_nuoc,
                'pricexe'=>$Request->xe_price
            ]);
             return $pdf->download('hoadon.pdf');
        }
        else
        {

             $data = new Bill();
             $data->code = $data->Render_Code();
             $data->CMND = $Request->cmnd;
             $data->roomcode = $Request->roomcode;
             $data->electronic = $Request->dien==null?0:$Request->dien;
             $data->water = $Request->nuoc==null?0:$Request->nuoc;
             $data->daynow = date("Y/m/d", strtotime($Request->daynow));
             if($Request->internet!=null)
             {
                    $data->internet=1;
             }
             else
             {
                    $data->internet=0;
             }
            if($Request->thc!=null)
             {
                    $data->truyenhinhcap=1;
             }
             else
             {
                    $data->truyenhinhcap=0;
             }
             $data->debit = $Request->debitbill;
             $data->totalmoney = $Request->totalmoney;

              $data->save();
             
//traphong

                $getinfor = InforRegister::where('code', $Request->code)->first();
                $room = Room::where('code', $getinfor->roomcode)->update([
                        'status'=> 0
                ]);
                $infor = InforRegister::where('code', $Request->code)->delete();

// //traphong
              $use = User::find($Request->use);
             
             $pdf = PDF::loadView('HomePage.Bill_pdf',[
                'title'=>'HÓA ĐƠN', 
                'data'=>$use,
                'debit'=> $Request->debitbill,
                'totalmoney'=> $Request->totalmoney,
                'xe'=>$Request->xe_count,
                'internet'=>$Request->internet,
                'truyenhinhcap'=>$Request->thc,
                'csdien'=>$Request->dien,
                'csnuoc'=>$Request->nuoc,
                'cmnd'=>$Request->cmnd,
                'room'=>$Request->roomcode,
                'day'=>date('Y-d-m',strtotime($Request->daynow)),
                'tienphong'=>$Request->roommney,
                'pricedien'=>$Request->price_dien,
                'pricenuoc'=>$Request->price_nuoc,
                'pricexe'=>$Request->xe_price
            ]);
             return $pdf->download('hoadon.pdf');
         
        //  $us = array([
        //     'title'=>'HÓA ĐƠN', 
        //     'use'=>$use,
        //     'debit'=> $Request->debitbill,
        //     'totalmoney'=> $Request->totalmoney,
        //     'xe'=>$Request->xe,
        //     'internet'=>$Request->internet,
        //     'truyenhinhcap'=>$Request->thc,
        //     'csdien'=>$Request->dien,
        //     'csnuoc'=>$Request->nuoc,
        //     'cmnd'=>$Request->cmnd,
        //     'room'=>$Request->roomcode,
        //     'day'=>date('Y-d-m',strtotime($Request->daynow))
        // ]);
        }


        
       
    }
    public function xoabill(Request $Request)
    {
        if($Request->ajax())
          {

            $data = $Request->input('list');

            foreach ($data as $mahs) 
            {
             Bill::where('code',$mahs)->delete();
           }
           return response()->json('Xóa hóa đơn thành công!',200);
         }
    }
    
}
