<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class isAdmin
{
    //protected $redirectTo = '/admin';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->admin == 1) {
            return $next($request);
        } elseif(Auth::user() && Auth::user()->admin == 0) {
            auth()->logout();
            return redirect('/admin/login')->withErrors('У вас нет прав Администратора');
        } else {
            return redirect('/admin/login');
        }


    }
}
