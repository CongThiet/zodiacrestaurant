<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckOrderLevel
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
        if(Auth::check()&&Auth::user()->level<=2)
        {
            return redirect('/')->with('orderfail','Bạn hiện không thể thực hiện thao tác này.
                                                     Vui lòng liên hệ trực tiếp cửa hàng.');
        }else{
            return $next($request);
        }
    }
}
