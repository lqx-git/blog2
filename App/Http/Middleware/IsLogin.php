<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('user')){
            return $next($request);
        }else{
            return redirect('admin/login')->with('errors','请正常进入，谢谢！');
        }

    }
}
