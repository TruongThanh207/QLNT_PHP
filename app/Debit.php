<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    
    protected $table = 'Debit';
    public $timestamps = false;

    public function Render_Code()
    {
    	$last = Debit::Orderby('code','desc')->first();
    	if($last)
    	{
    		$newcode = "D_".((int)substr($last->code, 2, strlen($last->code)-2)+1);
    	}
    	else
    	{
    		$newcode ="D_1";
    	}
    	return $newcode;
    }
    public function InforRegister()
    {
            return $this->hasOne('App\InforRegister', 'registercode', 'code');
    }
}
