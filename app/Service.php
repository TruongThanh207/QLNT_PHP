<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $table = 'Service';
    public $timestamps = false;

    public function Render_Code()
    {
    	$last = Service::Orderby('id','desc')->first();
    	if($last)
    	{
    		$newcode = "S".((int)substr($last->code, 1, strlen($last->code)-1)+1);
    	}
    	else
    	{
    		$newcode ="S1";
    	}
    	return $newcode;
    }
}
