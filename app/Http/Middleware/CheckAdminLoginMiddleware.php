<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminLoginMiddleware
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
        if(!session('admin_login')){
            return redirect('/login')->with('message', 'Please login as volunteer or admin');
        }
        return $next($request);
    }
}
