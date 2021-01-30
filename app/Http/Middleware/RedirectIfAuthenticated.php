<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        switch ($guard)
        {
            case 'karyawan':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('karyawans.index');
                }
                break;
            case 'pemilik':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('pemiliks.index');
                }
                break;
            default:
                if (Auth::guard($guard)->check()){
                    return redirect()->route('/');
                }
                break;
        }
        return $next($request);
    }
}
