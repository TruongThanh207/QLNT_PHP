<?php

namespace App\Http\Middleware;

use Closure;
use App\InforRegister;
class CheckCMND
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $infor = InforRegister::where('CMND', $request->cmnd)->first();
        if(isset($request->cmnd)&&isset($infor))
        {
            return $next($request);
        }
        else
        {
             return redirect()->route('getlogin');
        }
        
    }
}
