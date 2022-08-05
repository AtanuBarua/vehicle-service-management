<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class IsAdmin
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
        // if(auth()->user()->type == 1){
        // return $next($request);
    //}
        //return redirect('/')->with('error','You have no admin access');
        if (Auth::guard('admin')->user() != null) {
            // code...
            return $next($request);
            //return "hi";
        }

        return redirect('/login/admin')->with('error','You dont have admin access');
    }


}
