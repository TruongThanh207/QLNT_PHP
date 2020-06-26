<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    
    protected $table = 'Feedback';
    public $timestamps = false;

    public function Render_Code()
    {
    	$last = Feedback::Orderby('code','desc')->first();
    	if($last)
    	{
    		$newcode = "Feedback_".((int)substr($last->code, 9, strlen($last->code)-1)+1);
    	}
    	else
    	{
    		$newcode ="Feedback_1";
    	}
    	return $newcode;
    }
    public function InforRegister()
    {
            return $this->belongsTo('App\InforRegister', 'registercode', 'code');
    }
}
