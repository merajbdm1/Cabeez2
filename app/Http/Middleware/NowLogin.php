<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NowLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Session()->has('loginId') && url('admin_login') == $request->url() || url('admin_register') == $request->url())
        {
           return back();
        }
        return $next($request);
    }
}
