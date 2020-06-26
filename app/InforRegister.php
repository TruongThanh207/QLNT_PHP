<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class InforRegister extends Model
{
    
    protected $table = 'InforRegister';
    public $timestamps = false;

    public function Render_Code()
    {
    	$last = InforRegister::Orderby('code','desc')->first();
    	if($last)
    	{
    		$newcode = "IR_".((int)substr($last->code, 3, strlen($last->code)-3)+1);
    	}
    	else
    	{
    		$newcode ="IR_1";
    	}
    	return $newcode;
    }
    public function Room()
    {
            return $this->hasOne('App\Room', 'roomcode', 'code');
    }
    public function Person()
    {
            return $this->hasMany('App\Person', 'registercode', 'code');
    }
    public function Debit()
    {
            return $this->hasOne('App\Debit', 'registercode', 'code');
    }
    public function Feedback()
    {
            return $this->hasMany('App\Feedback', 'registercode', 'code');
    }

}
