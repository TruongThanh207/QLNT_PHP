<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    
    protected $table = 'Bill';
    public $timestamps = false;

    public function Render_Code()
    {
    	$last = Bill::Orderby('code','desc')->first();
    	if($last)
    	{
    		$newcode = "Bill_".((int)substr($last->code, 5, strlen($last->code)-5)+1);
    	}
    	else
    	{
    		$newcode ="Bill_1";
    	}
    	return $newcode;
    }
}