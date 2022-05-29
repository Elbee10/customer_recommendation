<?php

namespace App\Http\Middleware;

use Closure;

class AlreadyLogged
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
        if (Session()->has('loginId') && (url('login')==$request->url() || url('registration')==$request->url())) {
            return back();
            # code...
        }
        return $next($request);
    }
}
