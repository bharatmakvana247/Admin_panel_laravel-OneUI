<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // if (!$request->secure()) {
        //     return redirect()->secure($request->getRequestUri());  //Secure Your Site like https://..
        // }
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->user_type == 'SuperAdmin') {
                return  $next($request);
            } else {
                return redirect()->route('admin.login')->with('error', "Sorry Only Admin can Access it..");
            }
        } else {
            return redirect()->route('admin.login')->with('error', "Sorry Only Admin can Access it..");
        }
    }
}