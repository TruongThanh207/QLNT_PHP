<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    
    protected $table = 'Persons';
    public $timestamps = false;
    

    public function Render_Code()
    {
    	$last = Person::Orderby('code','desc')->first();
    	if($last)
    	{
    		$newcode = "Person_".((int)substr($last->code, 7, strlen($last->code)-7)+1);
    	}
    	else
    	{
    		$newcode ="Person_1";
    	}
    	return $newcode;
    }

    public function InforRegister()
    {
            return $this->belongsTo('App\InforRegister', 'registercode', 'code');
    }
}
