<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAppTuhLoggedIn
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
        if (session()->has('LoggedAdminAppTuh') && (url('login_admin_app_tuh')==$request->url())){
            return back();
        }
        return $next($request);
    }
}