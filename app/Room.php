<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
    protected $table = 'Rooms';
    public $timestamps = false;
    

    public function Render_Code()
    {
    	$last = Room::Orderby('code','desc')->first();
    	if($last)
    	{
    		$newcode = "Room_".((int)substr($last->code, 5, strlen($last->code)-5)+1);
    	}
    	else
    	{
    		$newcode ="Room_1";
    	}
    	return $newcode;
    }

    public function InforRegister()
    {
            return $this->hasOne('App\InforRegister', 'roomcode', 'code');
    }
}
