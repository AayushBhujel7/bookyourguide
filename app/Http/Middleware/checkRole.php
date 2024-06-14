<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkRole
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
        if (strpos(url()->full(), $request->user()->role) !== false) {
            return $next($request);
        }
        return redirect('/home');
    }
}
